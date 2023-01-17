<?php

/**
 * @var yii\web\View $this
 * @var common\models\Questions $model
 */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
