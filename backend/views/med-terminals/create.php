<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedTerminals $model
 */

$this->title = 'Добавление терминала';
$this->params['breadcrumbs'][] = ['label' => 'Терминалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-terminals-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
