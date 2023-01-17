<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\bot\models\BotSettingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Bot Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-settings-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo \yii\helpers\Html::a(Yii::t('common', 'Create {modelClass}', [
    'modelClass' => 'Bot Settings',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'group_id',
            'key',
            'reqest',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
