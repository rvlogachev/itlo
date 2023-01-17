<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\MedCompany $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-company-view">
	<div class="card">
		<div class="card-header">
			<div class="float-right">
		  <?php echo Html::a('К списку компаний', ['index'], ['class' => 'btn btn-primary']) ?>
			</div>
		<?php if(\Yii::$app->user->can('administrator') ):?>
		<?php echo Html::a('Пополнить баланс', ['update-balance', 'id' => $model->id], [
			'class' => 'btn btn-danger',

		]); ?>
			<?php endif;?>

		</div>
		<div class="card-body">
		<?php echo DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id',
				'name',
				'forma',
				'address',
				[
					'attribute' => 'balance',
					'value' => function ($data) {
						  return $data->balance > 0 ? $data->balance . " ₽" : '0 ₽';
					},
				],
				[
					'attribute' => 'limit',
					'value' => function ($data) {
						if (!empty($data->limit)) return $data->limit . " ₽";
					},
				],
				[
					'attribute' => 'rate',
					'value' => function ($data) {
						if (!empty($data->rate)) return $data->rate . " ₽";
					},
				],
				[
						'class' => \kartik\grid\EnumColumn::class,
						'attribute' => 'status',
							'format'=>'html',
							'value' => function ($data) {
							 $ar = \common\models\MedCompany::statusesText();
							 return $ar[$data->status];
							},


				],

			],
		]) ?>
		</div>
	</div>
</div>
