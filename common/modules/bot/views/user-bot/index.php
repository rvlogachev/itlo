<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\bot\models\Userbot */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи бота';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userbot-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                'id',
            'first_name',
            'last_name',
            'username',

            'platform',

            'phone',
            [
                'attribute'=>'platform',
                'filter'=>['vk'=>'Vk','telegram'=>'Телеграм'],
                'value'=>function ($data) {




                    return  $data->platform;


                }
            ],
            [
                'attribute'=>'status',
                'value'=>function ($data) {
                    return  ($data->status==1)?'Подписан':'Не подписан';
                }
            ],
            'created_at:datetime',
            // 'phone',
            // 'email:email',
            // 'gosnumber',
           // 'bonus',
            // 'rating',
            // 'ima',
            // 'fam',
            // 'marka',
            // 'model',
            // 'users:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
