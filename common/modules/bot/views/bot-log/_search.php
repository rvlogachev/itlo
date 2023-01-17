<?php

use common\components\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotLogSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bot-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'update_id') ?>

    <?php echo $form->field($model, 'is_callback') ?>

    <?php echo $form->field($model, 'callback_query_id') ?>

    <?php echo $form->field($model, 'callback_query_from_id') ?>

    <?php // echo $form->field($model, 'callback_query_from_is_bot') ?>

    <?php // echo $form->field($model, 'callback_query_from_first_name') ?>

    <?php // echo $form->field($model, 'callback_query_from_username') ?>

    <?php // echo $form->field($model, 'callback_query_from_language_code') ?>

    <?php // echo $form->field($model, 'callback_chat_instance') ?>

    <?php // echo $form->field($model, 'callback_data') ?>

    <?php // echo $form->field($model, 'message_id') ?>

    <?php // echo $form->field($model, 'from_id') ?>

    <?php // echo $form->field($model, 'from_is_bot') ?>

    <?php // echo $form->field($model, 'from_first_name') ?>

    <?php // echo $form->field($model, 'from_username') ?>

    <?php // echo $form->field($model, 'from_language_code') ?>

    <?php // echo $form->field($model, 'chat_id') ?>

    <?php // echo $form->field($model, 'chat_first_name') ?>

    <?php // echo $form->field($model, 'chat_username') ?>

    <?php // echo $form->field($model, 'chat_type') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'entities') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
