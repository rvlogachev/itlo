<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>

<?php /* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */ ?><!--
    <?php /* \skeeks\cms\modules\admin\widgets\Pjax::begin(); */ ?>
--><?php /* endif; */ ?>

<?php if ($widget->dataProvider->query->count()) : ?>
    <div class="g-bg-secondary g-pa-15 g-mb-20">
        <div class="g-bg-white g-pa-20">

            <?php echo \yii\widgets\ListView::widget([
                'dataProvider' => $widget->dataProvider,
                'itemView'     => '_review-item',
                'emptyText'    => '',
                'options'      =>
                    [
                        'tag' => 'div',
                    ],
                'itemOptions'  => [
                    'tag' => false,
                ],
                'layout'       => "\n{items}{summary}\n<p class=\"row\">{pager}</p>",
            ]) ?>
        </div>
    </div>
<?php endif; ?>
<?php /* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */ ?><!--
    <?php /* \skeeks\cms\modules\admin\widgets\Pjax::end(); */ ?>
--><?php /* endif; */ ?>


