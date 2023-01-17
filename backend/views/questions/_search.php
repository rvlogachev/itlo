<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Questions $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="questions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'text') ?>
    <?php echo $form->field($model, 'answer1') ?>
    <?php echo $form->field($model, 'answer2') ?>
    <?php echo $form->field($model, 'answer3') ?>
    <?php // echo $form->field($model, 'answer4') ?>
    <?php // echo $form->field($model, 'answer5') ?>
    <?php // echo $form->field($model, 'priority') ?>
    <?php // echo $form->field($model, 'success_answer') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
