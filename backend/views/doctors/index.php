<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\modelsMedDoctorsSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Врачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-doctors-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Добавить врача', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'header' => 'Фото',
                        'format' => 'raw',
                        'value' =>function($data){
                                return  "<img width='80' src='".$data->getUrl()."'";
                        },
                        'options' => ['style' => 'width: 5%'],
                    ],
                    'fio',
                    'phone',
                    'email',
                    'signature_hash',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
