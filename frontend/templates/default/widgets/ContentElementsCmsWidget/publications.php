<?php
/* @var $this   yii\web\View */
/* @var $widget \common\modules\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>
<section class="slice no-padding bg-white animate-hover-slide">
    <div class="wp-section work">
        <div class="container">


            <?php if ($widget->label) : ?>
                <div class="section-title-wr">
                    <h3 class="section-title left">
                        <span><?= $widget->label; ?></span>
                    </h3>
                </div>

            <?php endif; ?>

            <div class="row">
                <div id="ulSorList">

            <?php if ($widget->enabledPjaxPagination = \common\modules\cms\components\Cms::BOOL_Y) : ?>
                <?php \common\modules\cms\modules\admin\widgets\Pjax::begin(); ?>
            <?php endif; ?>

            <?php echo \yii\widgets\ListView::widget([
                'dataProvider'      => $widget->dataProvider,
                'itemView'          => 'publication-item',
                'emptyText'          => '',
                'options'           =>
                [
                ],
                'itemOptions' => [
                    'class'     => 'col-lg-3 col-md-3 col-sm-6',
                    'tag'       => 'div',
                ],
                'layout'            => "\n{items}\n<p class=\"row\">{pager}</p>"
            ])?>

            <?php if ($widget->enabledPjaxPagination = \common\modules\cms\components\Cms::BOOL_Y) : ?>
                <?php \common\modules\cms\modules\admin\widgets\Pjax::end(); ?>
            <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
