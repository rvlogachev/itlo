<?php
?>

<?php if ($widget->enabledPjaxPagination = \common\modules\cms\components\Cms::BOOL_Y) : ?>
    <?php \common\modules\cms\modules\admin\widgets\Pjax::begin(); ?>
<?php endif; ?>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider'      => $widget->dataProvider,
    'itemView'          => 'article-item',
    'emptyText'          => '',
    'options'           =>
    [
        'tag'   => 'div',
    ],
    'itemOptions' => [
        'tag' => false
    ],
    'layout'            => "\n{items}{$summary}\n<p class=\"row\">{pager}</p>"
])?>

<?php if ($widget->enabledPjaxPagination = \common\modules\cms\components\Cms::BOOL_Y) : ?>
    <?php \common\modules\cms\modules\admin\widgets\Pjax::end(); ?>
<?php endif; ?>