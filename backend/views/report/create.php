<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedReport $model
 */

$this->title = 'Create Med Report';
$this->params['breadcrumbs'][] = ['label' => 'Med Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-report-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
