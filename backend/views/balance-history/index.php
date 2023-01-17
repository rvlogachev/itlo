<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\BalanceHistorySearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'История баланса');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-history-index">
    <div class="card">


        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
					<div class="card-footer">
	          <?php echo getDataProviderSummary($dataProvider) ?>
					</div>
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
		                'attribute' => 'company_id',
		                'format' => 'raw',
		                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->all(),'id','name'),
		                'value' =>function($data){
			                $model = \common\models\MedCompany::find()->where(['id'=>$data->company_id])->one();
			                if($model){
				                return  $model->name;
			                }

		                },

	                ],

	                [
		                'attribute' => 'date_report',
		                'format' => 'raw',
	                  'filter' =>   \kartik\daterange\DateRangePicker::widget([

	                    'attribute' => 'date_report',
	                    'model'=>$searchModel,
											'convertFormat'=>true,
//											'useWithAddon'=>true,
											'pluginOptions'=>[
											 'format' => 'd.mm.yyyy',
			                  'todayHighlight' => true,
												'locale'=>[
													'format'=>'d.m.Y',
													'separator'=>' - ',
												],
//												'opens'=>'left'
											],
											'options' => ['placeholder' => 'Выбор даты', 'autocomplete'=>'off', 'class'=> 'form-control'],

	                  ]),
		                'value' =>function($data){
			                return   Yii::$app->formatter->asDatetime($data->date_report);
		                },
	                ],


	                [

		                'class' => \common\grid\EnumColumn::class,
		                'format' => 'raw',
		                'attribute' => 'type',
		                'enum' => \common\models\BalanceHistory::typesText(),
		                'filter' => \common\models\BalanceHistory::types(),

	                ],
	                [
		                'attribute' => 'value',
		                'format' => 'raw',
		                'value' =>function($data){
		                return Yii::$app->formatter->asCurrency($data->value);
		                },
	                ],
	                [
		                'attribute' => 'old',
		                'format' => 'raw',
		                'value' =>function($data){
		                return Yii::$app->formatter->asCurrency($data->old);
		                },
	                ],
	                [
		                'attribute' => 'new',
		                'format' => 'raw',
		                'value' =>function($data){
		                return Yii::$app->formatter->asCurrency($data->new);
		                },
	                ],
	                [
		                'attribute' => 'reason',
		                'format' => 'html',
		                'value' =>function($data){
            				  return  $data->reason;
		                },
	                ],
//	                [
//		                'class' => \common\widgets\ActionColumn::class,
//		                'template' => '  {view}    ',
//
//	                ],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
