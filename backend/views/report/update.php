<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedReport $model
 */

$this->title = 'Update Med Report: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Med Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="med-report-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
