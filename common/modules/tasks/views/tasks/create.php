<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\tasks\models\Tasks */

$this->title = Yii::t('app/modules/tasks', 'Create task');
$this->params['breadcrumbs'][] = ['label' => $this->context->module->name, 'url' => ['list/all']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1><?= Html::encode($this->title) ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small></h1>
</div>
<div class="tasks-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
