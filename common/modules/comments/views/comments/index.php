<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel wdmg\comments\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->context->module->name;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="page-header">
    <h1>
        <?= Html::encode($this->title) ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small>
    </h1>
</div>
<div class="comments-index">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{summary}<br\/>{items}<br\/>{summary}<br\/><div class="text-center">{pager}</div>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'parent_id',
            'user_id',
            'name',
            'email:email',
            //'phone',
            //'photo',
            //'condition',
            //'comment:ntext',
            //'created_at',
            //'updated_at',
            //'session',
            //'is_published',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'pager' => [
            'options' => [
                'class' => 'pagination',
            ],
            'maxButtonCount' => 5,
            'activePageCssClass' => 'active',
            'prevPageCssClass' => '',
            'nextPageCssClass' => '',
            'firstPageCssClass' => 'previous',
            'lastPageCssClass' => 'next',
            'firstPageLabel' => Yii::t('app/modules/comments', 'First page'),
            'lastPageLabel'  => Yii::t('app/modules/comments', 'Last page'),
            'prevPageLabel'  => Yii::t('app/modules/comments', '&larr; Prev page'),
            'nextPageLabel'  => Yii::t('app/modules/comments', 'Next page &rarr;')
        ],
    ]); ?>
    <hr/>
    <?php Pjax::end(); ?>
</div>

<?php echo $this->render('../_debug'); ?>