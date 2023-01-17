<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\bot\models\BotOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bot Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-order-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Bot Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'name',
//            'date_birth',
//            'time_birth',
            // 'place_birth',
            // 'name_partner',
            // 'date_birth_partner',
            // 'time_birth_partner',
            // 'place_birth_partner',
             'email',

            [
                'attribute'=>'status',
                'value'=>function ($data) {
                    return  ($data->status==1)?'Оплачено':'Не оплачено';
                }
            ],

              'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
