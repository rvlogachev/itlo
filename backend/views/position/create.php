<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedPosition $model
 */

$this->title ='Добавление должности';
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Должности'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-position-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
