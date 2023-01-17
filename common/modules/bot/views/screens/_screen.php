<?php

use yii\helpers\Markdown;
use kartik\editable\Editable;

?>
<?php /** @var $model \common\models\Product */
$bundle = $this->getAssetManager()->getBundle('common\modules\bot\assets\BotAsset'); // получить бандл

?>
<?php  // \yii\helpers\VarDumper::dump($model->getWidgetText()->all()[0],10,true);die; ?>
<style type="text/css">
    .btnShow{

        top:-20px;


    }


</style>



<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 text-center">

            <div class="" style="margin-top: 20px;margin-bottom:5px; text-align:right  " >
                <?php if ( Yii::$app->user->can('debug')){?>

                    <?= \yii\helpers\Html::a("<span class=\"icon expand-icon glyphicon glyphicon-plus\"></span>", \yii\helpers\Url::to(['/bot/widget-text/create', 'sid' => $model->id]), [ 'class' => 'img-thumbnail']) ?>
                <?php }?>
                <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-user\"></span>", \yii\helpers\Url::to(['/bot/default/send-user', 'screen_id' => $model->id]), ['class' => 'img-thumbnail']) ?>

                <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-pencil\"\"></span>", \yii\helpers\Url::to(['/bot/screens/update', 'id' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                <?php if ( Yii::$app->user->can('debug')){?>
                    <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-trash\"\"></span>", \yii\helpers\Url::to(['/bot/screens/delete', 'id' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                <?php }?>
            </div>
            <h4> <?= $model->title ?></h4>
            <?php if ( Yii::$app->user->can('debug')){?>
                <?= $model->status ? "<label class='badge pull-right  label-success' >Активно </label>" : "<label class='badge pull-right  label-danger' >откл. </label>" ?>
            <?php }?>
        </div>

    </div>

    <?php $replay_btn=[]; foreach ($model->getWidgetText()->orderBy(['sort' => SORT_ASC])->all() as $widget) { $replay_btn[]=$widget->id;   ?>

        <div class="row" style="border: solid 1px <?= $widget->status?"#00a7d0":"#953b39"?>; margin-bottom: 10px;">
            <div  class="col-md-12">
                <div class="row" style="   ">
                    <div class="col-md-12" >
                        <div   style="text-align: right">
                            <div  class="" style="margin-top: 20px;  ">

                                <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-pencil\"></span>", \yii\helpers\Url::to(['/bot/widget-text/update', 'sid' => $model->id, 'id' => $widget->id]), ['class' => 'img-thumbnail']) ?>
                                <?php if ( Yii::$app->user->can('debug')){?>
                                    <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-trash\"\"></span>", \yii\helpers\Url::to(['/bot/widget-text/delete', 'id' => $widget->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>

                                    <label class="badge pull-right  label-danger"><?= $widget->id ?></label>
                                <?php }?>
                            </div>
                        </div>

                        <?php  foreach ($widget->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {  ?>

                            <?php if($image->type=='image/jpeg'  || $image->type == 'image/gif' || $image->type == 'image/png' ){ ?>
                                <?= \yii\helpers\Html::img(\yii\helpers\Url::to($image->getUrl()),['style'=>'margin-top: 10px;height:210px;','class'=>'img-thumbnail']) ?>
                            <?php }?>
                            <br>
                            <?php if($image->type=='video/mp4'){ ?>
                                <video  height="210" controls="controls" >
                                    <source src="<?= $image->getUrl() ?>" type='video/mp4;'>
                                </video>
                            <?php }?>
                        <?php }   ?>



                        <br><br>
                        <?php if ($widget->body) { ?>
                            <h4> <?= $widget->body ?></h4>
                        <?php } ?>

                    </div>
                </div>
                <br>
                <div class="row"  >
                    <?php foreach (\common\modules\bot\models\BotButtons::find()->where(['widget_text_id' => $widget->id])->andWhere(['not', ['type' => 'ReplyKeyboardMarkup']])->all() as $btn) { ?>
                        <div class="<?= $btn->size=='big'?'col-md-12':''?><?= $btn->size=='middle'?'col-md-6':''?><?= $btn->size=='small'?'col-md-4':''?><?= $btn->size=='minismall'?'col-md-3':''?>" >
                            <div style=" width: 100%; margin-bottom: 5px;" class="btn <?= $btn->type == 'InlineKeyboardMarkup' ? "btn-info" : "" ?><?= $btn->type == 'ReplyKeyboardMarkup' ? "btn-success" : "" ?><?= $btn->type == 'InlineKeyboardMarkup_url' ? "btn-info" : "" ?>">
                                <div class="" style="text-align: right">
                                    <div class="btnShow " style="display: block; ">
                                        <?php if ( Yii::$app->user->can('debug')){?>
                                            <?php $count = \common\modules\bot\models\BotScreens::find()->where(['key' => $btn->callback_data])->count();
                                            if (!$count > 0) {?>
                                                <?= \yii\helpers\Html::a("<span class=\"icon expand-icon glyphicon glyphicon-plus\"></span>",
                                                    \yii\helpers\Url::to(['/bot/screens/create', 'parentid' => $model->id, 'key' => $btn->callback_data]), ['class' => 'img-thumbnail']) ?>
                                            <?php } ?>
                                        <?php }?>
                                        <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-pencil\"\"></span>",
                                            \yii\helpers\Url::to(['/bot/buttons/update', 'id' => $btn->id, 'sid' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                                        <?php if ( Yii::$app->user->can('debug')){?>
                                            <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-trash\"\"></span>",
                                                \yii\helpers\Url::to(['/ben-bot/buttons/delete', 'id' => $btn->id, 'sid' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                                        <?php }?>
                                    </div>
                                </div>
                                <?= $btn->text ?>&nbsp;&nbsp;&nbsp;
                                <?php  if ($btn->type == 'InlineKeyboardMarkup_url') : ?>


                             <img width='15' src='<?= $bundle->baseUrl.'/img/url.png';?>' >
                                    <br>
                                    <?php endif;?>
                                <?php if ( Yii::$app->user->can('debug')){?>
                                    <br><small style='color:#5c5c5c;'><?= $btn->callback_data ?></small>
                                <?php }?>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="<?= $bundle->baseUrl.'/img/input.jpg';?>" style="width: 100%; ">
        </div>
    </div>
    <div class="row" style="padding: 25px 10px 10px 10px; ">

        <?php foreach ($replay_btn as $msgId) { ?>

            <?php foreach (\common\modules\bot\models\BotButtons::find()->where(['widget_text_id' => $msgId,'type' => 'ReplyKeyboardMarkup'])->all() as $btn) { ?>
                <div class="<?= $btn->size=='big'?'col-md-12':''?><?= $btn->size=='middle'?'col-md-6':''?><?= $btn->size=='small'?'col-md-4':''?><?= $btn->size=='minismall'?'col-md-3':''?>" >
                    <div style="width: 100%; margin-bottom: 5px;"  class="btn <?= $btn->type == 'InlineKeyboardMarkup' ? "btn-info" : "" ?><?= $btn->type == 'ReplyKeyboardMarkup' ? "btn-success" : "" ?>">
                        <div class="pull-right" style="margin-right: 55px;">
                            <div class="btnShow pull-right" style="display: block;position: absolute">
                                <?php $count = \common\modules\bot\models\BotScreens::find()->where(['key' => $btn->callback_data])->count();
                                if (!$count > 0) {?>
                                    <?= \yii\helpers\Html::a("<span class=\"icon expand-icon glyphicon glyphicon-plus\"></span>",
                                        \yii\helpers\Url::to(['/bot/screens/create', 'parentid' => $model->id, 'key' => $btn->callback_data]), ['class' => 'img-thumbnail']) ?>
                                <?php } ?>
                                <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-pencil\"\"></span>",
                                    \yii\helpers\Url::to(['/bot/buttons/update', 'id' => $btn->id, 'sid' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                                <?php if ( Yii::$app->user->can('debug')){?>
                                    <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-trash\"\"></span>",
                                        \yii\helpers\Url::to(['/bot/buttons/delete', 'id' => $btn->id, 'sid' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                                <?php }?>
                            </div>
                        </div>
                        <?= $btn->text ?><br>
                        <?php if ( Yii::$app->user->can('debug')){?>
                            <small class="copy" style='color:#5c5c5c;'><?= $btn->callback_data ?></small>


                            <label class="badge pull-right  label-danger"><?= $msgId ?></label>
                        <?php }?>
                    </div>



                </div>
            <?php } ?>
        <?php } ?>
    </div>



</div>
