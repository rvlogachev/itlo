<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedCompany $model
 */

$this->title = 'Пополнение баланса: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Пополнение баланса';
?>
<div class="med-company-update">

	<?php $form = \yii\widgets\ActiveForm::begin(); ?>
	<div class="card">
		<div class="card-body">
		<?php echo $form->errorSummary($model); ?>

		<div class="col-2">
			<label>Введите сумму для пополения</label>
		<?php echo $form->field($model, 'balance')->textInput(['maxlength' => true]) ?>

		</div>
			<div class="col-2">
				<label>Основание</label>
		  <?php echo $form->field($model, 'reason')->textarea(['rows'=>"5", 'cols'=>"200" ])->label(false) ?>

			</div>


		</div>
		<div class="card-footer">
		<?php echo \yii\helpers\Html::submitButton('Пополнить', ['class' => 'btn btn-primary', 'data' => [
		'confirm' => 'Вы действительно хотите пополнить баланс?',
		'method' => 'post',
	],]) ?>
		</div>
	</div>
	<?php  \yii\widgets\ActiveForm::end(); ?>
</div>
