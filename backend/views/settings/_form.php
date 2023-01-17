<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedSettings $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="med-settings-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

<!--                --><?php //echo $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\User::find()->all(),'id','username')) ?>
                <?php echo $form->field($model, 'reference_temp_ot')->textInput() ?>
                <?php echo $form->field($model, 'reference_temp_do')->textInput() ?>
                <?php echo $form->field($model, 'reference_bpp_up_ot')->textInput() ?>
                <?php echo $form->field($model, 'reference_bpp_up_do')->textInput() ?>
                <?php echo $form->field($model, 'reference_bpp_lower_ot')->textInput() ?>
                <?php echo $form->field($model, 'reference_bpp_lower_do')->textInput() ?>
                <?php echo $form->field($model, 'reference_bpp_pulse_ot')->textInput() ?>
                <?php echo $form->field($model, 'reference_bpp_pulse_do')->textInput() ?>
                <?php echo $form->field($model, 'reference_alco_ot')->textInput() ?>
                <?php echo $form->field($model, 'reference_alco_do')->textInput() ?>
                <?php echo $form->field($model, 'rate')->textInput() ?>

	            <?php echo $form->field($model, 'all_phone')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
		            'mask' => '+7(999) 999-99-99',
	            ]) ?>


	            <?php echo $form->field($model, 'printer_count')->textInput() ?>

						</div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
