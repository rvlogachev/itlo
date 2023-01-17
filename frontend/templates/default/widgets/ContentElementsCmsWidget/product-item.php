<?php
/**
 *
 * @var \common\modules\cms\models\CmsContentElement $model
 *
 */
$shopProduct = \common\modules\cms\modules\shop\models\ShopProduct::getInstanceByContentElement($model)
?>
<li class="col-lg-3 col-sm-3">

    <div class="shop-item">

        <div class="thumbnail">
            <!-- product image(s) -->
            <a class="shop-item-image" href="<?= $model->url; ?>" data-pjax="0">
                <img src="<?= \common\modules\cms\helpers\Image::getSrc($model->image->src); ?>
                <?php/*= \Yii::$app->imaging->getImagingUrl($model->image->src,
                    new \skeeks\cms\components\imaging\filters\Thumbnail([
                        'w'    => 409,
                        'h'    => 258,
                    ])
                ) */?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive" />

            </a>
            <!-- /product image(s) -->

            <!-- hover buttons -->
            <div class="shop-option-over"><!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                <a class="btn btn-default" href="#" onclick="sx.Shop.addProduct(<?= $shopProduct->id; ?>, 1); return false;"><i class="fa fa-cart-plus size-20"></i></a>
            </div>
            <!-- /hover buttons -->

            <!-- product more info -->
            <!--<div class="shop-item-info">
                <span class="label label-success">NEW</span>
                <span class="label label-danger">SALE</span>
            </div>-->
            <!-- /product more info -->
        </div>

        <div class="shop-item-summary text-center">
            <h2><?= $model->name; ?></h2>

            <!-- rating -->

            <!-- /rating -->

            <!-- price -->
            <div class="shop-item-price">
                <?= \Yii::$app->money->intlFormatter()->format($shopProduct->baseProductPrice->money); ?>
            </div>
            <!-- /price -->


        </div>

        <div class="shop-item-buttons text-center">
            <a class="btn btn-default" href="#" onclick="sx.Shop.addProduct(<?= $shopProduct->id; ?>, 1); return false;"><i class="fa fa-cart-plus"></i> В корзину</a>
        </div>

    </div>

</li>
