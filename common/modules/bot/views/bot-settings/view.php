<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotSettings */

$this->title = $model->key;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Bot Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-settings-view">

    <p>
        <?php echo \yii\helpers\Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo \yii\helpers\Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'group_id',
            'key',
            'reqest',
        ],
    ]) ?>

</div>
