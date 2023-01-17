<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Questions $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="questions-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'text')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'answer1')->textInput(['maxlength' => true, 'class'=>'form-control question1']) ?>
                <?php echo $form->field($model, 'answer2')->textInput(['maxlength' => true, 'class'=>'form-control question2']) ?>
                <?php echo $form->field($model, 'answer3')->textInput(['maxlength' => true, 'class'=>'form-control question3']) ?>
                <?php echo $form->field($model, 'answer4')->textInput(['maxlength' => true, 'class'=>'form-control question4']) ?>
                <?php echo $form->field($model, 'answer5')->textInput(['maxlength' => true, 'class'=>'form-control question5']) ?>
                <?php echo $form->field($model, 'priority')->textInput() ?>

								<?php if ($model->isNewRecord):?>
		                <?php echo $form->field($model, 'success_answer')->dropDownList([] ) ?>
								<?php else: ?>
	                <?php echo $form->field($model, 'success_answer')->dropDownList($successArr ) ?>
                <?php endif; ?>
                
            </div>
            <div class="card-footer">
	            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
