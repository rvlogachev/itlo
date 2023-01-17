<?php
/* @var $this   yii\web\View */
/* @var $widget \common\modules\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>

<div class="headline"><h2><?= $widget->label; ?></h2></div>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider'      => $widget->dataProvider,
    'itemView'          => '_widget-item',
    'emptyText'          => '',
    'options'           =>
    [
        'tag'       => 'ul',
        'class'     => 'list-unstyled link-list',
    ],
    'itemOptions' => [
        'tag' => false
    ],
    'layout'            => "\n{items}{$summary}\n<p class=\"row\">{pager}</p>"
])?>
