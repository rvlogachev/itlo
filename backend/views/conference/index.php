<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\modelsMedConferenceSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Конференции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-conference-index">
    <div class="card">

			<div class="card-footer">
	      <?php echo getDataProviderSummary($dataProvider) ?>
			</div>
        <div class="card-body p-0">
            <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
	                [
		                'header' => 'Дата',
		                'format' => 'raw',
		                'value' =>function($data){
			               return Yii::$app->formatter->asDatetime($data->date_conf);
		                },
	                ],
	                [
		                'header' => 'Фото врача',
		                'format' => 'raw',
		                'value' =>function($data){
											$model = \common\models\MedDoctors::find()->where(['id'=>$data->doctor_id])->one();
											if($model){
						  						return  "	<div class=\"row\">
																			<div class=\"col-4\">
																						<img width='80' src='".$model->getUrl()."'>"."
																			</div>
																			<div class=\"col-8\">
																						".$model->fio."
																			</div>
																		</div>";
											}
		                },
	                ],
	                [
		                'header' => 'Фото пациента',
		                'format' => 'raw',
		                'value' =>function($data){
			                $model = \common\models\UserProfile::find()->where(['user_id'=>$data->user_id])->one();
			                if($model){
		                  return  "	<div class=\"row\">
																			<div class=\"col-4\">
																						<img width='80' src='".$model->getAvatar()."'>"."
																			</div>
																			<div class=\"col-8\">
																						".$model->lastname." ".$model->firstname." ".$model->middlename."
																			</div>
																		</div>";

			                }
		                },
	                ],
	                [
		                'header' => 'Статус ',
		                'class' => \common\grid\EnumColumn::class,
		                'format' => 'raw',
		                'attribute' => 'status',
		                'enum' => \common\models\MedConference::statuses(),
		                'filter' =>\common\models\MedConference::statusesTxt()
	                ],
	                'result:text',


	                [
		                'class' => \common\widgets\ActionColumn::class,
		                'template' => '  {view}  ',
                     'visibleButtons' => [
                        'view' => function ($data) {
                            return $data->status == \common\models\MedConference::NEW_STATUS;
                        },
                    ]

	                ],





                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
