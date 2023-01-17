<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\bot\models\BotTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тест на профориентацию';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-test-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'question',
            'number',
            'answer_yes',
            'answer_no',
             'answer_middle',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
