<?php

use common\models\MedDoctors;
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\MedReportSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Журнал отчетов';
$this->params['breadcrumbs'][] = $this->title;

$defaultStyle = [
	'alignment'=> ['horizontal'],
	'font' => ['bold' => true],
	'fill' => [
		'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
		'color' => [
			'argb' => 'FFE5E5E5',
		],
	],
	'borders' => [
		'outline' => [
			'borderStyle' =>  \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
			'color' => ['argb' =>   \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK],
		],
		'inside' => [
			'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK],
		]
	],
];

?>
<div class="med-report-index">
    <div class="card">


			<div class="card-header">
            <?php  echo $this->render('_search', ['model' => $searchModel,    'dataProvider' => $dataProvider, 'users'=>$users]); ?>
			</div>
			<div class="card-header">
				<label>Экспорт отчета</label><br>
		  <?php echo \kartik\export\ExportMenu::widget([
			  'dataProvider' => $dataProvider,
			  'showColumnSelector'=> false,
			  'columns' => $gridColumns,
				'headerStyleOptions'=>[
							\kartik\export\ExportMenu::FORMAT_HTML => $defaultStyle,
							\kartik\export\ExportMenu::FORMAT_PDF => $defaultStyle,
							\kartik\export\ExportMenu::FORMAT_EXCEL => $defaultStyle,
							\kartik\export\ExportMenu::FORMAT_EXCEL_X => $defaultStyle,
				]
		  ]); ?>
			</div>
			<div class="card-header">
			  <?php echo getDataProviderSummary($dataProvider) ?>
			</div>
			<div class="card-body p-0">
            <?php echo \kartik\grid\GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,


                'columns' => [
									'id',

	                [
		                'header' => 'Терминал',
		                'format' => 'raw',

		                'value' =>function($data){
			                return  substr($data->token, 0, 20);
		                },

	                ],

	                [
		                'header' => 'Дата время',
		                'format' => 'raw',

		                'value' =>function($data){


            					;

			                return  Yii::$app->formatter->asDatetime($data->date_report). "<br>" .$data->getTime();
		                },

	                ],
	                [
		                'header' => 'Организация',
		                'format' => 'raw',
		                'value' =>function($data){
					                $model = \common\models\MedCompany::find()->where(['id'=>$data->company_id])->one() ;
					                if($model){
						                return $model->name;
					                }
		                },
	                ],
	                [
		                'header' => 'ФИО',
		                'format' => 'raw',

		                'value' =>function($data){

			                $text = '';
			                $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
			                foreach ($model as $item){
				                if(isset($item->data['data']['user'])){
					                $text = $item->data['data']['user']['firstname'].' '.$item->data['data']['user']['middlename'].' '.$item->data['data']['user']['lastname'];
				                }



			                }

			                return $text;

		                },

	                ],
	                [
		                'header' => 'Комментарий',
		                'format' => 'raw',

		                'value' =>function($data){

			                $text = '';
			                $model = \common\models\MedConference::find()->where(['report'=>$data->id])->one();
			                if($model){
				                return $model->result;
			                }

		                },

	                ],


	                [
		                'header' => 'Статус медосмотра',
		                'class' => \common\grid\EnumColumn::class,
		                'format' => 'raw',
		                'attribute' => 'status',
		                'enum' => \common\models\MedReport::statuses(),
		                'filter' =>\common\models\MedReport::statusesTxt()
	                ],

	                [
		                'class' => \common\widgets\ActionColumn::class,
		                'template' => '  {view} {delete}  ',

	                ],
                ],
            ]); ?>
    
      </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
