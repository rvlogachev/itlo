<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedDoctors $model
 */

$this->title = 'Обновление : ' . ' ' . $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Med Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="med-doctors-update">

    <?php echo $this->render('_form', [
        'model' => $model,
	    	'users' => $users,
    ]) ?>

</div>
