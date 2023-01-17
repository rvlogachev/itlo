<?php
$bundle = \common\modules\bot\assets\ScreensAsset::register($this);
?>
<style type="text/css">
    .btnScreen{
        float: left;
    }
</style>
<div id="infomarket_widget_chat">

    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-5">
                    <h4> <?= $model->title ?></h4>

                </div>
                <div class="col-md-3">
                    <?php if ( Yii::$app->user->can('debug')){?>
                        <?= $model->status ? "<label class='badge pull-right  label-success' >Активно </label>" : "<label class='badge pull-right  label-danger' >откл. </label>" ?>
                    <?php }?>
                </div>
                <div class="col-md-4">
                    <?php if ( Yii::$app->user->can('debug')){?>
                        <?= \yii\helpers\Html::a("<span class=\"icon expand-icon glyphicon glyphicon-plus\"></span>", \yii\helpers\Url::to(['/bot/widget-text/create', 'sid' => $model->id]), [ 'class' => 'img-thumbnail']) ?>
                    <?php }?>
                    <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-pencil\"\"></span>", \yii\helpers\Url::to(['/bot/screens/update', 'id' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                    <?php if ( Yii::$app->user->can('debug')){?>
                        <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-trash\"\"></span>", \yii\helpers\Url::to(['/bot/screens/delete', 'id' => $model->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                    <?php }?>

                </div>
            </div>

        </div>
    </div>

    <div class="webbot-container">
        <div class="webbot-wrapper">
            <div class="webbot-header" style="background: <?= Yii::$app->keyStorage->get('header-color');?>;">
                <div class="head-text" style="font-size: 80%"> <?= Yii::$app->name; ?></div>
<!--                <div class="webbot-question" id="btnQuestion" style="visibility: visible">-->
<!--                    <a style="cursor:pointer;" class="close-chat-exit"><img src="/img/close5.png" height="25px"></a>-->
<!--                </div>-->
            </div>
            <div class="panel-body">
                <div class="messages-wrapper">
                    <ul class="messages-list">
                        <?php $replay_btn=[];
                        foreach ($model->getWidgetText()->orderBy(['sort' => SORT_ASC])->all() as $widget) { $replay_btn[]=$widget->id;   ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="badge pull-left  label-danger"><?= $widget->id ?></label>
                                        <div style="text-align:right">
                                            <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-pencil\"></span>", \yii\helpers\Url::to(['/bot/widget-text/update', 'sid' => $model->id, 'id' => $widget->id]), ['class' => 'img-thumbnail']) ?>
                                            <?php if ( Yii::$app->user->can('debug')){?>
                                                <?= \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-trash\"\"></span>", \yii\helpers\Url::to(['/bot/widget-text/delete', 'id' => $widget->id]), ['data-method' => 'post', 'class' => 'img-thumbnail']) ?>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                            <?php  foreach ($widget->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {  ?>
                            <li class="message clearfix">
                                <div class="media-body message-bot">
                                    <div class="message-img-wrapper">
                                        <div class="message-img pull-left">
                                        <?php if($image->type=='image/jpeg'  || $image->type == 'image/gif' || $image->type == 'image/png' ){ ?>
                                            <?= \yii\helpers\Html::img(\yii\helpers\Url::to($image->getUrl()),['style'=>'margin-top: 10px;height:210px;width:210px;','class'=>'img-thumbnail']) ?>
                                        <?php }?>
                                        <br>
                                        <?php if($image->type=='video/mp4'){ ?>
                                            <video  height="210" width="210" controls="controls" >
                                                <source src="<?= $image->getUrl() ?>" type='video/mp4;'>
                                            </video>
                                        <?php }?>
                                        <?php if($image->type=='application/pdf'){ ?>
                                            <embed src="<?= $image->getUrl() ?>" width="250" height="100"    type="application/pdf"></embed>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }   ?>

                        <li class="message clearfix">
                            <?php if ($widget->body) { ?>
                            <div class="media-body message-my"><!---->
                                <div class="message-text" style="background: lightpink;">



                                             <h5> <?= Yii::t('frontend', $widget->body) ?></h5>



                                    <div class="message-tail">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="24"
                                             viewBox="0 0 25 24">
                                            <g> <path d="M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6"
                                                      style="fill: lightpink;"></path> </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="message-buttons-bot media-body">
                                <ul class="buttons-list" style="    width: 89%;">
                            <?php foreach (\common\modules\bot\models\BotButtons::find()->where(['widget_text_id' => $widget->id])->andWhere(['not', ['type' => 'ReplyKeyboardMarkup']])->all() as $btn) { ?>

                                                <li <?=  isset($btn->callback_data)?'data-callback="'.$btn->callback_data.'"':'';?>  class="  btnScreen <?= $btn->size=='big'?'btn-width-1':''?><?= $btn->size=='middle'?'btn-width-2':''?><?= $btn->size=='small'?'btn-width-3':''?><?= $btn->size=='minismall'?'btn-width-5':''?>">
                                                    <button class="btn btn-default btn-sm" style="color: #ad5a55; border-color: #ad5a55; background-color: rgb(255, 255, 255);">
                                                        <span> <?= Yii::t('frontend',$btn->text) ?>  &nbsp;</span>
                                                    </button>
                                                </li>
                                        <?php } ?>
                                    </ul>
                                </div>


                        </li>

                        <?php } ?>

                    </ul>
                    <ul class="messages-wrapper">
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
                                            <?php echo $btn->text ?><br>
                                            <?php if ( Yii::$app->user->can('debug')){?>
                                                <small class="copy" style='color:#5c5c5c;'><?= $btn->callback_data ?></small>


                                                <label class="badge pull-right  label-danger"><?= $btn->id ?></label>
                                            <?php }?>
                                        </div>



                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="send-message" style="width:100%">
                <div class="send-message-visible">
                    <div class="send-message-block send-message-menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13">
                            <path d="M1323.6,677.529h14.8a0.787,0.787,0,0,0,0-1.529h-14.8A0.787,0.787,0,0,0,1323.6,677.529Zm0,5.736h14.8a0.788,0.788,0,0,0,0-1.53h-14.8A0.788,0.788,0,0,0,1323.6,683.265Zm0,5.735h14.8a0.787,0.787,0,0,0,0-1.529h-14.8A0.787,0.787,0,0,0,1323.6,689Z"
                                  transform="translate(-1323 -676)" style="fill: <?= Yii::$app->keyStorage->get('header-color');?>;"></path>
                        </svg>
                    </div>
                    <div class="send-message-block input-group">
                        <input  type="text" placeholder="Введите сообщение..." class="send-message-input"></div> <!-- todo onkeyup="str($(this).val())"-->
                    <div class="send-message-block send-message-emo" style="display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 16 16">
                            <path d="M1642.66,674.34a8,8,0,1,0,0,11.316A8.014,8.014,0,0,0,1642.66,674.34Zm-0.87,10.444a6.771,6.771,0,1,1,0-9.572A6.787,6.787,0,0,1,1641.79,684.784Zm-7.78-6.952a0.94,0.94,0,1,1,.94.935A0.937,0.937,0,0,1,1634.01,677.832Zm4.25,0a0.935,0.935,0,1,1,.93.935A0.935,0.935,0,0,1,1638.26,677.832Zm2.21,3.831a3.828,3.828,0,0,1-6.94-.012,0.448,0.448,0,0,1,.24-0.591,0.5,0.5,0,0,1,.18-0.034,0.47,0.47,0,0,1,.42.279,2.791,2.791,0,0,0,2.64,1.659,2.838,2.838,0,0,0,2.63-1.66,0.446,0.446,0,0,1,.59-0.236A0.453,0.453,0,0,1,1640.47,681.663Z"
                                  transform="translate(-1629 -672)" style="fill: <?= Yii::$app->keyStorage->get('header-color');?>;"></path>
                        </svg>
                    </div>
                    <div class="send-message-block send-message-pict" style="display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                             viewBox="0 0 15 15">
                            <path
                                    d="M1609,685.418a1.582,1.582,0,0,0,1.58,1.582h11.84a1.584,1.584,0,0,0,1.58-1.582V673.582a1.582,1.582,0,0,0-1.58-1.582h-11.84a1.584,1.584,0,0,0-1.58,1.582v11.836Zm13.42,0.831h-11.84a0.831,0.831,0,0,1-.83-0.831v-1.976l2.85-2.845,2.43,2.431a0.374,0.374,0,0,0,.53,0l4.39-4.389,3.3,3.3v3.475A0.831,0.831,0,0,1,1622.42,686.249Zm-11.84-13.5h11.84a0.831,0.831,0,0,1,.83.831v7.3l-3.04-3.037a0.374,0.374,0,0,0-.53,0l-4.39,4.389-2.43-2.43a0.372,0.372,0,0,0-.53,0l-2.58,2.577v-8.8A0.831,0.831,0,0,1,1610.58,672.751Zm3.07,5.259a1.91,1.91,0,1,0-1.91-1.909A1.915,1.915,0,0,0,1613.65,678.01Zm0-3.068a1.159,1.159,0,1,1-1.16,1.159A1.161,1.161,0,0,1,1613.65,674.942Z"
                                    transform="translate(-1609 -672)" style="fill: <?= Yii::$app->keyStorage->get('header-color');?>;"></path>
                        </svg>
                    </div>
                    <div class="send-message-block send-message-trig-style">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                             viewBox="0 0 25 25">
                            <circle cx="12.5" cy="12.5" r="12.5" class="cls-1"
                                    style="fill: <?= Yii::$app->keyStorage->get('header-color');?>;"></circle>
                            <path data-v-33ec3de9="" d="M1552.67,764.448s0.2-.28-0.1,3.042c-0.08.76,2.59-1.778,2.59-1.778"
                                  transform="translate(-1541 -753)" class="cls-3" style="fill: <?= Yii::$app->keyStorage->get('header-color');?>;"></path>
                        </svg>
                    </div>
                    <div class="send-message-block send-message-ok">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                             viewBox="0 0 20 20">
                            <path
                                    d="M1647,678.333L1639.22,669v5.334c-7.78,1.333-11.11,8-12.22,14.666,2.78-4.667,6.67-6.8,12.22-6.8v5.467Z"
                                    transform="translate(-1627 -669)" style="fill: <?= Yii::$app->keyStorage->get('header-color');?>;"></path>
                        </svg>
                    </div>
                </div>
                <div class="send-message-menu-but" style="display:none;">
                    <ul class="buttons-list">
                        <li class="btnScreen btn-width-1">
                            <button class="btn btn-default btn-sm"
                                    style="color: <?= Yii::$app->keyStorage->get('header-color');?>; border-color: <?= Yii::$app->keyStorage->get('header-color');?>;">Перезапуск
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




</div>