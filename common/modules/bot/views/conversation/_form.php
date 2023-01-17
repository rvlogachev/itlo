<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Conversation */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="conversation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'chat_id')->textInput() ?>

    <?php echo $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'cancelled' => 'Cancelled', 'stopped' => 'Stopped', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'command')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
