<?php
/* @var $this   yii\web\View */
/* @var $widget \common\modules\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>


<!-- /Latest Blog Post -->
<h4 class="letter-spacing-1"><?= $widget->label; ?></h4>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider'      => $widget->dataProvider,
    'itemView'          => 'article-footer-item',
    'emptyText'          => '',
    'options'           =>
    [
        'tag'       => 'ul',
        'class'     => 'footer-posts list-unstyled',
    ],
    'itemOptions' => [
        'tag' => false
    ],
    'layout'            => "{items}"
])?>
