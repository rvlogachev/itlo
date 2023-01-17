<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedPosition $model
 */

$this->title = Yii::t('backend', 'Обновление должности: ', [
    'modelClass' => 'Должности',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Должности'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновление');
?>
<div class="med-position-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
