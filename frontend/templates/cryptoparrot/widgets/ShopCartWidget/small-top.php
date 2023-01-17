<?php
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\shop\widgets\cart\ShopCartWidget */

\frontend\assets\CartAsset::register($this);

$this->registerJs(<<<JS
    (function(sx, $, _)
    {
        new sx.classes.shop.SmallCart(sx.Shop, 'sx-cart', {
            'delay': 500
        });
    })(sx, sx.$, sx._);
JS
);
?>

<!-- QUICK SHOP CART -->
<li class="quick-cart">

    <a href="#" id="sx-cart-small-open-btn">

        <span class="badge badge-aqua btn-xs badge-corner sx-count-baskets"><?= \Yii::$app->shop->shopFuser->countShopBaskets ? \Yii::$app->shop->shopFuser->countShopBaskets : ""; ?></span>
        <i class="fa fa-shopping-cart"></i>
    </a>
    <div class="quick-cart-box">
        <?php \common\modules\cms\modules\admin\widgets\Pjax::begin([
            'id' => 'sx-cart'
        ])?>

        <h4>Корзина</h4>
        <?php if (\Yii::$app->shop->shopFuser->shopBaskets) : ?>


            <div class="quick-cart-wrapper">

                <?php foreach(\Yii::$app->shop->shopFuser->shopBaskets as $shopBasket): ?>
                    <a href="<?= $shopBasket->product->cmsContentElement->url; ?>"><!-- cart item -->
                        <img src="<?= $shopBasket->product->cmsContentElement->image->src; ?>" width="45" height="45" alt="" />
                        <h6><span><?= $shopBasket->quantity ?>x</span> <?= $shopBasket->product->cmsContentElement->name; ?></h6>
                        <small><?= \Yii::$app->money->intlFormatter()->format($shopBasket->money); ?></small>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- quick cart footer -->
            <div class="quick-cart-footer clearfix">
                <a href="<?= \yii\helpers\Url::to(['/shop/cart']); ?>" class="btn btn-primary btn-xs pull-right">В корзину</a>
                <span class="pull-left"><strong>Итог:</strong> <?= \Yii::$app->money->intlFormatter()->format(\Yii::$app->shop->shopFuser->money); ?></span>
            </div>
            <!-- /quick cart footer -->
        <?php else : ?>
            <a class="text-center" href="#">
                <h6>Ваша корзина пуста</h6>
            </a>
        <?php endif; ?>

        <!-- /QUICK SHOP CART -->
        <?php \common\modules\cms\modules\admin\widgets\Pjax::end(); ?>
    </div>

</li>


