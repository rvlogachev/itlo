<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedCompany $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="med-company-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

								<?php if(\Yii::$app->user->can('manager HR') ):?>

                <?php echo $form->field($model, 'forma')->hiddenInput()->label(false); ?>
                <?php echo $form->field($model, 'name')->hiddenInput(['maxlength' => true])->label(false); ?>
                <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
	                'mask' => '+7(999) 999-99-99',
                ]) ?>
                <?php echo $form->field($model, 'address')->hiddenInput(['maxlength' => true, 'placeholder' => 'г.Москва, ул.Осташковская, д.4'])->label(false); ?>
                <?php echo $form->field($model, 'limit')->hiddenInput(['maxlength' => true])->label(false); ?>
                <?php echo $form->field($model, 'rate')->hiddenInput(['maxlength' => true])->label(false); ?>
                <?php echo $form->field($model, 'status')->hiddenInput(\common\models\MedCompany::statuses())->label(false); ?>

							<?php else:?>


	                <?php echo $form->field($model, 'forma')->dropDownList(['ООО' => 'OOO', 'ЗАО'=>'ЗАО', 'ОАО'=>'ОАО', 'ИП'=>'ИП']) ?>
	                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	                <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
		                'mask' => '+7(999) 999-99-99',
	                ]) ?>
	                <?php echo $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'г.Москва, ул.Осташковская, д.4']) ?>
	                <?php echo $form->field($model, 'limit')->textInput(['maxlength' => true]) ?>
	                <?php echo $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>
	                <?php echo $form->field($model, 'status')->dropDownList(\common\models\MedCompany::statuses()) ?>
							<?php endif ?>

            </div>
            <div class="card-footer">
	            <?php echo Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
