<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedSettings $model
 */

$this->title = Yii::t('backend', 'Настройки системы'  );
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="med-settings-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
