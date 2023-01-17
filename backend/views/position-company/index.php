<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\MedPositionCompanySearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Должности компании');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-position-company-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('backend', 'Добавить должность'), ['create'], ['class' => 'btn btn-success']) ?>
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
                   'id',
                    'name',

//										[
//											'attribute' => 'company_id',
//											'format' => 'raw',
//											'value' =>function($data){
//            								$model = \common\models\MedCompany::findOne($data->company_id);
//            								if($model)
//            									return   $model->name;
//											},
//										],
	                [
		                'class' => \common\grid\EnumColumn::class,
		                'attribute' => 'status',
		                'format' => 'raw',
		                'enum' => \common\models\MedPositionCompany::statusesText(),
		                'filter' => \common\models\MedPositionCompany::statuses()
	                ],


                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
