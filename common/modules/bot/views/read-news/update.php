<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReadNews */

$this->title = 'Update Read News: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Read News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="read-news-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
