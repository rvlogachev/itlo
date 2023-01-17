<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\MedTerminals $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="med-terminals-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'terminal_id') ?>
    <?php echo $form->field($model, 'adderss') ?>
    <?php echo $form->field($model, 'fio') ?>
    <?php echo $form->field($model, 'position') ?>
    <?php // echo $form->field($model, 'phone') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
