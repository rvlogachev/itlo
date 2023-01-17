<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Buttons */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Buttons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buttons-view">

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
            'updated_at',
            'created_at',
            'key',
            'type',
            'size',
            'callback_data',
            'text',
            'status',
            'widget_text_id',
        ],
    ]) ?>

</div>
