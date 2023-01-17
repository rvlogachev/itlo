<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ReadNews */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Read News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-news-view">

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
            'user_id',
            'news_id',
            'like',
            'read',
            'komment',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
