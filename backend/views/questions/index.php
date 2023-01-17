<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\QuestionsSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Вопросы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-index">
    <div class="card">
			<div class="card-header">
	      <?php echo Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
			</div>
			<div class="card-footer">
	      <?php echo getDataProviderSummary($dataProvider) ?>
			</div>


        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    'text:ntext',
                    'answer1',
                    'answer2',
                    'answer3',
                    // 'answer4',
                    // 'answer5',
                      'priority',
                     'success_answer',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
