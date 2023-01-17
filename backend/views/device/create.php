<?php

/**
 * @var yii\web\View $this
 * @var common\models\Device $model
 */

$this->title = 'Добавление устройства';
$this->params['breadcrumbs'][] = ['label' => 'Устройства', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
