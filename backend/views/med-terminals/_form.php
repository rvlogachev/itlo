<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedTerminals $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="med-terminals-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'terminal_id')->textInput() ?>
                <?php echo $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->all(), 'id', 'name')) ?>
                <?php echo $form->field($model, 'adderss')->textarea(['rows' => 6, 'placeholder'=>'г. Москва ул. Ленина 55 корп. 1']) ?>
                <?php echo $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

                <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
	                'mask' => '+7(999) 999-99-99',
                ]) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
