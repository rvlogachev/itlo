<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\WidgetText */
/* @var $form yii\bootstrap\ActiveForm */
?>
<script type="application/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.btn-ajax-modal').on('click', function (event) {


                $("#buttons-text").val('');
                $("#buttons-callback_data").val('');

            });

        });
    });
</script>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row">

    <div class="col-md-4">
        <?php echo $form->field($model, 'screens_id')->dropDownlist(
            \yii\helpers\ArrayHelper::map(\common\modules\bot\models\BotScreens::find()->all(), 'id', 'title'),
            Yii::$app->user->can('debug') ?
                ['value' => $sid] :
                ['disabled' => 'disabled', 'value' => $sid]
        )->label('Экран') ?>



    </div>

    <div class="col-md-4">
        <?php //echo $form->field($model, 'key')->textInput(Yii::$app->user->can('debug')?['maxlength' => true]:['disabled'=>'disabled','maxlength' => true] ) ?>
        <?php echo $form->field($model, 'title')->textInput(['maxlength' => 512])->label('Название сообщения') ?>


    </div>
    <div class="col-md-2">
        <?php echo $form->field($model, 'sort')->textInput(['maxlength' => 512]) ?>

    </div>
    <div class="col-md-2">
        <?php echo $form->field($model, 'status')->checkbox() ?>

    </div>

</div>

<div class="row">
    <div class="col-lg-4">




        <?php echo $form->field($model, 'attachments')->widget(
            Upload::class,
            [
                'url' => ['/file/storage/upload'],
                'sortable' => false,
                'maxFileSize' => 10000000, // 10 MiB
                'maxNumberOfFiles' => 10
            ]);
        ?>

    </div>
    <div class="col-lg-8">

                <?php echo $form->field($model, 'body')->widget(
                    trntv\aceeditor\AceEditor::className(),
                    [

                        //  'mode' => 'html'
                    ]
                ) ?>


    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <h4>Кнопки</h4>
        <div class=" pull-left  ">

            <?= Html::button('Добавить кнопку', [
                'data-toggle' => 'modal',
                'data-target' => '#modalvote',
                'class' => 'btn btn-success btn-ajax-modal',
                'value' => \yii\helpers\Url::to('/category/create'),

            ]); ?>
        </div>
        <br>
    </div>
</div>
<div class="row" style="margin: 10px;">

    <?php foreach (\common\modules\bot\models\BotButtons::find()->where(['widget_text_id' => $model->id])->all() as $btn) { ?>
        <div class="col-md-3">
            <div class="row">
                <ul class="buttons-list">
                    <li class="  btnScreen <?= $btn->size=='big'?'btn-width-1':''?><?= $btn->size=='middle'?'btn-width-2':''?><?= $btn->size=='small'?'btn-width-3':''?><?= $btn->size=='minismall'?'btn-width-5':''?>">
                        <button class="btn btn-default btn-sm" style="color: #ad5a55; border-color: #ad5a55; background-color: rgb(255, 255, 255);"><span>
                                <?= $btn->text ?>
                            </span>
                        </button>

                    </li>
                </ul>

            </div>
            <div class="row">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-pencil\"\"></span>", \yii\helpers\Url::to(['/bot/buttons/update', 'id' => $btn->id, 'sid' => $model->getScreens()->one()->id, 'wid' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                                <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-trash\"\"></span>", \yii\helpers\Url::to(['/bot/buttons/delete', 'id' => $btn->id, 'sid' => $model->getScreens()->one()->id, 'wid' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                                <?= $btn->status ? "<label class='label label-success' >Акт </label>" : "<label class='label label-danger' >откл. </label>" ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<div class="form-group pull-right">
    <?php echo Html::submitButton(
        'Сохранить',
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    ) ?>
</div>

<?php ActiveForm::end(); ?>




<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////?>


<?php \yii\bootstrap\Modal::begin([
    'id' => 'modalvote',
    'header' => '<h3>Добавление кнопки</h3>',

]); ?>

<?php $form = ActiveForm::begin([
    'id' => 'formbtn',

]); ?>

<?php echo $form->errorSummary($modelButtons); ?>


<div class="row">
    <div class="col-md-8  ">
        <?php echo $form->field($modelButtons, 'text')->textInput(['value' => '']) ?>
    </div>
    <div class="col-md-4  ">
        <?php echo $form->field($modelButtons, 'callback_data')->textInput(['value' => '']) ?>
    </div>
</div>


<div class="row">
    <div class="col-md-4  ">

        <?php echo $form->field($modelButtons, 'type')->dropDownlist(
            [
                'InlineKeyboardMarkup' => 'InlineKeyboard',
                'InlineKeyboardMarkup_url' => 'url InlineKeyboard',
                'ReplyKeyboardMarkup' => 'ReplyKeyboard',

            ],
            ['value' => $modelButtons->type]
        ) ?>


    </div>
    <div class="col-md-4  ">
        <?php echo $form->field($modelButtons, 'size')->dropDownlist(
            ['big' => 'Большая кнопка (1 в строку)', 'middle' => 'Средняя кнопка (2 в строку)', 'small' => 'Маленькая кнопка (3 в строку)', 'minismall' => 'Маленькая кнопка (4 в строку)'],
            ['value' => $modelButtons->size]
        ) ?>


    </div>
    <div class="col-md-4 ">

        <?php echo $form->field($modelButtons, 'status')->dropDownlist(
            ['1' => 'Активно', '0' => 'Выключено'],
            ['value' => $modelButtons->status]
        ) ?>

    </div>
</div>


<div class="form-group text-center">
    <?php echo Html::submitButton('ДОбавить', ['class' => $modelButtons->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php \yii\bootstrap\Modal::end(); ?>
