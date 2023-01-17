<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedSettings $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="med-settings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'reference_temp_ot') ?>
    <?php echo $form->field($model, 'reference_temp_do') ?>
    <?php echo $form->field($model, 'reference_bpp_up_ot') ?>
    <?php echo $form->field($model, 'reference_bpp_up_do') ?>
    <?php // echo $form->field($model, 'reference_bpp_lower_ot') ?>
    <?php // echo $form->field($model, 'reference_bpp_lower_do') ?>
    <?php // echo $form->field($model, 'reference_bpp_pulse_ot') ?>
    <?php // echo $form->field($model, 'reference_bpp_pulse_do') ?>
    <?php // echo $form->field($model, 'reference_alco_ot') ?>
    <?php // echo $form->field($model, 'reference_alco_do') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
