<?php

use common\components\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotLog */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bot-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'update_id')->textInput() ?>

    <?php echo $form->field($model, 'is_callback')->textInput() ?>

    <?php echo $form->field($model, 'callback_query_id')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'callback_query_from_id')->textInput() ?>

    <?php echo $form->field($model, 'callback_query_from_is_bot')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'callback_query_from_first_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'callback_query_from_username')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'callback_query_from_language_code')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'callback_chat_instance')->textInput() ?>

    <?php echo $form->field($model, 'callback_data')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'message_id')->textInput() ?>

    <?php echo $form->field($model, 'from_id')->textInput() ?>

    <?php echo $form->field($model, 'from_is_bot')->textInput() ?>

    <?php echo $form->field($model, 'from_first_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'from_username')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'from_language_code')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'chat_id')->textInput() ?>

    <?php echo $form->field($model, 'chat_first_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'chat_username')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'chat_type')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'entities')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
