<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\medSettingsSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-settings-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Create Med Settings', ['create'], ['class' => 'btn btn-success']) ?>
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
                    ['class' => 'yii\grid\SerialColumn'],

                    'user_id',
                    'reference_temp_ot',
                    'reference_temp_do',
                    'reference_bpp_up_ot',
                    'reference_bpp_up_do',
                    // 'reference_bpp_lower_ot',
                    // 'reference_bpp_lower_do',
                    // 'reference_bpp_pulse_ot',
                    // 'reference_bpp_pulse_do',
                    // 'reference_alco_ot',
                    // 'reference_alco_do',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
