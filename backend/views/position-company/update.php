<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedPositionCompany $model
 */

$this->title = Yii::t('backend', 'Обновление: ', [
    'modelClass' => 'Должности компании',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Должности компании'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновление');
?>
<div class="med-position-company-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
