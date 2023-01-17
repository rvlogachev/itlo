<?php
/* @var $this yii\web\View */
/* @var $widget \common\modules\cms\widgets\FiltersWidget */
$widget = $this->context;
$fields = $widget->filtersModel->builderFields();
?>

<?
$activeFormClassName = \yii\helpers\ArrayHelper::getValue($widget->activeForm, 'class', \yii\widgets\ActiveForm::class);
\yii\helpers\ArrayHelper::remove($widget->activeForm, 'class');

$form = $activeFormClassName::begin((array)$widget->activeForm);

echo (new \common\modules\cms\modules\form\Builder([
    'models'     => $widget->filtersModel->builderModels(),
    'model'      => $widget->filtersModel,
    'activeForm' => $form,
    'fields'     => $fields,
]))->render();

?>
<div class="row sx-form-buttons">
<div class="col-sm-12">
    <div class="col-sm-3""></div>
    <div class="col-sm-6">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-filter"></i> Применить</button>
    </div>
    <div class="col-sm-3">

    </div>
</div>
</div>

<?
$activeFormClassName::end();
?>
