<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedTerminals $model
 */

$this->title = 'Обновление терминала  ' . $model->adderss;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Терминалы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->adderss, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновление');
?>
<div class="med-terminals-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
