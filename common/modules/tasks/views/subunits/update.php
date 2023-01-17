<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\tasks\models\TasksSubunits */

$this->title = Yii::t('app/modules/tasks', 'Update Tasks Subunits: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/tasks', 'Tasks'), 'url' => ['../tasks']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/tasks', 'Subdivisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/modules/tasks', 'Update');
?>
<div class="tasks-subunits-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
