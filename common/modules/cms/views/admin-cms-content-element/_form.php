<?php

use common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;
use yii\helpers\Html;

/* @var $model \common\modules\cms\models\CmsContentElement */
/* @var $relatedModel \common\modules\cms\relatedProperties\models\RelatedPropertiesModel */

/* @var $this yii\web\View */
/* @var $controller \common\modules\backend\controllers\BackendModelController */
/* @var $action \common\modules\backend\actions\BackendModelCreateAction|\common\modules\backend\actions\IHasActiveForm */
/* @var $model \common\modules\cms\models\CmsLang */
$controller = $this->context;
$action = $controller->action;

if ($model->isNewRecord) {
    if ($tree_id = \Yii::$app->request->get("tree_id")) {
        $model->tree_id = $tree_id;
    }

    if ($parent_content_element_id = \Yii::$app->request->get("parent_content_element_id")) {
        $model->parent_content_element_id = $parent_content_element_id;
    }
}
?>



<?php $form = $action->beginActiveForm([
    'id'                     => 'sx-dynamic-form',
    'enableAjaxValidation'   => false,
    'enableClientValidation' => false,
]); ?>


<?php if ($is_saved && @$is_create) : ?>
    <?php $this->registerJs(<<<JS
    sx.Window.openerWidgetTriggerEvent('model-create', {
        'submitBtn' : '{$submitBtn}'
    });
JS
    ); ?>

<?php elseif ($is_saved) : ?>
    <?php $this->registerJs(<<<JS
sx.Window.openerWidgetTriggerEvent('model-update', {
        'submitBtn' : '{$submitBtn}'
    });
JS
    ); ?>
<?php endif; ?>

<?php if (@$redirect) : ?>
    <?php $this->registerJs(<<<JS
window.location.href = '{$redirect}';
console.log('window.location.href');
console.log('{$redirect}');
JS
    ); ?>
<?php endif; ?>



<?php $this->registerJs(<<<JS

(function(sx, $, _)
{
    sx.classes.DynamicForm = sx.classes.Component.extend({

        _onDomReady: function()
        {
            var self = this;

            $("[data-form-reload=true]").on('change', function()
            {
                self.update();
            });
        },

        update: function()
        {
            _.delay(function()
            {
                var jForm = $("#sx-dynamic-form");
                jForm.append($('<input>', {'type': 'hidden', 'name' : 'sx-not-submit', 'value': 'true'}));
                jForm.submit();
            }, 200);
        }
    });

    sx.DynamicForm = new sx.classes.DynamicForm();
})(sx, sx.$, sx._);


JS
); ?>



<?php echo $form->errorSummary([$model, $relatedModel]); ?>
<div style="display: none;">

    <?php if ($model->isNewRecord) : ?>
        <?php if ($content_id = \Yii::$app->request->get("content_id")) : ?>
            <?php $contentModel = \common\modules\cms\models\CmsContent::findOne($content_id); ?>
            <?php $model->content_id = $content_id; ?>
            <?= $form->field($model, 'content_id')->hiddenInput(['value' => $content_id])->label(false); ?>
        <?php endif; ?>
    <?php else
        : ?>
        <?php $contentModel = $model->cmsContent;
        ?>
    <?php endif; ?>

    <?php if ($contentModel && $contentModel->parentContent) : ?>
        <?= Html::activeHiddenInput($contentModel, 'parent_content_is_required'); ?>
    <?php endif; ?>
</div>

<?= $this->render('_form-main', [
    'form'         => $form,
    'contentModel' => $contentModel,
    'model'        => $model,
]); ?>




<?php if (!$model->isNewRecord) : ?>
    <?php if ($model->cmsContent->access_check_element == "Y") : ?>
        <?= $form->fieldSet(\Yii::t('skeeks/cms', 'Access')); ?>
        <?= \common\modules\cms\rbac\widgets\adminPermissionForRoles\AdminPermissionForRolesWidget::widget([
            'permissionName'        => $model->permissionName,
            'permissionDescription' => 'Доступ к этому элементу: '.$model->name,
            'label'                 => 'Доступ к этому элементу',
        ]); ?>
        <?= $form->fieldSetEnd() ?>
    <?php endif; ?>
<?php endif; ?>

<?php if ($model->cmsContent->childrenContents) : ?>

    <?

    /**
     * @var $content \common\modules\cms\models\CmsContent
     */
    ?>
    <?php foreach ($model->cmsContent->childrenContents as $childContent) : ?>
        <?= $form->fieldSet($childContent->name); ?>

        <?php if ($model->isNewRecord) : ?>

            <?= \yii\bootstrap4\Alert::widget([
                'options' =>
                    [
                        'class' => 'alert-warning',
                    ],
                'body'    => \Yii::t('skeeks/cms', 'Management will be available after saving'),
            ]); ?>
        <?php else
            : ?>
            <?= \common\modules\cms\modules\admin\widgets\RelatedModelsGrid::widget([
                'label'       => $childContent->name,
                'namespace'   => md5($model->className().$childContent->id),
                'parentModel' => $model,
                'relation'    => [
                    'content_id'                => $childContent->id,
                    'parent_content_element_id' => $model->id,
                ],

                'sort' => [
                    'defaultOrder' =>
                        [
                            'priority' => 'published_at',
                        ],
                ],

                'controllerRoute' => '/cms/admin-cms-content-element',
                'gridViewOptions' => [
                    'columns' => (array)\common\modules\cms\controllers\AdminCmsContentElementController::getColumns($childContent),
                ],
            ]);
            ?>

        <?php endif; ?>




        <?= $form->fieldSetEnd() ?>
    <?php endforeach; ?>
<?php endif; ?>


<?= $form->buttonsStandart($model); ?>
<?php echo $form->errorSummary([$model, $relatedModel]); ?>
<?php  common\modules\cms\widgets\tree\CmsTreeWidget::end(); ?>
