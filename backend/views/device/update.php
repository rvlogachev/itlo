<?php

/**
 * @var yii\web\View $this
 * @var common\models\Device $model
 */

$this->title = 'Обновление: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Устройства', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="device-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
