<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\tickets\models\TicketsMessagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">
            <a data-toggle="collapse" href="#ticketsMessagesSearch">
                <span class="glyphicon glyphicon-search"></span> <?= Yii::t('app/modules/tickets', 'Messages search') ?>
            </a>
        </h5>
    </div>
    <div id="ticketsMessagesSearch" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="tickets-messages-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    'options' => [
                        'data-pjax' => 1
                    ],
                ]); ?>

                <?= $form->field($model, 'id') ?>

                <?= $form->field($model, 'ticket_id') ?>

                <?= $form->field($model, 'sender_id') ?>

                <?= $form->field($model, 'message') ?>

                <?= $form->field($model, 'created_at') ?>

                <?php // echo $form->field($model, 'updated_at') ?>

                <?php // echo $form->field($model, 'attachment_id') ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app/modules/tickets', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('app/modules/tickets', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
