<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Screens */

$this->title = 'Экран  - '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Экраны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="screens-view">

    <p>
        <?php echo Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'key',
            'title',

            'status',

        ],
    ]) ?>

</div>
