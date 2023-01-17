<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\daterange\DateRangePicker;
/**
 * @var yii\web\View $this
 * @var common\models\MedReport $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="container-fluid">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

	<div class="row">
 		<div class="col-md-2">
<?php
		echo '<label class="control-label">Дата</label>';
		echo '<div class="input-group drp-container">';
		echo DateRangePicker::widget([
				'attribute'=>'date_report',
				'model'=>$model,
				'convertFormat'=>true,
				'useWithAddon'=>true,
				'pluginOptions'=>[

					'locale'=>[
						'format'=>'d.m.Y',
						'separator'=>' - ',
					],
					'opens'=>'left'
				],
				'options' => ['placeholder' => 'Выбор даты', 'autocomplete'=>'off', 'class'=> 'form-control']
			]) ;
		echo '</div>';?>
		</div>
		<div class="col-md-2"><?php echo $form->field($model, 'user_id')->dropDownList($users, ['prompt'=>'Выбор пользователя']) ?></div>
		<div class="col-md-2"><?php echo $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->all(),'id','name'),array('prompt'=>'Выбор компании')) ?></div>
		<div class="col-md-2"><?php echo $form->field($model, 'status')->dropDownList(\common\models\MedReport::statusesTxt(),array('prompt'=>'Выбор статуса')) ?></div>
		<div class="col-md-2" style="margin-top: 30px">

		<?php echo Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
		<?php echo Html::resetButton('Сбросить', ['class' => 'btn btn-secondary']) ?>
		</div>
		<div class="col-md-2">


		</div>
	</div>



    <?php ActiveForm::end(); ?>

</div>
