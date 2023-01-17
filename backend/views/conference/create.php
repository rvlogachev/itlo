<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedConference $model
 */

$this->title = 'Create Med Conference';
$this->params['breadcrumbs'][] = ['label' => 'Med Conferences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-conference-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
