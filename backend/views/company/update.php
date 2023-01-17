<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedCompany $model
 */

$this->title = 'Обновление компании: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="med-company-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
