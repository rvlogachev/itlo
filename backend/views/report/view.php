<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\MedReport $model
 */

$this->title = "Журнал медосмотра  " ;

$this->params['breadcrumbs'][] = ['label' => 'Журнал ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user];
?>
<div class="med-report-view">
    <div class="card">
        <div class="card-header">
					<div class="float-right">
			  <?php echo Html::a('К списку медосмотров', ['index'], ['class' => 'btn btn-primary']) ?>
					</div>
					<div>
						Компания: <span style="font-size: large">  <?= $company;?>	</span>
					</div>
					<div>
						Пациент: <span  style="font-size: large">  <?=$user;?>	</span>
					</div>
					<div>
						Дата и время медосмотра: <span style="font-size: large">  <?= $dataReport;?>	</span>
					</div>



        </div>
        <div class="card-body">

	        <?php echo \yii\grid\GridView::widget([
		        'layout' => "{items}\n{pager}",
		        'options' => [
			        'class' => ['gridview', 'table-responsive'],
		        ],
		        'tableOptions' => [
			        'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
		        ],
		        'dataProvider' => $dataProvider,

		        'columns' => [


		        ['class' => 'yii\grid\SerialColumn'],

		        [
			        'header' => 'Дата время',
			        'format' => 'html',

			        'value' =>function($data) {
				        return $data['data'];
			        }
		        ],
		        [
			        'header' => 'Этап',
			        'format' => 'html',

			        'value' =>function($data) {
				        return $data['text'];
			        }
		        ],
		        [
			        'header' => 'Действие',
			        'format' => 'html',

			        'value' =>function($data) {
				        return $data['desc'];
			        }
		        ],



		        [
			        'header' => 'Результат',
			        'format' => 'html',

			        'value' =>function($data) {
						          return $data['value'];
			        }
		        ],


		        ],
	        ]); ?>



        </div>
    </div>
</div>
<?php



?>