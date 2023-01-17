<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedConference $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="med-conference-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'doctor_id')->textInput() ?>
                <?php echo $form->field($model, 'user_id')->textInput() ?>
                <?php echo $form->field($model, 'date_conf')->textInput() ?>
                <?php echo $form->field($model, 'status')->textInput() ?>
                <?php echo $form->field($model, 'data_json')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
