<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\Userbot */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="userbot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'first_name') ?>

    <?php echo $form->field($model, 'last_name') ?>

    <?php echo $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'gosnumber') ?>

    <?php // echo $form->field($model, 'bonus') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'ima') ?>

    <?php // echo $form->field($model, 'fam') ?>

    <?php // echo $form->field($model, 'marka') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'users') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
