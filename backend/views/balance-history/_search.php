<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\BalanceHistory $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="balance-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'company_id') ?>
    <?php echo $form->field($model, 'terminal_id') ?>
    <?php echo $form->field($model, 'date_report') ?>
    <?php echo $form->field($model, 'old') ?>
    <?php // echo $form->field($model, 'new') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
