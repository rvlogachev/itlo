<?php
/* @var $this   yii\web\View */
/* @var $widget \common\modules\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>
<?php if ($widget->label) : ?>
    <h1 class="size-17 margin-bottom-20"><?= $widget->label; ?></h1>
<?php endif; ?>

<?php if ($widget->enabledPjaxPagination = \common\modules\cms\components\Cms::BOOL_Y) : ?>
    <?php \common\modules\cms\modules\admin\widgets\Pjax::begin(); ?>
<?php endif; ?>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider'      => $widget->dataProvider,
    'itemView'          => 'product-item',
    'emptyText'          => '',
    'options'           =>
    [
        'class'   => 'shop-item-list row list-inline nomargin',
        'tag'   => 'ul',
    ],
    'itemOptions' => [
        'tag' => false
    ],
    'layout'            => "\n{items}{$summary}\n<p class=\"row\">{pager}</p>"
])?>

<?php if ($widget->enabledPjaxPagination = \common\modules\cms\components\Cms::BOOL_Y) : ?>
    <?php \common\modules\cms\modules\admin\widgets\Pjax::end(); ?>
<?php endif; ?>