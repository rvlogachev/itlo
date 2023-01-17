<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedPositionCompany $model
 */

$this->title = Yii::t('backend', 'Добавить' );
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Должности компании'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-position-company-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
