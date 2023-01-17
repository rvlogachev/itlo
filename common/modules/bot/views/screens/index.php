<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\modules\bot\widgets\treeview\TreeView;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\bot\models\BotScreensSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Экраны';
$this->params['breadcrumbs'][] = $this->title;
$bundle = \common\modules\bot\assets\BotAsset::register($this);
?>
<style type="text/css">
    .list-group-item{
        border: solid 1px #CCC;
        margin: 3px;
    }
</style>

<div class="screens-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Добавить экран', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <div class="row">
        <div class="col-md-7">
            <?= TreeView::widget([

                'size' => TreeView::SIZE_SMALL,
                'header' => 'Экраны',
                'searchOptions' => [
                    'inputOptions' => [
                        'placeholder' => 'Search category...'
                    ],
                ],
                'platform'=>$platform,
                'clientOptions' => [

                    'selectedBackColor' => 'rgb(40, 153, 57)',
                    'borderColor' => '#CCC',

                    'persist'=> "location",
                  //  'cookieId'=> "navigationtree",

               //     'collapsed'=> true, //I want to collapse all the nodes when i load.
                    'unique'=>true, //I want to open only one node at a time
                    'onNodeSelected' => new JsExpression('
                    function (undefined, item) {
                       getScreen(undefined, item);
                    }'),

                ],
            ]);?>
        </div>
        <div class="col-md-5">



            <div id="cont" style=" border: solid 1px #CCC; padding: 20px;">


            <?php
                $model = \common\modules\bot\models\BotScreensSearch::find()->where(['id' =>\Yii::$app->keyStorage->get(Yii::$app->user->getId().'_current_screen')])->one();
            if ($model){
                echo $this->render('_screen2', [
                    'model' =>  $model,
                ]);
            }
            ?>
            </div>

        </div>
    </div>



</div>
