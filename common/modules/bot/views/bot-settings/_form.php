<?php

use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotSettings */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bot-settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'group_id')->textInput() ?>
    <?php echo $form->field($model, 'reqest')->textInput() ?>

    <?php  echo $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
<!--    --><?php // echo $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->getId()]) ?>

    <div class="form-group">
        <?php echo \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
