<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use kartik\color\ColorInput;
/* @var $this yii\web\View */
/* @var $model common\models\Buttons */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="buttons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <div class="col-md-4  ">
            <?php echo $form->field($model, 'text')->textInput() ?>
            <?php echo $form->field($model, 'type')->dropDownlist(
                [

                    'InlineKeyboardMarkup' => 'InlineKeyboard',
                    'InlineKeyboardMarkup_url' => 'url InlineKeyboard',
                    'ReplyKeyboardMarkup' => 'ReplyKeyboard',

                ]
            ) ?>
            </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'size')->dropDownlist(
                ['big'=>'Большая кнопка (1 в строку)','middle'=>'Средняя кнопка (2 в строку)','small'=>'Маленькая кнопка (3 в строку)','minismall'=>'Маленькая кнопка (4 в строку)'],
                ['value'=>$model->size]
            ) ?>
            <?php echo $form->field($model, 'callback_data')->textInput(Yii::$app->user->can('debug')?['maxlength' => true,]:['disabled'=>'disabled','maxlength' => true] ) ?>

        </div>
        <div class="col-md-4  ">
            <?php //echo $form->field($model, 'url')->textInput() ?>
            <?php echo $form->field($model, 'status')->dropDownlist(
                ['1'=>'Активно','0'=>'Выключено'],
                ['value'=>$model->status]
            ) ?>
            <!--            --><?php //echo $form->field($model, 'request_contact')->dropDownlist(
            //                [0=>'не запрашивать тел',1=>'запросить тел'],
            //                ['value'=>$model->request_contact]
            //            ) ?>
<!--            --><?php //echo $form->field($model, 'request_location')->dropDownlist(
//                [0=>'не запрашивать местоположение',1=>'запросить местоположение'],
//                ['value'=>$model->request_location]
//            ) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php echo $form->field($model, 'request_contact')->dropDownlist(
                [0=>'не запрашивать тел',1=>'запросить тел'],
                ['value'=>$model->request_contact]
            ) ?>


        </div>
        <div class="col-md-4  ">
            <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
                'options' => ['placeholder' => 'Select color ...'],
            ]);?>


        </div>

        <div class="col-md-4">

            <?php echo $form->field($model, 'request_location')->dropDownlist(
                [0=>'не запрашивать местоположение',1=>'запросить местоположение'],
                ['value'=>$model->request_location]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

        </div>

        <div class="col-md-6">

            <div class="form-group" style="text-align:right">
                <?php echo Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
