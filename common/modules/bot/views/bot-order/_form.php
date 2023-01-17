<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotOrder */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bot-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'date_birth')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'time_birth')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'place_birth')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'name_partner')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'date_birth_partner')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'time_birth_partner')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'place_birth_partner')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->textInput() ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
