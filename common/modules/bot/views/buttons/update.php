<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Buttons */

$this->title = 'Редактирование кнопки: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Кнопки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->text, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="buttons-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
