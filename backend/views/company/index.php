<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\MedCompanySearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Компании');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-company-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('backend', 'Добавить компанию'), ['create'], ['class' => 'btn btn-success']) ?>

        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
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
                        'attribute' => 'forma',
                        'filter'=>['ООО' => 'OOO', 'ЗАО'=>'ЗАО', 'ОАО'=>'ОАО', 'ИП'=>'ИП'],
                        'value' =>function($data){
                                return $data->forma;

                        },
                        'options' => ['style' => 'width: 10%'],
                    ],


                    'name',
										'phone',
                    'address',


	                [
		                'attribute' => 'balance',
	                  'format' => 'html',
		                'value' => function ($data) {
		                   return Yii::$app->formatter->asCurrency($data->balance);
		                },
	                ],
	                [
		                'attribute' => 'limit',
	                  'format' => 'html',
		                'value' => function ($data) {
		                		return Yii::$app->formatter->asCurrency($data->limit);
		                },
	                ],
	                [
		                'attribute' => 'rate',
	                  'format' => 'html',
		                'value' => function ($data) {
		                		return Yii::$app->formatter->asCurrency($data->rate);
		                },
	                ],
										[
											'class' => \common\grid\EnumColumn::class,
											'attribute' => 'status',
											'format' => 'raw',
											'enum' => \common\models\MedCompany::statusesText(),
											'filter' => \common\models\MedCompany::statuses()
										],
	                [
		                'class' => \common\widgets\ActionColumn::class,
		                'template' => '{view}   {update} {delete}',

		                'options' => ['style' => 'width: 140px'],

                    'visibleButtons' => [
                        'delete' => Yii::$app->user->can('administrator')
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
