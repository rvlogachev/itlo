<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\BalanceHistory $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="balance-history-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'company_id')->textInput() ?>
                <?php echo $form->field($model, 'terminal_id')->textInput() ?>
                <?php echo $form->field($model, 'date_report')->textInput() ?>
                <?php echo $form->field($model, 'old')->textInput() ?>
                <?php echo $form->field($model, 'new')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
