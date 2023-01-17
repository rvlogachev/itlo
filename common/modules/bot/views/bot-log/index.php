<?php

use common\components\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\bot\models\BotLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bot Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-log-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo \yii\helpers\Html::a('Create Bot Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            'id' ,
            'update_id',
            'is_callback' ,
            'callback_query_id' ,
            'callback_query_from_id' ,
            'callback_query_from_is_bot' ,
            'callback_query_from_first_name',
            'callback_query_from_username' ,
            'callback_query_from_language_code' ,
            'callback_chat_instance' ,
            'callback_data' ,
            'message_id' ,
            'from_id' ,
            'from_is_bot' ,
            'from_first_name',
            'from_username' ,
            'from_language_code',
            'chat_id' ,
            'chat_first_name' ,
            'chat_username' ,
            'chat_type' ,
            'date' ,
            'text' ,
            'entities' ,

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
