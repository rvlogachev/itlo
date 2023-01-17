<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Screens */
/* @var $form yii\bootstrap\ActiveForm */

$arr = \yii\helpers\ArrayHelper::map(\common\modules\bot\models\BotScreens::find()->orderBy(["platform" =>SORT_DESC])->all(), 'id', 'title');


foreach($arr as $key=>$item){

    $model = \common\modules\bot\models\BotScreens::findOne($key);
    $arr2[$key]=$item."  (".$model->platform.")";
}


?>

<div class="screens-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <div class="col-md-4  ">



            <?php echo $form->field($model, 'parent_id')->dropDownlist(
                $arr2
            // ['value' => $sid]
            ) ?>
            <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                 <?php //echo $form->field($model, 'function')->textInput(Yii::$app->user->can('debug')?['maxlength' => true,]:['disabled'=>'disabled','maxlength' => true] ) ?>
        </div>

        <div class="col-md-4">
            <?php echo $form->field($model, 'key')->textInput(Yii::$app->user->can('debug')?['maxlength' => true,]:['disabled'=>'disabled','maxlength' => true]  ) ?>
            <?php echo $form->field($model, 'timeout')->textInput(Yii::$app->user->can('debug')?['maxlength' => true,]:['disabled'=>'disabled','maxlength' => true]) ?>


        </div>
        <div class="col-md-4  ">

            <?php echo $form->field($model, 'is_start')->checkbox(Yii::$app->user->can('debug')?['maxlength' => true,]:['disabled'=>'disabled','maxlength' => true] ) ?>

            <?php echo $form->field($model, 'platform')->dropDownList(['telegram','facebook','vk','viber']) ?>


            <?php echo $form->field($model, 'status')->checkbox(Yii::$app->user->can('debug')?['maxlength' => true,]:['disabled'=>'disabled','maxlength' => true] ) ?>

            </div>
        <div class="col-md-12  ">

            <?php echo $form->field($model, 'thumbnail')->widget(
                \trntv\filekit\widget\Upload::className(),
                [
                    'url' => ['/bot/screens/upload-img'],
                    'maxFileSize' => 5000000, // 5 MiB
                ]);
            ?>

        </div>



    </div>

    <div class="form-group"  style="text-align:right;">

        <?php echo Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
