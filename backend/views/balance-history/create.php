<?php

/**
 * @var yii\web\View $this
 * @var common\models\BalanceHistory $model
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Balance History',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Balance Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-history-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
