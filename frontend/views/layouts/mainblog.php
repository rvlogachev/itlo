<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use common\modules\widget\widgets\DNofollowWidget;
/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php');
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\FrontendAsset')->baseUrl;?>
<style>
    /*.breadcrumb-container {*/
        /*margin-top: 103px;*/
    /*}*/
</style>
<div class="breadcrumb-container " >
    <div class="container">
        <?php echo \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'activeItemTemplate'=>'<!--noindex--><li class="active">{link}</li><!--/noindex-->',
        ]) ?>

    </div>
</div>
<!--<div class="light-gray-bg banner pv-20" >-->
<!--    <div class="container clearfix">-->
<!---->
<!--        <div class="slideshow">-->
<!---->
<!--            <div class="slider-revolution-5-container">-->
<!--                <div id="slider-banner-boxedwidth" class="slider-banner-boxedwidth rev_slider" data-version="5.0">-->
<!--                    <ul class="slides">-->
<!---->
<!--                        <li data-transition="crossfade" data-slotamount="default" data-masterspeed="default" data-title="Premium HTML5 Template">-->
<!---->
<!--                            <img src="--><?//= $bundlePath;?><!--/images/blog-slide-1.jpg" alt="slidebg2" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">-->
<!---->
<!--                            <div class="tp-caption dark-translucent-bg"-->
<!--                                 data-x="center"-->
<!--                                 data-y="center"-->
<!--                                 data-start="0"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="o:0;s:600;e:Power2.easeInOut;"-->
<!--                                 data-transform_out="o:0;s:600;"-->
<!--                                 data-width="5000"-->
<!--                                 data-height="450">-->
<!--                            </div>-->
<!---->
<!--                           -->
<!--                            <div class="tp-caption large_white"-->
<!--                                 data-x="left"-->
<!--                                 data-y="110"-->
<!--                                 data-start="500"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="y:[100%];sX:1;sY:1;o:0;s:1150;e:Power4.easeInOut;"-->
<!--                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"-->
<!--                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"-->
<!--                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">Premium HTML5 Template-->
<!--                            </div>-->
<!---->
<!--                           -->
<!--                            <div class="tp-caption large_white tp-resizeme hidden-sm-down"-->
<!--                                 data-x="left"-->
<!--                                 data-y="175"-->
<!--                                 data-start="750"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="o:0;s:2000;e:Power4.easeInOut;">-->
<!--                                <div class="separator-2 light"></div>-->
<!--                            </div>-->
<!---->
<!--                             -->
<!--                            <div class="tp-caption medium_white hidden-sm-down"-->
<!--                                 data-x="left"-->
<!--                                 data-y="190"-->
<!--                                 data-start="750"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="y:[100%];sX:1;sY:1;s:850;e:Power4.easeInOut;"-->
<!--                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"-->
<!--                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"-->
<!--                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Nesciunt, maiores, aliquid. Repellat eum numquam <br> culpa offici, tenetur fugiat dolorum sapiente...-->
<!--                            </div>-->
<!---->
<!--                            -->
<!--                            <div class="tp-caption small_white hidden-sm-down"-->
<!--                                 data-x="left"-->
<!--                                 data-y="310"-->
<!--                                 data-start="1000"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="y:[100%];sX:1;sY:1;o:0;s:600;e:Power4.easeInOut;"-->
<!--                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"-->
<!--                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"-->
<!--                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"><a href="index-blog.html#" class="btn btn-default btn-animated">Read More <i class="fa fa-arrow-right"></i></a>-->
<!--                            </div>-->
<!---->
<!--                        </li>-->
<!---->
<!--                        <li data-transition="crossfade" data-slotamount="default" data-masterspeed="default" data-title="Clean and Simple Design">-->
<!---->
<!--                            -->
<!--                            <img src="--><?//= $bundlePath;?><!--/images/blog-slide-2.jpg" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">-->
<!---->
<!--                             -->
<!--                            <div class="tp-caption dark-translucent-bg"-->
<!--                                 data-x="center"-->
<!--                                 data-y="center"-->
<!--                                 data-start="0"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="o:0;s:600;e:Power2.easeInOut;"-->
<!--                                 data-transform_out="o:0;s:600;"-->
<!--                                 data-width="5000"-->
<!--                                 data-height="450">-->
<!--                            </div>-->
<!---->
<!--                            -->
<!--                            <div class="tp-caption large_white"-->
<!--                                 data-x="left"-->
<!--                                 data-y="110"-->
<!--                                 data-start="500"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="y:[100%];sX:1;sY:1;o:0;s:1150;e:Power4.easeInOut;"-->
<!--                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"-->
<!--                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"-->
<!--                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">Clean and Simple Design-->
<!--                            </div>-->
<!---->
<!--                            -->
<!--                            <div class="tp-caption large_white tp-resizeme hidden-sm-down"-->
<!--                                 data-x="left"-->
<!--                                 data-y="175"-->
<!--                                 data-start="750"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="o:0;s:2000;e:Power4.easeInOut;">-->
<!--                                <div class="separator-2 light"></div>-->
<!--                            </div>-->
<!---->
<!--                           -->
<!--                            <div class="tp-caption medium_white hidden-sm-down"-->
<!--                                 data-x="left"-->
<!--                                 data-y="190"-->
<!--                                 data-start="750"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="y:[100%];sX:1;sY:1;s:850;e:Power4.easeInOut;"-->
<!--                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"-->
<!--                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"-->
<!--                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Nesciunt, maiores, aliquid. Repellat eum numquam <br> culpa offici, tenetur fugiat dolorum sapiente...-->
<!--                            </div>-->
<!---->
<!--                             -->
<!--                            <div class="tp-caption small_white hidden-sm-down"-->
<!--                                 data-x="left"-->
<!--                                 data-y="310"-->
<!--                                 data-start="1000"-->
<!--                                 data-transform_idle="o:1;"-->
<!--                                 data-transform_in="y:[100%];sX:1;sY:1;o:0;s:600;e:Power4.easeInOut;"-->
<!--                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"-->
<!--                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"-->
<!--                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"><a href="index-blog.html#" class="btn btn-default btn-animated">Read More <i class="fa fa-arrow-right"></i></a>-->
<!--                            </div>-->
<!---->
<!--                        </li>-->
<!---->
<!--                    </ul>-->
<!--                    <div class="tp-bannertimer"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div id="page-start"></div>-->

<section class="main-container">

        <div class="container">
            <!-- ================ -->

            <!-- banner end -->
                <div class="row">

                        <!-- main start -->
                        <!-- ================ -->
                        <div class="main col-md-8">
                            <?php echo $content ?>
                        </div>
                        <!-- main end -->

                        <!-- sidebar start -->
                        <!-- ================ -->
                        <aside class="col-md-4 col-lg-3 col-lg-offset-1">
                                <div class="sidebar">

                                        <h3 class="title">Поиск</h3>
                                        <div class="separator-2"></div>
                                        <div class=" clearfix">
                                            <?= \common\modules\blog\widgets\Search::widget() ?>
                                        </div>

                                        <div class="block clearfix">
                                                <h3 class="title">Навигация</h3>
                                                <div class="separator-2"></div>
                                            <!--noindex-->
<!--                                            --><?php //echo   \yii\bootstrap4\Nav::widget([
//                                                'options' => ['class' => 'nav nav-pills nav-stacked'],
//                                                'encodeLabels'=>false,
//                                                'items' =>  \common\components\Helper::getItemsCategory()
//                                            ]); ?>
                                            <!--/noindex-->

                                        </div>


                                        <?= \common\modules\blog\widgets\Baner\BanerWidget::widget(['url'=>'http://infomarketstudio.loc/chatbot']);?>


                                    <?php //echo \common\widgets\Cases\CasesWidget::widget(['type'=>'blog']);?>

                                    <!--noindex-->
                                    <?php  DNofollowWidget::begin([]); ?>
                                    <?= \common\modules\blog\widgets\TagCloud::widget([
                                        'title' => '<i class="icon-st"></i>Популярные теги',
                                        'maxTags' => 5,
                                    ]) ?>
                                    <?php DNofollowWidget::end(); ?>
                                    <!--/noindex-->

                                    <div class="block clearfix">
                                            <h3 class="title">Цитаты</h3>
                                            <div class="separator-2"></div>
                                            <blockquote style="padding-left:20px" class="margin-clear">
                                                    <p>Компьютер — это самый удивительный инструмент, с каким я когда-либо сталкивался. Это велосипед для нашего сознания..</p>
                                                    <footer><cite title="Source Title">Стив Джобс </cite></footer>
                                            </blockquote>
                                            <blockquote style="padding-left:20px" class="margin-clear">
                                                    <p>С годами я перестал покупать многие вещи просто потому, что они теперь кажутся мне нелепыми.</p>
                                                    <footer><cite title="Source Title">Стив Джобс </cite></footer>
                                            </blockquote>
                                    </div>

                                    <?= \common\modules\blog\widgets\RecentPosts::widget([
                                        'title' => '<i class="icon-st"></i>Последние посты',
                                        'maxPosts' => 5,
                                    ]) ?>

                                    <?= \common\modules\blog\widgets\RecentComments::widget([
                                        'title' => '<i class="icon-st"></i>Комментарии',
                                        'maxComments' => 5,
                                    ]) ?>

<!--                                    --><?//echo php \common\modules\blog\widgets\Links::widget([
//                                        'title' => '<i class="icon-st"></i>Ссылки',
//                                        'links' => Yii::$app->params['blogLinks'],
//                                    ]) ?>

                                    <?= \common\modules\blog\widgets\SiteStat::widget([
                                        'title' => '<i class="icon-st"></i>Статистика',
                                    ]) ?>





                                </div>
                        </aside>
                        <!-- sidebar end -->

                </div>
        </div>
</section>



<section class="section dark-bg pv-40 clearfix">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="call-to-action text-center">
                                        <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                        <h3 class="title"><strong>Подпишись</strong> на наши статьи по этим направлениям</h3>
                                                        <p>В блоге мы постоянно пишем на тему маркетинга, продвижения, разработки веб-сайтов, новых технологиях и много еще другого.</p>
                                                        <div class="separator"></div>
                                                        <form class="form-inline margin-clear">
                                                                <div class="form-group has-feedback">
                                                                        <label class="sr-only" for="subscribe3">Email address</label>
                                                                        <input type="email" class="form-control" id="subscribe" placeholder="Введи email" name="subscribe" required="">
                                                                        <i class="fa fa-envelope form-control-feedback"></i>
                                                                </div>
                                                                <button type="submit" class="btn btn-gray-transparent btn-animated margin-clear">Подписаться <i class="fa fa-send"></i></button>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>

 



<?php $this->endContent() ?>
