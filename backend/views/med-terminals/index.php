<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\MedTerminalsSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Терминалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-terminals-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
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

                    'terminal_id',
                    'adderss:ntext',
                    'fio',
										[
											'attribute' => 'company_id',
											'filter'=>\yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->all(),'id','name'),
											'value' =>function($data){
	 											return \common\models\MedCompany::getCompanyName($data->company_id);
											},

										],
                     'phone',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
