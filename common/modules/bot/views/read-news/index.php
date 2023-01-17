<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReadNewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости и лайки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-news-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            'created_at:datetime',
            [
                'attribute' => 'user_id',
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Userbot::find()->all(),'id','first_name'),
                'format' => 'raw',
                'value' => function ($model, $index, $widget) {
                  $modelUbot = \common\models\Userbot::findOne($model->user_id);
                  if($model){
                          return $modelUbot->username." ".$modelUbot->first_name." ".$modelUbot->last_name;
                  }
                },
                'options' => [
                    'class' => "text-center",
                    'style' => "width:420px;"
                ]
            ],
            [
                'attribute' => 'news_id',
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\News::find()->all(),'id','title'),
                'format' => 'raw',
                'value' => function ($model, $index, $widget) {
                    $modelNews = \common\models\News::find()->where(['page'=>$model->news_id])->one();
                            return $modelNews->title;
                },
                'options' => [
                    'class' => "text-center",
                    'style' => "width:500px;"
                ]
            ],
            [
                'attribute' => 'like',
               // 'filter'=>\yii\helpers\ArrayHelper::map(\common\models\News::find()->all(),'id','title'),
                'format' => 'raw',
                'value' => function ($model, $index, $widget) {
                    return $model->like;
                },
                'options' => [
                    'class' => "text-center",
                    'style' => "width:100px;"
                ]
            ],
            [
                'attribute' => 'read',
               // 'filter'=>\yii\helpers\ArrayHelper::map(\common\models\News::find()->all(),'id','title'),
                'format' => 'raw',
                'value' => function ($model, $index, $widget) {

                    return $model->read;
                },
                'options' => [
                    'class' => "text-center",
                    'style' => "width:100px;"
                ]
            ],

            // 'komment',

            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
