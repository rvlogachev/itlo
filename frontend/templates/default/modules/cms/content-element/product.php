<?php
/* @var $this \yii\web\View */
/* @var $model \common\modules\cms\models\CmsContentElement */
?>
<?= $this->render('@frontend/templates/default/include/breadcrumbs', [
    'model' => $model
])?>

<!-- Product page -->
<section>
    <div class="container">
        <div class="row">

            <!-- RIGHT -->
            <div class="col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">

                <div class="row">

                    <!-- IMAGE -->
                    <div class="col-lg-6 col-sm-6">

                        <div class="thumbnail relative margin-bottom-3">

                            <!--
                                IMAGE ZOOM

                                data-mode="mouseover|grab|click|toggle"
                            -->
                            <figure id="zoom-primary" class="zoom" data-mode="mouseover" style="position: relative; overflow: hidden;">
                                <!--
                                    zoom buttton

                                    positions available:
                                        .bottom-right
                                        .bottom-left
                                        .top-right
                                        .top-left
                                -->
                                <a class="lightbox bottom-right" href="<?= $model->image->src; ?>" data-plugin-options="{&quot;type&quot;:&quot;image&quot;}"><i class="glyphicon glyphicon-search"></i></a>

                                <!--
                                    image

                                    Extra: add .image-bw class to force black and white!
                                -->
                                <img class="img-responsive" src="<?= $model->image->src; ?>" width="1200" height="1500" alt="This is the product title">
                                <img src="<?= $model->image->src; ?>" class="zoomImg" style="position: absolute; top: -268.488px; left: -84.3509px; opacity: 0; width: 1000px; height: 1500px; border: none; max-width: none; max-height: none;">
                            </figure>

                        </div>

                        <!-- Thumbnails (required height:100px) -->
                        <div data-for="zoom-primary" class="zoom-more owl-carousel owl-padding-3 featured owl-theme owl-carousel-init" data-plugin-options="{&quot;singleItem&quot;: false, &quot;autoPlay&quot;: false, &quot;navigation&quot;: true, &quot;pagination&quot;: false}" style="opacity: 1; display: block;">
                            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 1148px; left: 0px; display: block; transition: all 0ms ease; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 82px;"><a class="thumbnail active" href="assets/images/demo/shop/products/1000x1500/p5.jpg">
                                <img src="assets/images/demo/shop/products/100x100/p5.jpg" height="100" alt="">
                            </a></div><div class="owl-item" style="width: 82px;"><a class="thumbnail" href="assets/images/demo/shop/products/1000x1500/p6.jpg">
                                <img src="assets/images/demo/shop/products/100x100/p6.jpg" height="100" alt="">
                            </a></div><div class="owl-item" style="width: 82px;"><a class="thumbnail" href="assets/images/demo/shop/products/1000x1500/p7.jpg">
                                <img src="assets/images/demo/shop/products/100x100/p7.jpg" height="100" alt="">
                            </a></div><div class="owl-item" style="width: 82px;"><a class="thumbnail" href="assets/images/demo/shop/products/1000x1500/p8.jpg">
                                <img src="assets/images/demo/shop/products/100x100/p8.jpg" height="100" alt="">
                            </a></div><div class="owl-item" style="width: 82px;"><a class="thumbnail" href="assets/images/demo/shop/products/1000x1500/p9.jpg">
                                <img src="assets/images/demo/shop/products/100x100/p9.jpg" height="100" alt="">
                            </a></div><div class="owl-item" style="width: 82px;"><a class="thumbnail" href="assets/images/demo/shop/products/1000x1500/p10.jpg">
                                <img src="assets/images/demo/shop/products/100x100/p10.jpg" height="100" alt="">
                            </a></div><div class="owl-item" style="width: 82px;"><a class="thumbnail" href="assets/images/demo/shop/products/1000x1500/p11.jpg">
                                <img src="assets/images/demo/shop/products/100x100/p11.jpg" height="100" alt="">
                            </a></div></div></div>






                        <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div></div></div></div>
                        <!-- /Thumbnails -->

                    </div>
                    <!-- /IMAGE -->

                    <!-- ITEM DESC -->
                    <div class="col-lg-6 col-sm-6">

                        <!-- buttons -->
                        <div class="pull-right">
                            <!-- replace data-item-id width the real item ID - used by js/view/demo.shop.js -->
                            <a class="btn btn-default add-wishlist" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Wishlist"><i class="fa fa-heart nopadding"></i></a>
                            <a class="btn btn-default add-compare" href="#" data-item-id="1" data-toggle="tooltip" title="" data-original-title="Add To Compare"><i class="fa fa-bar-chart-o nopadding" data-toggle="tooltip"></i></a>
                        </div>
                        <!-- /buttons -->

                        <!-- price -->
                        <div class="shop-item-price">
                            <span class="line-through nopadding-left">$98.00</span>
                            $78.00
                        </div>
                        <!-- /price -->

                        <hr>

                        <div class="clearfix margin-bottom-30">
                            <span class="pull-right text-success"><i class="fa fa-check"></i> In Stock</span>
                            <!--
                            <span class="pull-right text-danger"><i class="glyphicon glyphicon-remove"></i> Out of Stock</span>
                            -->

                            <strong>SKU:</strong> UY7321987
                        </div>


                        <!-- short description -->
                        <p><?= $model->description_short; ?></p>
                        <!-- /short description -->




                        <hr>

                        <!-- FORM -->
                        <form class="clearfix form-inline nomargin" method="get" action="shop-cart.html">
                            <input type="hidden" name="product_id" value="1">

                            <!-- see assets/js/view/demo.shop.js -->
                            <input type="hidden" id="color" name="color" value="yellow">
                            <input type="hidden" id="qty" name="qty" value="1">
                            <input type="hidden" id="size" name="size" value="5">
                            <!-- see assets/js/view/demo.shop.js -->

                            <div class="btn-group pull-left product-opt-color">
                                <button type="button" class="btn btn-default dropdown-toggle product-color-dd noradius" data-toggle="dropdown">&nbsp;
                                    <span class="caret"></span>
                                    <span id="product-selected-color" class="tag shop-color" style="background-color:#F0E68C"></span>
                                </button>

                                <!--
                                    href = required to be hex color starting with: #
                                    data-val = color name or color id from the database
                                -->
                                <ul id="product-color-dd" class="dropdown-menu clearfix" role="menu">
                                    <li class="active"><a class="tag shop-color" data-val="purple" href="#800080" style="background-color:#800080"></a></li>
                                    <li><a class="tag shop-color" data-val="red" href="#FF0000" style="background-color:#FF0000"></a></li>
                                    <li><a class="tag shop-color" data-val="pink" href="#FF0080" style="background-color:#FF0080"></a></li>
                                    <li><a class="tag shop-color" data-val="orange" href="#FF6600" style="background-color:#FF6600"></a></li>
                                    <li><a class="tag shop-color" data-val="grey" href="#E0DCC8" style="background-color:#E0DCC8"></a></li>
                                    <li><a class="tag shop-color" data-val="yellow" href="#F0E68C" style="background-color:#F0E68C"></a></li>
                                    <li><a class="tag shop-color" data-val="light-yellow" href="#FFFFD0" style="background-color:#FFFFD0"></a></li>
                                    <li><a class="tag shop-color" style="background-color:#4B0082"></a></li>
                                    <li><a class="tag shop-color" data-val="dark-grey" href="#666666" style="background-color:#666666"></a></li>
                                    <li><a class="tag shop-color" data-val="green" href="#00FF00" style="background-color:#00FF00"></a></li>
                                </ul>
                            </div><!-- /btn-group -->

                            <div class="btn-group pull-left product-opt-size">
                                <button type="button" class="btn btn-default dropdown-toggle product-size-dd noradius" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    Size <small id="product-selected-size">(<span>5</span>)</small>
                                </button>

                                <!-- data-val = size value or size id -->
                                <ul id="product-size-dd" class="dropdown-menu" role="menu">
                                    <li class="active"><a data-val="5" href="#">5</a></li>
                                    <li><a data-val="5.5" href="#">5.5</a></li>
                                    <li><a data-val="6" href="#">6</a></li>
                                    <li><a data-val="6.5" href="#">6.5</a></li>
                                    <li><a data-val="7" href="#">7</a></li>
                                    <li><a data-val="7.5" href="#">7.7</a></li>
                                    <li><a data-val="8" href="#">8</a></li>
                                    <li><a data-val="8.5" href="#">8.5</a></li>
                                    <li><a data-val="9" href="#">9</a></li>
                                    <li><a data-val="9.5" href="#">9.5</a></li>
                                    <li><a data-val="10" href="#">10</a></li>
                                    <li><a data-val="10.5" href="#">10.5</a></li>
                                    <li><a data-val="11" href="#">11</a></li>
                                    <li><a data-val="11.5" href="#">11.5</a></li>
                                    <li><a data-val="12" href="#">12</a></li>
                                    <li><a data-val="13" href="#">13</a></li>
                                    <li><a data-val="14" href="#">14</a></li>
                                </ul>
                            </div><!-- /btn-group -->

                            <div class="btn-group pull-left product-opt-qty">
                                <button type="button" class="btn btn-default dropdown-toggle product-qty-dd noradius" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    Qty <small id="product-selected-qty">(<span>5</span>)</small>
                                </button>

                                <ul id="product-qty-dd" class="dropdown-menu clearfix" role="menu">
                                    <li class="active"><a data-val="1" href="#">1</a></li>
                                    <li><a data-val="2" href="#">2</a></li>
                                    <li><a data-val="3" href="#">3</a></li>
                                    <li><a data-val="4" href="#">4</a></li>
                                    <li><a data-val="5" href="#">5</a></li>
                                    <li><a data-val="6" href="#">6</a></li>
                                    <li><a data-val="7" href="#">7</a></li>
                                    <li><a data-val="8" href="#">8</a></li>
                                    <li><a data-val="9" href="#">9</a></li>
                                    <li><a data-val="10" href="#">10</a></li>
                                </ul>
                            </div><!-- /btn-group -->

                            <button class="btn btn-primary pull-left product-add-cart noradius">ADD TO CART</button>

                        </form>
                        <!-- /FORM -->


                        <hr>

                        <small class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla,
                            commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim
                            massa, sodales tempor convallis et.
                        </small>

                        <hr>

                        <!-- Share -->
                        <div class="pull-right">

                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google plus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>

                        </div>
                        <!-- /Share -->


                        <!-- rating -->
                        <div class="rating rating-4 size-13 margin-top-10 width-100"><!-- rating-0 ... rating-5 --></div>
                        <!-- /rating -->

                    </div>
                    <!-- /ITEM DESC -->

                </div>



                <ul id="myTab" class="nav nav-tabs nav-top-border margin-top-80" role="tablist">
                    <?php if ($model->description_full) : ?>
                        <li role="presentation" class="active"><a href="#description" role="tab" data-toggle="tab">Описание</a></li>
                    <?php endif; ?>

                    <li role="presentation"><a href="#specs" role="tab" data-toggle="tab">Specifications</a></li>
                    <li role="presentation"><a href="#reviews" role="tab" data-toggle="tab">Reviews (2)</a></li>
                </ul>

                <div class="tab-content padding-top-20">
                    <!-- DESCRIPTION -->
                    <div role="tabpanel" class="tab-pane fade in active" id="description">
                        <?= $model->description_full; ?>
                    </div>

                    <!-- SPECIFICATIONS -->
                    <div role="tabpanel" class="tab-pane fade" id="specs">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Column name</th>
                                        <th>Column name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Size</td>
                                        <td>2XL</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>Red</td>
                                    </tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td>132lbs</td>
                                    </tr>
                                    <tr>
                                        <td>Height</td>
                                        <td>74cm</td>
                                    </tr>
                                    <tr>
                                        <td>Bluetooth</td>
                                        <td><i class="fa fa-check text-success"></i> YES</td>
                                    </tr>
                                    <tr>
                                        <td>Wi-Fi</td>
                                        <td><i class="glyphicon glyphicon-remove text-danger"></i> NO</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- REVIEWS -->
                    <div role="tabpanel" class="tab-pane fade" id="reviews">
                        <!-- REVIEW ITEM -->
                        <div class="block margin-bottom-60">

                            <span class="user-avatar"><!-- user-avatar -->
                                <img class="pull-left media-object" src="assets/images/avatar2.jpg" width="64" height="64" alt="">
                            </span>

                            <div class="media-body">
                                <h4 class="media-heading size-14">
                                    John Doe –
                                    <span class="text-muted">June 29, 2014 - 11:23</span> –
                                    <span class="size-14 text-muted"><!-- stars -->
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </h4>

                                <p>
                                    Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.
                                </p>

                            </div>

                        </div>
                        <!-- /REVIEW ITEM -->

                        <!-- REVIEW ITEM -->
                        <div class="block margin-bottom-60">

                            <span class="user-avatar"><!-- user-avatar -->
                                <img class="pull-left media-object" src="assets/images/avatar2.jpg" width="64" height="64" alt="">
                            </span>

                            <div class="media-body">
                                <h4 class="media-heading size-14">
                                    John Doe –
                                    <span class="text-muted">June 29, 2014 - 11:23</span> –
                                    <span class="size-14 text-muted"><!-- stars -->
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </h4>

                                <p>
                                    Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.
                                </p>

                            </div>

                        </div>
                        <!-- /REVIEW ITEM -->


                        <!-- REVIEW FORM -->
                        <h4 class="page-header margin-bottom-40">ADD A REVIEW</h4>
                        <form method="post" action="#" id="form">

                            <div class="row margin-bottom-10">

                                <div class="col-md-6 margin-bottom-10">
                                    <!-- Name -->
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name *" maxlength="100" required="">
                                </div>

                                <div class="col-md-6">
                                    <!-- Email -->
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email *" maxlength="100" required="">
                                </div>

                            </div>

                            <!-- Comment -->
                            <div class="margin-bottom-30">
                                <textarea name="text" id="text" class="form-control" rows="6" placeholder="Comment" maxlength="1000"></textarea>
                            </div>

                            <!-- Stars -->
                            <div class="product-star-vote clearfix">

                                <label class="radio pull-left">
                                    <input type="radio" name="product-review-vote" value="1">
                                    <i></i> 1 Star
                                </label>

                                <label class="radio pull-left">
                                    <input type="radio" name="product-review-vote" value="2">
                                    <i></i> 2 Stars
                                </label>

                                <label class="radio pull-left">
                                    <input type="radio" name="product-review-vote" value="3">
                                    <i></i> 3 Stars
                                </label>

                                <label class="radio pull-left">
                                    <input type="radio" name="product-review-vote" value="4">
                                    <i></i> 4 Stars
                                </label>

                                <label class="radio pull-left">
                                    <input type="radio" name="product-review-vote" value="5">
                                    <i></i> 5 Stars
                                </label>

                            </div>

                            <!-- Send Button -->
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Send Review</button>

                        </form>
                        <!-- /REVIEW FORM -->

                    </div>
                </div>


                <hr class="margin-top-80 margin-bottom-80">


                <h2 class="owl-featured"><strong>Related</strong> products:</h2>
                <div class="owl-carousel featured nomargin owl-padding-10 owl-theme owl-carousel-init" data-plugin-options="{&quot;singleItem&quot;: false, &quot;items&quot;: &quot;4&quot;, &quot;stopOnHover&quot;:false, &quot;autoPlay&quot;:4500, &quot;autoHeight&quot;: false, &quot;navigation&quot;: true, &quot;pagination&quot;: false}" style="opacity: 1; display: block;">

                    <!-- item -->
                    <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 2968px; left: 0px; display: block; transition: all 800ms ease; transform: translate3d(-424px, 0px, 0px);"><div class="owl-item" style="width: 212px;"><div class="shop-item nomargin">

                        <div class="thumbnail">
                            <!-- product image(s) -->
                            <a class="shop-item-image" href="shop-single-left.html">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p13.jpg" alt="shop first image">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image">
                            </a>
                            <!-- /product image(s) -->

                            <!-- product more info -->
                            <div class="shop-item-info">
                                <span class="label label-success">NEW</span>
                                <span class="label label-danger">SALE</span>
                            </div>
                            <!-- /product more info -->
                        </div>

                        <div class="shop-item-summary text-center">
                            <h2>Cotton 100% - Pink Shirt</h2>

                            <!-- rating -->
                            <div class="shop-item-rating-line">
                                <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                            </div>
                            <!-- /rating -->

                            <!-- price -->
                            <div class="shop-item-price">
                                <span class="line-through">$98.00</span>
                                $78.00
                            </div>
                            <!-- /price -->
                        </div>

                            <!-- buttons -->
                            <div class="shop-item-buttons text-center">
                                <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                            </div>
                            <!-- /buttons -->
                    </div></div><div class="owl-item" style="width: 212px;"><div class="shop-item nomargin">

                        <div class="thumbnail">
                            <!-- product image(s) -->
                            <a class="shop-item-image" href="shop-single-left.html">
                                <!-- CAROUSEL -->
                                <div class="owl-carousel owl-padding-0 nomargin owl-theme owl-carousel-init" data-plugin-options="{&quot;singleItem&quot;: true, &quot;autoPlay&quot;: 3000, &quot;navigation&quot;: false, &quot;pagination&quot;: false, &quot;transitionStyle&quot;:&quot;fadeUp&quot;}" style="opacity: 1; display: block;">
                                    <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 728px; left: 0px; display: block; transition: all 0ms ease; transform: translate3d(-182px, 0px, 0px); transform-origin: 273px 50% 0px; perspective-origin: 273px 50%;"><div class="owl-item" style="width: 182px;"><img class="img-responsive" src="assets/images/demo/shop/products/300x450/p5.jpg" alt=""></div><div class="owl-item" style="width: 182px;"><img class="img-responsive" src="assets/images/demo/shop/products/300x450/p1.jpg" alt=""></div></div></div>

                                </div>
                                <!-- /CAROUSEL -->
                            </a>
                            <!-- /product image(s) -->
                        </div>

                        <div class="shop-item-summary text-center">
                            <h2>Pink Dress 100% Cotton</h2>

                            <!-- rating -->
                            <div class="shop-item-rating-line">
                                <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                            </div>
                            <!-- /rating -->

                            <!-- price -->
                            <div class="shop-item-price">
                                $44.00
                            </div>
                            <!-- /price -->
                        </div>

                            <!-- buttons -->
                            <div class="shop-item-buttons text-center">
                                <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                            </div>
                            <!-- /buttons -->
                    </div></div><div class="owl-item" style="width: 212px;"><div class="shop-item nomargin">

                        <div class="thumbnail">
                            <!-- product image(s) -->
                            <a class="shop-item-image" href="shop-single-left.html">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p2.jpg" alt="shop first image">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p12.jpg" alt="shop hover image">
                            </a>
                            <!-- /product image(s) -->

                            <!-- product more info -->
                            <div class="shop-item-info">
                                <span class="label label-success">NEW</span>
                                <span class="label label-danger">SALE</span>
                            </div>
                            <!-- /product more info -->
                        </div>

                        <div class="shop-item-summary text-center">
                            <h2>Black Fashion Hat</h2>

                            <!-- rating -->
                            <div class="shop-item-rating-line">
                                <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                            </div>
                            <!-- /rating -->

                            <!-- price -->
                            <div class="shop-item-price">
                                <span class="line-through">$77.00</span>
                                $65.00
                            </div>
                            <!-- /price -->
                        </div>

                            <!-- buttons -->
                            <div class="shop-item-buttons text-center">
                                <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                            </div>
                            <!-- /buttons -->
                    </div></div><div class="owl-item" style="width: 212px;"><div class="shop-item nomargin">

                        <div class="thumbnail">
                            <!-- product image(s) -->
                            <a class="shop-item-image" href="shop-single-left.html">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p8.jpg" alt="shop first image">
                            </a>
                            <!-- /product image(s) -->

                            <!-- countdown -->
                            <div class="shop-item-counter">
                                <div class="countdown is-countdown" data-from="December 31, 2017 08:22:01" data-labels="years,months,weeks,days,hour,min,sec"><span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">823</span><span class="countdown-period">days</span></span><span class="countdown-section"><span class="countdown-amount">15</span><span class="countdown-period">hour</span></span><span class="countdown-section"><span class="countdown-amount">1</span><span class="countdown-period">Minute</span></span><span class="countdown-section"><span class="countdown-amount">32</span><span class="countdown-period">sec</span></span></span></div>
                            </div>
                            <!-- /countdown -->
                        </div>

                        <div class="shop-item-summary text-center">
                            <h2>Beach Black Lady Suit</h2>

                            <!-- rating -->
                            <div class="shop-item-rating-line">
                                <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                            </div>
                            <!-- /rating -->

                            <!-- price -->
                            <div class="shop-item-price">
                                $56.00
                            </div>
                            <!-- /price -->
                        </div>

                            <!-- buttons -->
                            <div class="shop-item-buttons text-center">
                                <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                            </div>
                            <!-- /buttons -->
                    </div></div><div class="owl-item" style="width: 212px;"><div class="shop-item nomargin">

                        <div class="thumbnail">
                            <!-- product image(s) -->
                            <a class="shop-item-image" href="shop-single-left.html">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p7.jpg" alt="shop first image">
                            </a>
                            <!-- /product image(s) -->
                        </div>

                        <div class="shop-item-summary text-center">
                            <h2>Town Dress - Black</h2>

                            <!-- rating -->
                            <div class="shop-item-rating-line">
                                <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                            </div>
                            <!-- /rating -->

                            <!-- price -->
                            <div class="shop-item-price">
                                $154.00
                            </div>
                            <!-- /price -->
                        </div>

                            <!-- buttons -->
                            <div class="shop-item-buttons text-center">
                                <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                            </div>
                            <!-- /buttons -->
                    </div></div><div class="owl-item" style="width: 212px;"><div class="shop-item nomargin">

                        <div class="thumbnail">
                            <!-- product image(s) -->
                            <a class="shop-item-image" href="shop-single-left.html">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p6.jpg" alt="shop first image">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p14.jpg" alt="shop hover image">
                            </a>
                            <!-- /product image(s) -->
                        </div>

                        <div class="shop-item-summary text-center">
                            <h2>Chick Lady Fashion</h2>

                            <!-- rating -->
                            <div class="shop-item-rating-line">
                                <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                            </div>
                            <!-- /rating -->

                            <!-- price -->
                            <div class="shop-item-price">
                                $167.00
                            </div>
                            <!-- /price -->
                        </div>

                            <!-- buttons -->
                            <div class="shop-item-buttons text-center">
                                <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                            </div>
                            <!-- /buttons -->
                    </div></div><div class="owl-item" style="width: 212px;"><div class="shop-item nomargin">

                        <div class="thumbnail">
                            <!-- product image(s) -->
                            <a class="shop-item-image" href="shop-single-left.html">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p11.jpg" alt="shop hover image">
                                <img class="img-responsive" src="assets/images/demo/shop/products/300x450/p3.jpg" alt="shop first image">
                            </a>
                            <!-- /product image(s) -->
                        </div>

                        <div class="shop-item-summary text-center">
                            <h2>Black Long Lady Shirt</h2>

                            <!-- rating -->
                            <div class="shop-item-rating-line">
                                <div class="rating rating-0 size-13"><!-- rating-0 ... rating-5 --></div>
                            </div>
                            <!-- /rating -->

                            <!-- price -->
                            <div class="shop-item-price">
                                $128.00
                            </div>
                            <!-- /price -->
                        </div>

                            <!-- buttons -->
                            <div class="shop-item-buttons text-center">
                                <a class="btn btn-default" href="shop-cart.html"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                            </div>
                            <!-- /buttons -->
                    </div></div></div></div>
                    <!-- /item -->

                    <!-- item -->

                    <!-- /item -->

                    <!-- item -->

                    <!-- /item -->

                    <!-- item -->

                    <!-- /item -->

                    <!-- item -->

                    <!-- /item -->

                    <!-- item -->

                    <!-- /item -->

                    <!-- item -->

                    <!-- /item -->

                <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div></div></div></div>

            </div>


            <!-- LEFT -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-lg-pull-9 col-md-pull-9 col-sm-pull-9">

                <!-- CATEGORIES -->
                <div class="side-nav margin-bottom-60">


                    <?= trim(\skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                        'namespace'         => 'TreeMenuCmsWidget-leftmenu',
                        'viewFile'          => '@template/widgets/TreeMenuCmsWidget/left-menu',
                        'treePid'           => $model->id,
                        'enabledRunCache'   => \skeeks\cms\components\Cms::BOOL_N,
                        'label'             => 'Каталог',
                    ])); ?>

                </div>
                <!-- /CATEGORIES -->
            </div>

        </div>
    </div>
</section>



