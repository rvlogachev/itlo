<?php

/**
 * @var yii\web\View $this
 * @var common\models\BalanceHistory $model
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Balance History',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Balance Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="balance-history-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
