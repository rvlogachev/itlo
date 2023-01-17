<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotOrder */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bot Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-order-view">

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
            'type',
            'name',
            'date_birth',
            'time_birth',
            'place_birth',
            'name_partner',
            'date_birth_partner',
            'time_birth_partner',
            'place_birth_partner',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
