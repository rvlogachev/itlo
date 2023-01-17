<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedSettings $model
 */

$this->title = 'Create Med Settings';
$this->params['breadcrumbs'][] = ['label' => 'Med Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-settings-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
