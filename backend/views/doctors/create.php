<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedDoctors $model
 */

$this->title = 'Добавление врача';
$this->params['breadcrumbs'][] = ['label' => 'Врачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-doctors-create">

    <?php echo $this->render('_form', [
        'model' => $model,
	    	'users' => $users,
    ]) ?>

</div>
