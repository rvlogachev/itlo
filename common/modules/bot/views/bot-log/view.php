<?php

use common\components\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bot Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-log-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'update_id',
            'is_callback',
            'callback_query_id',
            'callback_query_from_id',
            'callback_query_from_is_bot',
            'callback_query_from_first_name',
            'callback_query_from_username',
            'callback_query_from_language_code',
            'callback_chat_instance',
            'callback_data',
            'message_id',
            'from_id',
            'from_is_bot',
            'from_first_name',
            'from_username',
            'from_language_code',
            'chat_id',
            'chat_first_name',
            'chat_username',
            'chat_type',
            'date',
            'text:ntext',
            'entities:ntext',
        ],
    ]) ?>

</div>
