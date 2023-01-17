<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotTest */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bot-test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'number')->textInput() ?>

    <?php echo $form->field($model, 'answer_yes')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'answer_no')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'answer_middle')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'cancelled' => 'Cancelled', 'stopped' => 'Stopped', ], ['prompt' => '']) ?>


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
