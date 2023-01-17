<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\MedDoctors $model
 */

$this->title = $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Врачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-doctors-view">
    <div class="card">
			<div class="card-header float-right">
	      <?php echo Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	      <?php echo Html::a('Удалить', ['delete', 'id' => $model->id], [
		      'class' => 'btn btn-danger',
		      'data' => [
			      'confirm' => 'Вы действительно хотите удалить элемент?',
			      'method' => 'post',
		      ],
	      ]) ?>



			</div>

			<div class="card-body">

			<div class="row">
				<div class="col-2"><img class="fa-pull-right" width="250" src="<?= $model->getUrl()?>"></div>
				<div class="col-10">
			<?php echo DetailView::widget([
				'model' => $model,
				'attributes' => [
					'id',

					'fio',
					'phone',
					'email',

					'signature_hash',

				],
			]) ?>
				</div>
			</div>


    </div>
</div>
