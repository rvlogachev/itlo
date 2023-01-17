<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ButtonsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buttons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buttons-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Buttons', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'updated_at',
            'created_at',
            'key',
            'type',
            // 'size',
            // 'callback_data',
            // 'text',
            // 'status',
            // 'widget_text_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
