<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $models  \skeeks\cms\models\Tree[] */
?>
<?php if ($models = $widget->activeQuery->all()) : ?>
<section id="sx-promo-1" class="g-py-60 g-bg-white">
    <div class="container">

    <div class="shop-item-list row list-inline nomargin">
        <?php foreach ($models as $model) : ?>
            <?= $this->render("_one-home-subcatalog", [
                "widget" => $widget,
                "model"  => $model,
            ]); ?>
        <?php endforeach; ?>
    </div>
    </div>
</section>
<?php endif; ?>