<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedDoctors $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="med-doctors-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'fio')->textInput() ?>
	            <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
		            'mask' => '+7(999) 999-99-99',
	            ]) ?>
                <?php echo $form->field($model, 'email')->textInput(['placeholder' => 'info@company.ru']) ?>
                <?php echo $form->field($model, 'user_id')->dropDownList($users) ?>

								<label>Фото</label>
                <?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
                    'url'=>['avatar-upload']
                ])->label(false) ?>

							<label>ЭЦП</label>
                <?php echo $form->field($model, 'signature_hash')->textInput(['maxlength' => true, 'value'=> md5(time())])->label(false) ?>
                
            </div>
            <div class="card-footer">
	            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
