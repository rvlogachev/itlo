<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Userbot */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="userbot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php //echo $form->field($model, 'id')->textInput() ?>

    <?php //echo $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'username')->textInput(['maxlength' => true]) ?>


    <?php echo $form->field($model, 'phone')->textInput() ?>
    <?php echo $form->field($model, 'platform')->textInput() ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'status')->checkbox() ?>



    <?php echo $form->field($model, 'role')->dropDownList(\yii\helpers\ArrayHelper::map( \common\modules\rbac\models\RbacAuthItem::find()->where(['type'=>1])->all(),'name','description'),['prompt'=>'Установить роль']) ?>







    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
