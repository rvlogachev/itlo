<?php

/**
 * @var yii\web\View $this
 * @var common\models\Questions $model
 */

$this->title = 'Обновление: ' . ' ' . $model->text;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->text, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="questions-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'successArr' => $successArr,

    ]) ?>

</div>
