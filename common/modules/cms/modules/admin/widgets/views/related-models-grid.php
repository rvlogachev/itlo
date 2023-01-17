<?php
/* @var $this yii\web\View */
/* @var $widget \common\modules\cms\modules\admin\widgets\RelatedModelsGrid */
/* @var $controller \common\modules\cms\modules\admin\controllers\AdminModelEditorController */
use \common\modules\cms\modules\admin\widgets\Pjax;
$controller = \Yii::$app->createController($widget->controllerRoute)[0];

?>

<?/* Pjax::begin([
    'id' => $pjaxId,
]); */?>

<?php if ($widget->label) : ?>
    <label><?= $widget->label; ?></label>
<?php endif;?>

<?php if ($widget->hint) : ?>
    <p><small><?= $widget->hint; ?></small></p>
<?php endif;?>
<div>

    <?php $onclick = new \yii\web\JsExpression(<<<JS
        new sx.classes.RelationModelsGrid({
            'createUrl': '{$createUrl}',
            'pjaxId': '{$pjaxId}',
        }); return false;
JS
    ); ?>

    <?php $add = \Yii::t('skeeks/cms', 'Add');?>
    <?= \common\modules\cms\modules\admin\widgets\GridViewHasSettings::widget(\yii\helpers\ArrayHelper::merge([
        'settingsData' =>
        [
             'namespace' => $widget->namespace
        ],
        'beforeTableLeft' => <<<HTML
        <a class="btn btn-default btn-sm" onclick="{$onclick}"><i class="fa fa-plus"></i>{$add}</a>
HTML

    ], $gridOptions)); ?>

    <?

        $this->registerJs(<<<JS
        (function(sx, $, _)
        {
            sx.classes.RelationModelsGrid = sx.classes.Component.extend({

                _init: function()
                {
                    var self = this;
                    var window = new sx.classes.Window(this.get('createUrl'));
                    window.bind("close", function()
                    {
                        $.pjax.reload('#' + self.get('pjaxId'), {});
                    });

                    window.open();
                }
            });
        })(sx, sx.$, sx._);
JS
);
    ?>

</div>

<?/* Pjax::end(); */?>