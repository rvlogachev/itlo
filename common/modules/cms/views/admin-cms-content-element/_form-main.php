<?php
/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\CmsContentElement */
/* @var $relatedModel \common\modules\cms\relatedProperties\models\RelatedPropertiesModel */
?>
<?= $form->fieldSet(\Yii::t('skeeks/cms', 'Main')); ?>
<?= $form->fieldRadioListBoolean($model, 'active'); ?>
<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>



<?php if ($contentModel->root_tree_id) : ?>
    <?php $rootTreeModels = \common\modules\cms\models\CmsTree::findAll($contentModel->root_tree_id); ?>
<?php else
    : ?>
    <?php $rootTreeModels = \common\modules\cms\models\CmsTree::findRoots()->joinWith('cmsSiteRelation')->orderBy([\common\modules\cms\models\CmsSite::tableName() . ".priority" => SORT_ASC])->all();
    ?>
<?php endif; ?>

<?php if ($contentModel->is_allow_change_tree == \common\modules\cms\components\Cms::BOOL_Y) : ?>
    <?php if ($rootTreeModels) : ?>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <?= $form->field($model, 'tree_id')->widget(
                    \common\modules\cms\widgets\formInputs\selectTree\SelectTreeInputWidget::class,
                    [
                        'options' => [
                            'data-form-reload' => 'true'
                        ],
                        'multiple' => false,
                        'treeWidgetOptions' =>
                            [
                                'models' => $rootTreeModels
                            ]
                    ]
                ); ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php

$properties = $model->getRelatedProperties()
    ->joinWith('cmsContentProperty2trees as map2trees')
    ->groupBy(\common\modules\cms\models\CmsContentProperty::tableName() . ".id");

$treeIds = $model->treeIds;
if ($model->tree_id) {
    $treeIds[] = $model->tree_id;
}
if ($treeIds) {
    $properties->andWhere([
        'or',
        ['map2trees.cms_tree_id' => $treeIds],
        ['map2trees.cms_tree_id' => null],
    ]);
} else {
    $properties->andWhere(['map2trees.cms_tree_id' => null]);
}

$properties = $properties->orderBy(['priority' => SORT_ASC])->all();
/**
 * @var $property \common\modules\cms\relatedProperties\models\RelatedPropertyModel
 */
?>
<?php if ($properties) : ?>
    <?= \common\modules\cms\modules\admin\widgets\BlockTitleWidget::widget([
        'content' => \Yii::t('skeeks/cms', 'Additional properties')
    ]); ?>

    <?php foreach ($properties

                   as $property) : ?>
        <?php if ($property->property_type == \common\modules\cms\relatedProperties\PropertyType::CODE_LIST) : ?>

            <?php $pjax = \common\modules\cms\modules\admin\widgets\Pjax::begin(); ?>
            <div class="row">
                <div class="col-md-8">
                    <?= $property->renderActiveForm($form, $model) ?>
                </div>
                <div class="col-md-4">

                    <?php if ($controllerProperty = \Yii::$app->createController('cms/admin-cms-content-property-enum')[0]) : ?>
                        <label>&nbsp;</label>
                        <?php
                        /**
                         * @var \common\modules\backend\BackendAction $actionIndex
                         * @var \common\modules\backend\BackendAction $actionCreate
                         */
                        $actionCreate = \yii\helpers\ArrayHelper::getValue($controllerProperty->actions, 'create');
                        ?>

                        <?php
                        if ($actionCreate) {
                            $actionCreate->url = \yii\helpers\ArrayHelper::merge($actionCreate->urlData, [
                                'property_id' => $property->id
                            ]);

                            $actionCreate->name = \Yii::t("skeeks/cms", "Create");

                            /*echo \skeeks\cms\backend\widgets\DropdownControllerActionsWidget::widget([
                                'actions' => ['create' => $actionCreate],
                                'isOpenNewWindow' => true
                            ]);*/

                            echo \common\modules\backend\widgets\ControllerActionsWidget::widget([
                                'actions' => ['create' => $actionCreate],
                                'clientOptions' => ['pjax-id' => $pjax->id],
                                'isOpenNewWindow' => true,
                                'tag' => 'div',
                                'itemWrapperTag' => 'span',
                                'itemTag' => 'button',
                                'itemOptions' => ['class' => 'btn btn-default'],
                                'options' => ['class' => 'sx-controll-actions'],
                            ]);
                        }
                        ?>
                    <?php endif; ?>
                    <!--<a href="#" style="border-bottom: 1px dashed">Добавить</a>-->
                </div>
            </div>
            <?php \common\modules\cms\modules\admin\widgets\Pjax::end(); ?>
        <?php elseif ($property->property_type == \common\modules\cms\relatedProperties\PropertyType::CODE_ELEMENT): ?>

            <?php $pjax = \common\modules\cms\modules\admin\widgets\Pjax::begin(); ?>
            <div class="row">
                <div class="col-md-8">
                    <?= $property->renderActiveForm($form, $model) ?>
                </div>
                <div class="col-md-4">
                    <?php if (!in_array($property->handler->fieldElement, [
                        \common\modules\cms\relatedProperties\propertyTypes\PropertyTypeElement::FIELD_ELEMENT_SELECT_DIALOG,
                        \common\modules\cms\relatedProperties\propertyTypes\PropertyTypeElement::FIELD_ELEMENT_SELECT_DIALOG_MULTIPLE
                    ])) : ?>
                        <?php if ($controllerProperty = \Yii::$app->createController('cms/admin-cms-content-element')[0]) : ?>
                            <label>&nbsp;</label>
                            <?php
                            /**
                             * @var \common\modules\backend\BackendAction $actionIndex
                             * @var \common\modules\backend\BackendAction $actionCreate
                             */
                            $actionCreate = \yii\helpers\ArrayHelper::getValue($controllerProperty->actions, 'create');
                            ?>

                            <?php
                            if ($actionCreate) {
                                $actionCreate->url = \yii\helpers\ArrayHelper::merge($actionCreate->urlData, [
                                    'content_id' => $property->handler->content_id
                                ]);

                                $actionCreate->name = \Yii::t("skeeks/cms", "Create");

                                /*echo \skeeks\cms\backend\widgets\DropdownControllerActionsWidget::widget([
                                    'actions' => ['create' => $actionCreate],
                                    'isOpenNewWindow' => true
                                ]);*/

                                echo \common\modules\backend\widgets\ControllerActionsWidget::widget([
                                    'actions' => ['create' => $actionCreate],
                                    'clientOptions' => ['pjax-id' => $pjax->id],
                                    'isOpenNewWindow' => true,
                                    'tag' => 'div',
                                    'itemWrapperTag' => 'span',
                                    'itemTag' => 'button',
                                    'itemOptions' => ['class' => 'btn btn-default'],
                                    'options' => ['class' => 'sx-controll-actions'],
                                ]);
                            }
                            ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <!--<a href="#" style="border-bottom: 1px dashed">Добавить</a>-->
                </div>
            </div>
            <?php \common\modules\cms\modules\admin\widgets\Pjax::end(); ?>

        <?php else
            : ?>
            <?= $property->renderActiveForm($form, $model) ?>
        <?php endif;
        ?>
    <?php endforeach; ?>

<?php else
    : ?>
    <?php /*= \Yii::t('skeeks/cms','Additional properties are not set')*/ ?>
    <?php
endif;
?>
<?= $form->fieldSetEnd() ?>
