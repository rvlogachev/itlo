<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedConference $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="med-conference-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'doctor_id') ?>
    <?php echo $form->field($model, 'user_id') ?>
    <?php echo $form->field($model, 'date_conf') ?>
    <?php echo $form->field($model, 'status') ?>
    <?php // echo $form->field($model, 'data_json') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
