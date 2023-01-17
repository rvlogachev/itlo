<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\tasks\models\TasksWorkflowSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">
            <a data-toggle="collapse" href="#tasksWorkflowSearch">
                <span class="glyphicon glyphicon-search"></span> <?= Yii::t('app/modules/tasks', 'Workflow search') ?>
            </a>
        </h5>
    </div>
    <div id="tasksWorkflowSearch" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="tasks-workflow-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    'options' => [
                        'data-pjax' => 1
                    ],
                ]); ?>

                <?= $form->field($model, 'id') ?>

                <?= $form->field($model, 'task_id') ?>

                <?= $form->field($model, 'owner_id') ?>

                <?= $form->field($model, 'assigned_id') ?>

                <?= $form->field($model, 'description') ?>

                <?php // echo $form->field($model, 'deadline_at') ?>

                <?php // echo $form->field($model, 'started_at') ?>

                <?php // echo $form->field($model, 'completed_at') ?>

                <?php // echo $form->field($model, 'created_at') ?>

                <?php // echo $form->field($model, 'updated_at') ?>

                <?php // echo $form->field($model, 'status') ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app/modules/tasks', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('app/modules/tasks', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
