<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \common\models\search\WidgetTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Text Blocks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-block-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('common', 'Create {modelClass}', [
            'modelClass' => 'Text Block',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'screens_id',
            'sort',
            'title',
            [
                'class' => '\kartik\grid\BooleanColumn',
                'attribute' => 'status',
                'enableSorting' => true,
                'trueLabel' => 'Активен',
                'falseLabel' => 'Выключен',
                'trueIcon' => '<span class="glyphicon glyphicon-check text-success"></span>',
                'falseIcon' => '<span class="glyphicon glyphicon-unchecked text-danger"></span>',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}'
            ],
        ],
    ]); ?>

</div>
