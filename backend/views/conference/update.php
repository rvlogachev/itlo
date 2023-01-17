<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedConference $model
 */

$this->title = 'Update Med Conference: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Med Conferences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="med-conference-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
