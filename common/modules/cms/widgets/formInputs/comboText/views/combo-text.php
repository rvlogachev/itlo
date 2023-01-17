<?php
/* @var $this yii\web\View */
/* @var $widget \common\modules\cms\widgets\formInputs\comboText\ComboTextInputWidget */

$options = $widget->clientOptions;
$clientOptions = \yii\helpers\Json::encode($options);
?>
<div id="<?= $widget->id; ?>">
    <div class="sx-select-controll">
        <?php if ($widget->modelAttributeSaveType) : ?>
            <?= \yii\helpers\Html::activeRadioList($widget->model, $widget->modelAttributeSaveType,
                \common\modules\cms\widgets\formInputs\comboText\ComboTextInputWidget::editors()) ?>
        <?php else
            : ?>
            <?= \yii\helpers\Html::radioList(
                $widget->id . '-radio',
                $widget->defaultEditor,
                \common\modules\cms\widgets\formInputs\comboText\ComboTextInputWidget::editors()
            ) ?>
        <?php endif;
        ?>
    </div>
    <div class="sx-controll">
        <?= $textarea; ?>
    </div>
</div>

<?php
//TODO: убрать в файл


$this->registerCss(<<<CSS
    .CodeMirror
    {
        height: 400px;
    }
CSS
);


$this->registerJs(<<<JS
(function(sx, $, _)
{
    new sx.classes.combotext.ComboTextInputWidget({$clientOptions});
})(sx, sx.$, sx._);
JS
)
?>
