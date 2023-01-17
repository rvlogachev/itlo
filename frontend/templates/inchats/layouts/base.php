<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php');
//$itemsInCart = Yii::$app->cart->getCount();
?>


    <div class=td-scroll-up><i class=td-icon-menu-up></i></div>
    <div class=td-menu-background></div>
    <div id=td-mobile-nav>
        <div class=td-mobile-container>
            <div class=td-menu-socials-wrap>
                <div class=td-menu-socials>
                <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=Facebook>
                <i class="td-icon-font td-icon-facebook"></i>
                </a>
                </span>
                    <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=Twitter>
                <i class="td-icon-font td-icon-twitter"></i>
                </a>
                </span>
                    <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=Vimeo>
                <i class="td-icon-font td-icon-vimeo"></i>
                </a>
                </span>
                    <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=VKontakte>
                <i class="td-icon-font td-icon-vk"></i>
                </a>
                </span>
                    <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=Youtube>
                <i class="td-icon-font td-icon-youtube"></i>
                </a>
                </span>
                </div>
                <div class=td-mobile-close>
                    <a href="#"><i class=td-icon-close-mobile></i></a>
                </div>
            </div>
            <div class=td-menu-login-section>
                <div class=td-guest-wrap>
                    <div class=td-menu-avatar>
                        <div class=td-avatar-container><img
                                src="https://secure.gravatar.com/avatar/?s=80&#038;d=mm&#038;r=g" width=80 height=80 alt=""
                                class="avatar avatar-80 wp-user-avatar wp-user-avatar-80 photo avatar-default"/></div>
                    </div>
                    <div class=td-menu-login><a id=login-link-mob>Sign in</a></div>
                </div>
            </div>
            <div class=td-mobile-content>
                <div class=menu-main-menu-container>
                    <ul id=menu-main-menu class=td-mobile-main-menu>
                        <li id=menu-item-15
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-13 current_page_item menu-item-first menu-item-15">
                            <a href="https://demo.tagdiv.com/newspaper/">News</a></li>
                        <li id=menu-item-291
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-291">
                            <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/">Fashion<i
                                    class="td-icon-menu-right td-element-after"></i></a>
                            <ul class=sub-menu>
                                <li id=menu-item-0 class=menu-item-0><a
                                        href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-new-look-2015/">New
                                        look 2018</a></li>
                                <li class=menu-item-0><a
                                        href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-street-fashion/">Street
                                        fashion</a></li>
                                <li class=menu-item-0><a
                                        href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-style-hunter/">Style
                                        hunter</a></li>
                                <li class=menu-item-0><a
                                        href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-vogue/">Vogue</a>
                                </li>
                            </ul>
                        </li>
                        <li id=menu-item-293
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-293"><a
                                href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-gadgets/">Gadgets</a>
                        </li>
                        <li id=menu-item-308
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-308">
                            <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/">Lifestyle<i
                                    class="td-icon-menu-right td-element-after"></i></a>
                            <ul class=sub-menu>
                                <li class=menu-item-0><a
                                        href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-business/">Business</a>
                                </li>
                                <li class=menu-item-0><a
                                        href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-health-fitness/">Health
                                        &amp; Fitness</a></li>
                                <li class=menu-item-0><a
                                        href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-recipes/">Recipes</a>
                                </li>
                                <li class=menu-item-0><a
                                        href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-travel/">Travel</a>
                                </li>
                            </ul>
                        </li>
                        <li id=menu-item-295
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-295"><a
                                href="https://demo.tagdiv.com/newspaper/category/tagdiv-video/">Video</a></li>
                        <li id=menu-item-296
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-296">
                            <a href="#">Features<i class="td-icon-menu-right td-element-after"></i></a>
                            <ul class=sub-menu>
                                <li id=menu-item-2888
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2888">
                                    <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/All">Cloud Library<span
                                            class=td-menu-badge>NEW</span><i
                                            class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-2893
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2893">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Headers">Headers</a>
                                        </li>
                                        <li id=menu-item-2898
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2898">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Sections">Sections</a>
                                        </li>
                                        <li id=menu-item-2894
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2894">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Blocks">Blocks</a>
                                        </li>
                                        <li id=menu-item-2896
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2896">
                                            <a target=_blank rel=noreferrer
                                               href="https://cloud.tagdiv.com/#/load/Homepages">Homepages</a></li>
                                        <li id=menu-item-2900
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2900">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Single">Single
                                                templates</a></li>
                                        <li id=menu-item-2892
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2892">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Category">Category
                                                templates</a></li>
                                        <li id=menu-item-2891
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2891">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Author">Author
                                                templates</a></li>
                                        <li id=menu-item-2890
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2890">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/404">404
                                                templates</a></li>
                                        <li id=menu-item-2899
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2899">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Search">Search
                                                templates</a></li>
                                        <li id=menu-item-2897
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2897">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Pages">Pages</a>
                                        </li>
                                        <li id=menu-item-2895
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2895">
                                            <a target=_blank rel=noreferrer href="https://cloud.tagdiv.com/#/load/Footers">Footers</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id=menu-item-312
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-312">
                                    <a href="#">Premium Features<span class=td-menu-badge>NEW</span><i
                                            class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-2901
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2901">
                                            <a target=_blank rel=noreferrer
                                               href="https://demo.tagdiv.com/newspaper_gossip/2018/08/24/td-post-the-travel-insurance-catch-that-can-double-your-cover-in-two-months/">Auto
                                                Loading Articles <span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2681
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2681">
                                            <a target=_blank rel=noreferrer href="https://tagdiv.com/amp-newspaper-theme/">Google
                                                AMP<span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2761
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2761">
                                            <a href="https://demo.tagdiv.com/newspaper_crypto/buttons/">Multipurpose
                                                Elements<span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2729
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2729">
                                            <a target=_blank rel=noreferrer
                                               href="https://tagdiv.com/newspaper-theme-typography-font-styles-blocks-shortcodes/">Responsive
                                                Typography<span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2733
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2733">
                                            <a target=_blank href="https://demo.tagdiv.com/newspaper_crypto/newsletter/">Newsletter
                                                Plugin<span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2755
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2755">
                                            <a target=_blank
                                               href="https://demo.tagdiv.com/newspaper_crypto/video-background/">Video
                                                Background<span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2757
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2757">
                                            <a target=_blank href="https://demo.tagdiv.com/newspaper_crypto/paralax/">Parallax<span
                                                    class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2758
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2758">
                                            <a target=_blank
                                               href="https://demo.tagdiv.com/newspaper_crypto/fixed-image-background/">Fixed
                                                Image Background<span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2759
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2759">
                                            <a target=_blank href="https://demo.tagdiv.com/newspaper_crypto/row-dividers/">Row
                                                Dividers<span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-2102
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2102">
                                            <a href="https://demo.tagdiv.com/newspaper/mobile-theme/">Mobile Theme</a></li>
                                        <li id=menu-item-2212
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2212">
                                            <a href="https://demo.tagdiv.com/newspaper/block-header-1/">17 Block Header
                                                Templates</a></li>
                                        <li id=menu-item-2076
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2076">
                                            <a href="https://demo.tagdiv.com/newspaper/mobile-menu/">Mobile Menu</a></li>
                                        <li id=menu-item-1865
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1865">
                                            <a href="https://demo.tagdiv.com/newspaper/social-counter-widget/">Social
                                                Counter</a></li>
                                        <li id=menu-item-1866
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1866">
                                            <a href="https://demo.tagdiv.com/newspaper/instagram-widget/">Instagram
                                                Widget</a></li>
                                        <li id=menu-item-1868
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1868">
                                            <a href="https://demo.tagdiv.com/newspaper/weather-widget/">Weather Widget</a>
                                        </li>
                                        <li id=menu-item-2652
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2652">
                                            <a href="https://demo.tagdiv.com/newspaper/pinterest-widget/">Pinterest
                                                Widget</a></li>
                                        <li id=menu-item-1867
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1867">
                                            <a href="https://demo.tagdiv.com/newspaper/exchange-widget/">Exchange Widget</a>
                                        </li>
                                        <li id=menu-item-1588
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1588">
                                            <a href="https://demo.tagdiv.com/newspaper/video-playlist/">Video Playlist</a>
                                        </li>
                                        <li id=menu-item-1590
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1590">
                                            <a href="https://demo.tagdiv.com/newspaper/td-post-aston-villa-beat-liverpool-to-join-arsenal-in-the-fa-cup-final/">tagDiv
                                                Gallery</a></li>
                                        <li id=menu-item-2756
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2756">
                                            <a href="#">More<i class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-2131
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2131">
                                                    <a href="https://demo.tagdiv.com/newspaper/author-box/">Author Box</a>
                                                </li>
                                                <li id=menu-item-2130
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2130">
                                                    <a href="https://demo.tagdiv.com/newspaper/image-box/">Image Box</a>
                                                </li>
                                                <li id=menu-item-1591
                                                    class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1591">
                                                    <a href="https://demo.tagdiv.com/newspaper/td-post-zeta-architecture-hexagon-is-the-new-circle-in-2016/">Image
                                                        Lightbox</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li id=menu-item-297
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-297">
                                    <a href="#">Category layouts<i class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-310
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-310">
                                            <a href="#">Templates<i class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-796
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-796">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-1/">Template
                                                        Style 1</a></li>
                                                <li id=menu-item-797
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-797">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-2/">Template
                                                        Style 2</a></li>
                                                <li id=menu-item-798
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-798">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-3/">Template
                                                        Style 3</a></li>
                                                <li id=menu-item-799
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-799">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-4/">Template
                                                        Style 4</a></li>
                                                <li id=menu-item-800
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-800">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-5/">Template
                                                        Style 5</a></li>
                                                <li id=menu-item-801
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-801">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-6/">Template
                                                        Style 6</a></li>
                                                <li id=menu-item-802
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-802">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-7/">Template
                                                        Style 7</a></li>
                                                <li id=menu-item-803
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-803">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-8/">Template
                                                        Style 8</a></li>
                                            </ul>
                                        </li>
                                        <li id=menu-item-311
                                            class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-311">
                                            <a href="#">Top posts style<i
                                                    class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-812
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-812">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-1/">Grid 1</a>
                                                </li>
                                                <li id=menu-item-813
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-813">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-2/">Grid 2</a>
                                                </li>
                                                <li id=menu-item-814
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-814">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-3/">Grid 3</a>
                                                </li>
                                                <li id=menu-item-815
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-815">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-4/">Grid 4</a>
                                                </li>
                                                <li id=menu-item-816
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-816">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-5/">Grid 5</a>
                                                </li>
                                                <li id=menu-item-817
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-817">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-6/">Grid 6</a>
                                                </li>
                                                <li id=menu-item-818
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-818">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-7/">Grid 7</a>
                                                </li>
                                                <li id=menu-item-819
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-819">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-8/">Grid 8</a>
                                                </li>
                                                <li id=menu-item-1721
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1721">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-9/">Grid 9</a>
                                                </li>
                                                <li id=menu-item-1718
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1718">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-10/">Grid
                                                        10</a></li>
                                                <li id=menu-item-1719
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1719">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-11/">Grid
                                                        11</a></li>
                                                <li id=menu-item-1720
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1720">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-12/">Grid
                                                        12</a></li>
                                                <li id=menu-item-820
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-820">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/no-grid/">No
                                                        Grid</a></li>
                                                <li id=menu-item-1731
                                                    class="td-demo-menuitem-hide menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1731">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-1/">hidden</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id=menu-item-2312
                                            class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2312">
                                            <a href="#">Full top posts style<i
                                                    class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-2313
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2313">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-1/">Grid
                                                        Full 1</a></li>
                                                <li id=menu-item-2315
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2315">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-2/">Grid
                                                        Full 2</a></li>
                                                <li id=menu-item-2316
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2316">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-3/">Grid
                                                        Full 3</a></li>
                                                <li id=menu-item-2317
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2317">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-4/">Grid
                                                        Full 4</a></li>
                                                <li id=menu-item-2318
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2318">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-5/">Grid
                                                        Full 5</a></li>
                                                <li id=menu-item-2319
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2319">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-6/">Grid
                                                        Full 6</a></li>
                                                <li id=menu-item-2320
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2320">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-7/">Grid
                                                        Full 7</a></li>
                                                <li id=menu-item-2321
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2321">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-8/">Grid
                                                        Full 8</a></li>
                                                <li id=menu-item-2322
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2322">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-9/">Grid
                                                        Full 9</a></li>
                                                <li id=menu-item-2314
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2314">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-10/">Grid
                                                        Full 10</a></li>
                                            </ul>
                                        </li>
                                        <li id=menu-item-309
                                            class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-309">
                                            <a href="#">Module list<i class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-821
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-821">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-1-layout/">Module
                                                        1</a></li>
                                                <li id=menu-item-822
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-822">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-2-layout/">Module
                                                        2</a></li>
                                                <li id=menu-item-823
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-823">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-3-layout/">Module
                                                        3</a></li>
                                                <li id=menu-item-824
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-824">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-4-layout/">Module
                                                        4</a></li>
                                                <li id=menu-item-825
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-825">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-5-layout/">Module
                                                        5</a></li>
                                                <li id=menu-item-826
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-826">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-6-layout/">Module
                                                        6</a></li>
                                                <li id=menu-item-827
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-827">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-7-layout/">Module
                                                        7</a></li>
                                                <li id=menu-item-828
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-828">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-8-layout/">Module
                                                        8</a></li>
                                                <li id=menu-item-829
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-829">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-9-layout/">Module
                                                        9</a></li>
                                                <li id=menu-item-830
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-830">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-10-layout/">Module
                                                        10</a></li>
                                                <li id=menu-item-831
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-831">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-11-layout/">Module
                                                        11</a></li>
                                                <li id=menu-item-832
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-832">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-12-layout/">Module
                                                        12</a></li>
                                                <li id=menu-item-833
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-833">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-13-layout/">Module
                                                        13</a></li>
                                                <li id=menu-item-834
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-834">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-14-layout/">Module
                                                        14</a></li>
                                                <li id=menu-item-835
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-835">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-15-layout/">Module
                                                        15</a></li>
                                                <li id=menu-item-836
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-836">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-16-layout/">Module
                                                        16</a></li>
                                                <li id=menu-item-1727
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1727">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-17-layout/">Module
                                                        17</a></li>
                                                <li id=menu-item-1728
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1728">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-18-layout/">Module
                                                        18</a></li>
                                                <li id=menu-item-1729
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1729">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-19-layout/">Module
                                                        19</a></li>
                                                <li id=menu-item-1730
                                                    class="td-demo-menuitem-hide menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1730">
                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-19-layout/">hidden</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li id=menu-item-298
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-298">
                                    <a href="#">Post templates<i class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-973
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-973"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-more-than-120-er-visits-linked-to-synthetic-marijuana-in-nyc-over-past-week/">Default
                                                Style</a></li>
                                        <li id=menu-item-974
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-974"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-400k-for-whisky-most-expensive-foods-and-drink-auctioned/">Style
                                                1</a></li>
                                        <li id=menu-item-975
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-975"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-patricia-urquiola-coats-transparent-furniture-for-glas-italia-with-an-iridescent-sheen/">Style
                                                2</a></li>
                                        <li id=menu-item-976
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-976"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-if-you-only-knew-how-much-your-relative-churn-rate-matters/">Style
                                                3</a></li>
                                        <li id=menu-item-1943
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1943">
                                            <a href="https://demo.tagdiv.com/newspaper/15-grooming-techniques-every-man-needs-to-know/">Style
                                                4</a></li>
                                        <li id=menu-item-979
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-979"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-mcdonell-kanye-west-highlights-difficulties-for-celebrities/">Style
                                                5</a></li>
                                        <li id=menu-item-981
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-981"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-the-new-screen-savers-the-show-that-launched-video-into-the-stratosphere/">Style
                                                6</a></li>
                                        <li id=menu-item-982
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-982"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-lenovo-details-new-computers-that-could-be-heading-our-way-in-2015/">Style
                                                7</a></li>
                                        <li id=menu-item-985
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-985"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-2015-awards-all-of-the-best-and-worst-moments-from-the-show/">Style
                                                8</a></li>
                                        <li id=menu-item-986
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-986"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-major-deep-feelings-january-2015-deep-house-mix/">Style
                                                9</a></li>
                                        <li id=menu-item-987
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-987"><a
                                                href="https://demo.tagdiv.com/newspaper/louge-music-reasons-why-in-form-leicester-city-will-finish/">Style
                                                10</a></li>
                                        <li id=menu-item-988
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-988"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-how-to-make-a-perfect-caffe-macchiato-video/">Style
                                                11</a></li>
                                        <li id=menu-item-1736
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1736">
                                            <a href="https://demo.tagdiv.com/newspaper/td-post-blake-griffin-posterizes-aron-baynes-twice-in-clippers-spurs-game/">Style
                                                12</a></li>
                                        <li id=menu-item-1735
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1735">
                                            <a href="https://demo.tagdiv.com/newspaper/td-post-man-agrees-to-complete-50000-hereford-inlet-lighthouse-paint-job/">Style
                                                13</a></li>
                                    </ul>
                                </li>
                                <li id=menu-item-299
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-299">
                                    <a href="#">Smart lists<i class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-1229
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1229">
                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-1/">Smart List –
                                                Style 1</a></li>
                                        <li id=menu-item-1228
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1228">
                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-2/">Smart List –
                                                Style 2</a></li>
                                        <li id=menu-item-1227
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1227">
                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-3/">Smart List –
                                                Style 3</a></li>
                                        <li id=menu-item-1226
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1226">
                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-4/">Smart List –
                                                Style 4</a></li>
                                        <li id=menu-item-1308
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1308">
                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-5/">Smart List –
                                                Style 5</a></li>
                                        <li id=menu-item-1655
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1655">
                                            <a href="https://demo.tagdiv.com/newspaper/whitewater-rafting-day-trip-new-york-east/">Smart
                                                List &#8211; Style 6</a></li>
                                        <li id=menu-item-1654
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1654">
                                            <a href="https://demo.tagdiv.com/newspaper/10-landscapes-wont-even-imagined-exist/">Smart
                                                List &#8211; Style 7</a></li>
                                        <li id=menu-item-1672
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1672">
                                            <a href="https://demo.tagdiv.com/newspaper/apple-ipad-pro-review-powerful-ipad-experience/">Smart
                                                List &#8211; Style 8</a></li>
                                    </ul>
                                </li>
                                <li id=menu-item-300
                                    class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-300">
                                    <a href="#">Content blocks <span class=td-menu-badge>NEW</span><i
                                            class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-2728
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2728">
                                            <a href="https://demo.tagdiv.com/newspaper/flex-block/">Flex 1 <span
                                                    class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-497
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-497">
                                            <a href="https://demo.tagdiv.com/newspaper/block-1/">Block 1</a></li>
                                        <li id=menu-item-508
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-508">
                                            <a href="https://demo.tagdiv.com/newspaper/block-2/">Block 2</a></li>
                                        <li id=menu-item-511
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-511">
                                            <a href="https://demo.tagdiv.com/newspaper/block-3/">Block 3</a></li>
                                        <li id=menu-item-512
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-512">
                                            <a href="https://demo.tagdiv.com/newspaper/block-4/">Block 4</a></li>
                                        <li id=menu-item-513
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-513">
                                            <a href="https://demo.tagdiv.com/newspaper/block-5/">Block 5</a></li>
                                        <li id=menu-item-514
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-514">
                                            <a href="https://demo.tagdiv.com/newspaper/block-6/">Block 6</a></li>
                                        <li id=menu-item-515
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-515">
                                            <a href="https://demo.tagdiv.com/newspaper/block-7/">Block 7</a></li>
                                        <li id=menu-item-516
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-516">
                                            <a href="https://demo.tagdiv.com/newspaper/block-8/">Block 8</a></li>
                                        <li id=menu-item-517
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-517">
                                            <a href="https://demo.tagdiv.com/newspaper/block-9/">Block 9</a></li>
                                        <li id=menu-item-498
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-498">
                                            <a href="https://demo.tagdiv.com/newspaper/block-10/">Block 10</a></li>
                                        <li id=menu-item-499
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-499">
                                            <a href="https://demo.tagdiv.com/newspaper/block-11/">Block 11</a></li>
                                        <li id=menu-item-500
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-500">
                                            <a href="https://demo.tagdiv.com/newspaper/block-12/">Block 12</a></li>
                                        <li id=menu-item-501
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-501">
                                            <a href="https://demo.tagdiv.com/newspaper/block-13/">Block 13</a></li>
                                        <li id=menu-item-502
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-502">
                                            <a href="https://demo.tagdiv.com/newspaper/block-14/">Block 14</a></li>
                                        <li id=menu-item-503
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-503">
                                            <a href="https://demo.tagdiv.com/newspaper/block-15/">Block 15</a></li>
                                        <li id=menu-item-504
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-504">
                                            <a href="https://demo.tagdiv.com/newspaper/block-16/">Block 16</a></li>
                                        <li id=menu-item-505
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-505">
                                            <a href="https://demo.tagdiv.com/newspaper/block-17/">Block 17</a></li>
                                        <li id=menu-item-506
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-506">
                                            <a href="https://demo.tagdiv.com/newspaper/block-18/">Block 18</a></li>
                                        <li id=menu-item-507
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-507">
                                            <a href="https://demo.tagdiv.com/newspaper/block-19/">Block 19</a></li>
                                        <li id=menu-item-509
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-509">
                                            <a href="https://demo.tagdiv.com/newspaper/block-20/">Block 20</a></li>
                                        <li id=menu-item-510
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-510">
                                            <a href="https://demo.tagdiv.com/newspaper/block-21/">Block 21</a></li>
                                        <li id=menu-item-1752
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1752">
                                            <a href="https://demo.tagdiv.com/newspaper/block-22/">Block 22</a></li>
                                        <li id=menu-item-1751
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1751">
                                            <a href="https://demo.tagdiv.com/newspaper/block-23/">Block 23</a></li>
                                        <li id=menu-item-1750
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1750">
                                            <a href="https://demo.tagdiv.com/newspaper/block-24/">Block 24</a></li>
                                        <li id=menu-item-1784
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1784">
                                            <a href="https://demo.tagdiv.com/newspaper/block-25/">Block 25</a></li>
                                    </ul>
                                </li>
                                <li id=menu-item-301
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-301">
                                    <a href="#">Other blocks content<i class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-565
                                            class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-565">
                                            <a href="#">12 Big Grids<i class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-608
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-608">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-1/">Big Grid 1</a>
                                                </li>
                                                <li id=menu-item-609
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-609">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-2/">Big Grid 2</a>
                                                </li>
                                                <li id=menu-item-610
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-610">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-3/">Big Grid 3</a>
                                                </li>
                                                <li id=menu-item-611
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-611">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-4/">Big Grid 4</a>
                                                </li>
                                                <li id=menu-item-612
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-612">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-5/">Big Grid 5</a>
                                                </li>
                                                <li id=menu-item-613
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-613">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-6/">Big Grid 6</a>
                                                </li>
                                                <li id=menu-item-614
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-614">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-7/">Big Grid 7</a>
                                                </li>
                                                <li id=menu-item-615
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-615">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-8/">Big Grid 8</a>
                                                </li>
                                                <li id=menu-item-1789
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1789">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-9/">Big Grid 9</a>
                                                </li>
                                                <li id=menu-item-1788
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1788">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-10/">Big Grid 10</a>
                                                </li>
                                                <li id=menu-item-1787
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1787">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-11/">Big Grid 11</a>
                                                </li>
                                                <li id=menu-item-1786
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1786">
                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-12/">Big Grid 12</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id=menu-item-2441
                                            class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2441">
                                            <a href="#">10 Full Big Grids<i class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-2440
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2440">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-1/">Full Grid
                                                        1</a></li>
                                                <li id=menu-item-2439
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2439">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-2/">Full Grid
                                                        2</a></li>
                                                <li id=menu-item-2438
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2438">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-3/">Full Grid
                                                        3</a></li>
                                                <li id=menu-item-2437
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2437">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-4/">Full Grid
                                                        4</a></li>
                                                <li id=menu-item-2436
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2436">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-5/">Full Grid
                                                        5</a></li>
                                                <li id=menu-item-2435
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2435">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-6/">Full Grid
                                                        6</a></li>
                                                <li id=menu-item-2434
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2434">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-7/">Full Grid
                                                        7</a></li>
                                                <li id=menu-item-2433
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2433">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-8/">Full Grid
                                                        8</a></li>
                                                <li id=menu-item-2432
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2432">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-9/">Full Grid
                                                        9</a></li>
                                                <li id=menu-item-2431
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2431">
                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-10/">Full Grid
                                                        10</a></li>
                                            </ul>
                                        </li>
                                        <li id=menu-item-1608
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1608">
                                            <a href="https://demo.tagdiv.com/newspaper/big-grid-slide/">Big Grid Slide</a>
                                        </li>
                                        <li id=menu-item-621
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-621">
                                            <a href="https://demo.tagdiv.com/newspaper/ios-slider/">IOS Slider</a></li>
                                        <li id=menu-item-631
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-631">
                                            <a href="https://demo.tagdiv.com/newspaper/news-ticker/">News Ticker</a></li>
                                        <li id=menu-item-636
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-636">
                                            <a href="https://demo.tagdiv.com/newspaper/homepage-one-top-post/">Homepage
                                                Post</a></li>
                                    </ul>
                                </li>
                                <li id=menu-item-302
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-302">
                                    <a href="#">Shortcodes<i class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-669
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-669">
                                            <a href="https://demo.tagdiv.com/newspaper/blockquotes-pullquotes/">Blockquotes
                                                &#038; Pullquotes</a></li>
                                        <li id=menu-item-668
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-668">
                                            <a href="https://demo.tagdiv.com/newspaper/grid-columns/">Grid Columns</a></li>
                                        <li id=menu-item-667
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-667">
                                            <a href="https://demo.tagdiv.com/newspaper/dropcaps/">Dropcaps</a></li>
                                        <li id=menu-item-665
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-665">
                                            <a href="https://demo.tagdiv.com/newspaper/lists/">Lists</a></li>
                                        <li id=menu-item-2072
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2072">
                                            <a href="https://demo.tagdiv.com/newspaper/typography-formats/">Typography
                                                Formats</a></li>
                                        <li id=menu-item-664
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-664">
                                            <a href="https://demo.tagdiv.com/newspaper/typology-and-html-elements/">Typology
                                                and HTML elements</a></li>
                                    </ul>
                                </li>
                                <li id=menu-item-303
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-303">
                                    <a href="#">Sidebars<i class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-1615
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1615">
                                            <a href="https://demo.tagdiv.com/newspaper/td-post-10-superfoods-that-lower-cholesterol/">Left
                                                Sidebar</a></li>
                                        <li id=menu-item-1612
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1612">
                                            <a href="https://demo.tagdiv.com/newspaper/td-post-five-things-you-may-have-missed-over-the-weekend-from-the-world-of-business/">No
                                                Sidebar</a></li>
                                        <li id=menu-item-1613
                                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1613">
                                            <a href="https://demo.tagdiv.com/newspaper/td-post-microsoft-subsumes-open-tech-unit-back-inside-mothership/">Right
                                                Sidebar</a></li>
                                    </ul>
                                </li>
                                <li id=menu-item-304
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-304"><a
                                        target=_blank href="https://demo.tagdiv.com/newspaper_tech/shop">WooCommerce</a>
                                </li>
                                <li id=menu-item-305
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-305">
                                    <a href="#">Pages <span class=td-menu-badge>NEW</span><i
                                            class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-2730
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2730">
                                            <a target=_blank href="https://demo.tagdiv.com/newspaper_nature/news/">Menu
                                                Overlay Page<span class=td-menu-badge>NEW</span></a></li>
                                        <li id=menu-item-683
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-683">
                                            <a href="#">Embeds<i class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-684
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-684">
                                                    <a href="https://demo.tagdiv.com/newspaper/td-post-vfx-techniques-creating-a-cg-flag-with-after-effects/">Vimeo</a>
                                                </li>
                                                <li id=menu-item-688
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-688">
                                                    <a href="https://demo.tagdiv.com/newspaper/td-post-lollapalooza-2014-chromeo-interview-with-dave-1-and-p-thugg/">Youtube</a>
                                                </li>
                                                <li id=menu-item-691
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-691">
                                                    <a href="https://demo.tagdiv.com/newspaper/td-post-what-happens-when-your-carryon-is-over-the-limit/">Dailymotion</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id=menu-item-692
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-692"><a
                                                href="https://demo.tagdiv.com/newspaper/author/admin/">Author</a></li>
                                        <li id=menu-item-693
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-693"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-more-than-120-er-visits-linked-to-synthetic-marijuana-in-nyc-over-past-week/#comments">Comments</a>
                                        </li>
                                        <li id=menu-item-697
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-697"><a
                                                href="https://demo.tagdiv.com/newspaper/no-page">404</a></li>
                                        <li id=menu-item-698
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-698"><a
                                                href="https://demo.tagdiv.com/newspaper/2017/">Archive</a></li>
                                        <li id=menu-item-699
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-699"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-pasta-with-caramelised-onions-and-yogurt-recipe/attachment/57/">Attachment</a>
                                        </li>
                                        <li id=menu-item-700
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-700"><a
                                                href="https://demo.tagdiv.com/newspaper/?s=food">Search</a></li>
                                        <li id=menu-item-701
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-701"><a
                                                href="https://demo.tagdiv.com/newspaper/tag/wordpress/">Tag</a></li>
                                        <li id=menu-item-702
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-702"><a
                                                href="https://demo.tagdiv.com/newspaper/blog/">Blog</a></li>
                                        <li id=menu-item-714
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-714"><a
                                                href="https://demo.tagdiv.com/newspaper/contact/">Contact</a></li>
                                    </ul>
                                </li>
                                <li id=menu-item-306
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-306">
                                    <a href="#">Reviews<i class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-738
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-738"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-intel-claims-new-ssd-750-drives-are-its-fastest-ever-for-desktop/">Points
                                                Review</a></li>
                                        <li id=menu-item-736
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-736"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-why-tech-accelerators-may-soon-be-as-irrelevant-as-an-mba/">Stars
                                                Review</a></li>
                                        <li id=menu-item-737
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-737"><a
                                                href="https://demo.tagdiv.com/newspaper/td-post-htc-nexus-8-with-64-bit-processor-4gb-of-ram-and-8mp-camera-leaks/">Percent
                                                Review</a></li>
                                    </ul>
                                </li>
                                <li id=menu-item-739
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-739">
                                    <a href="#">Child menu<i class="td-icon-menu-right td-element-after"></i></a>
                                    <ul class=sub-menu>
                                        <li id=menu-item-742
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-742">
                                            <a href="#">Sub-child menu<i
                                                    class="td-icon-menu-right td-element-after"></i></a>
                                            <ul class=sub-menu>
                                                <li id=menu-item-743
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-743">
                                                    <a href="#">Sub-child menu</a></li>
                                                <li id=menu-item-744
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-744">
                                                    <a href="#">Sub-child menu</a></li>
                                                <li id=menu-item-745
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-745">
                                                    <a href="#">Sub-child menu</a></li>
                                                <li id=menu-item-746
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-746">
                                                    <a href="#">Sub-child menu</a></li>
                                            </ul>
                                        </li>
                                        <li id=menu-item-740
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-740"><a
                                                href="#">Sub-child menu</a></li>
                                        <li id=menu-item-741
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-741"><a
                                                href="#">Sub-child menu</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li id=menu-item-307
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-307">
                            <a href="#">Homepages<i class="td-icon-menu-right td-element-after"></i></a>
                            <ul class=sub-menu>
                                <li id=menu-item-1094
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1094"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-fashion/">Homepage – Fashion</a>
                                </li>
                                <li id=menu-item-1112
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1112"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-blog/">Homepage – Blog</a></li>
                                <li id=menu-item-1109
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1109"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-video/">Homepage – Video</a></li>
                                <li id=menu-item-1129
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1129"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-tech/">Homepage – Tech</a></li>
                                <li id=menu-item-1123
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1123"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-sport/">Homepage – Sport</a></li>
                                <li id=menu-item-1185
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1185"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-full-post-featured/">Homepage –
                                        Full Post Featured</a></li>
                                <li id=menu-item-1140
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1140"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-newspaper/">Homepage –
                                        Newspaper</a></li>
                                <li id=menu-item-1563
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1563"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-newsmag/">Homepage – Newsmag</a>
                                </li>
                                <li id=menu-item-1195
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1195"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-magazine/">Homepage – Magazine</a>
                                </li>
                                <li id=menu-item-1161
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1161"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-big-slide/">Homepage – Big
                                        Slide</a></li>
                                <li id=menu-item-1137
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1137"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-infinite-scroll/">Homepage –
                                        Infinite Scroll</a></li>
                                <li id=menu-item-1158
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1158"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-loop/">Homepage – Loop</a></li>
                                <li id=menu-item-1167
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1167"><a
                                        href="https://demo.tagdiv.com/newspaper/homepage-less-images/">Homepage – Less
                                        Images</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id=login-form-mobile class=td-register-section>
            <div id=td-login-mob class="td-login-animation td-login-hide-mob">
                <div class=td-login-close>
                    <a href="#" class=td-back-button><i class=td-icon-read-down></i></a>
                    <div class=td-login-title>Sign in</div>
                    <div class=td-mobile-close>
                        <a href="#"><i class=td-icon-close-mobile></i></a>
                    </div>
                </div>
                <div class=td-login-form-wrap>
                    <div class=td-login-panel-title><span>Welcome!</span>Log into your account</div>
                    <div class=td_display_err></div>
                    <div class=td-login-inputs><input class=td-login-input type=text name=login_email id=login_email-mob
                                                      value="" required><label>your username</label></div>
                    <div class=td-login-inputs><input class=td-login-input type=password name=login_pass id=login_pass-mob
                                                      value="" required><label>your password</label></div>
                    <input type=button name=login_button id=login_button-mob class=td-login-button value="LOG IN">
                    <div class=td-login-info-text>
                        <a href="#" id=forgot-pass-link-mob>Forgot your password?</a>
                    </div>
                </div>
            </div>
            <div id=td-forgot-pass-mob class="td-login-animation td-login-hide-mob">
                <div class=td-forgot-pass-close>
                    <a href="#" class=td-back-button><i class=td-icon-read-down></i></a>
                    <div class=td-login-title>Password recovery</div>
                </div>
                <div class=td-login-form-wrap>
                    <div class=td-login-panel-title>Recover your password</div>
                    <div class=td_display_err></div>
                    <div class=td-login-inputs><input class=td-login-input type=text name=forgot_email id=forgot_email-mob
                                                      value="" required><label>your email</label></div>
                    <input type=button name=forgot_button id=forgot_button-mob class=td-login-button value="Send My Pass">
                </div>
            </div>
        </div>
    </div>
    <div class=td-search-background></div>
    <div class=td-search-wrap-mob>
        <div class=td-drop-down-search aria-labelledby=td-header-search-button>
            <form method=get class=td-search-form action="https://demo.tagdiv.com/newspaper/">
                <div class=td-search-close>
                    <a href="#"><i class=td-icon-close-mobile></i></a>
                </div>
                <div role=search class=td-search-input>
                    <span>Search</span>
                    <input id=td-header-search-mob type=text value="" name=s autocomplete=off/>
                </div>
            </form>
            <div id=td-aj-search-mob></div>
        </div>
    </div>
    <style>
        @media (max-width: 767px) {
            .td-header-desktop-wrap {
                display: none
            }
        }
        @media (min-width: 767px) {
            .td-header-mobile-wrap {
                display: none
            }
        }
    </style>
    <div id=td-outer-wrap class=td-theme-wrap>
        <div class="tdc-header-wrap ">
            <div class="td-header-wrap td-header-style-1 ">
                <div class="td-header-top-menu-full td-container-wrap ">
                    <div class="td-container td-header-row td-header-top-menu">
                        <div class=top-bar-style-1>
                            <div class=td-header-sp-top-menu>
                                <div class=td-weather-top-widget id=td_top_weather_uid>
                                    <i class="td-icons broken-clouds-n"></i>
                                    <div class=td-weather-now data-block-uid=td_top_weather_uid>
                                        <span class=td-big-degrees>-4.9</span>
                                        <span class=td-weather-unit>C</span>
                                    </div>
                                    <div class=td-weather-header>
                                        <div class=td-weather-city>Москва</div>
                                    </div>
                                </div>
                                <div class=td_data_time>
                                    <div>
                                        <?= date("d.m.Y",strtotime(time()));?>
                                    </div>
                                </div>
                                <ul class="top-header-menu td_ul_login">
                                    <li class=menu-item><a class="td-login-modal-js menu-item" href="#login-form"
                                                           data-effect=mpf-td-login-effect>Вход / Регистрация</a><span
                                            class="td-sp-ico-login td_sp_login_ico_style"></span></li>
                                </ul>
                                <div class=menu-top-container>
                                    <ul id=menu-top-menu class=top-header-menu>
                                        <li id=menu-item-10
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-first td-menu-item td-normal-menu menu-item-10">
                                            <a href="<?= \yii\helpers\Url::to('blog');?>">Блог</a></li>
                                        <li id=menu-item-11
                                            class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-11">
                                            <a target=_blank
                                               href="<?= \yii\helpers\Url::to('site/partners');?>">Партнеры</a></li>
                                        <li id=menu-item-9
                                            class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-9">
                                            <a href="<?= \yii\helpers\Url::to('site/contact');?>">Контакты</a></li>
                                        <li id=menu-item-12
                                            class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-12">
                                            <a target=_blank rel=noreferrer
                                               href="<?= \yii\helpers\Url::to('site/advertise');?>">Реклама</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class=td-header-sp-top-widget>
<span class=td-social-icon-wrap>
<a target=_blank href="#" title=Facebook>
<i class="td-icon-font td-icon-facebook"></i>
</a>
</span>
                                <span class=td-social-icon-wrap>
<a target=_blank href="#" title=Twitter>
<i class="td-icon-font td-icon-twitter"></i>
</a>
</span>
                                <span class=td-social-icon-wrap>
<a target=_blank href="#" title=Vimeo>
<i class="td-icon-font td-icon-vimeo"></i>
</a>
</span>
                                <span class=td-social-icon-wrap>
<a target=_blank href="#" title=VKontakte>
<i class="td-icon-font td-icon-vk"></i>
</a>
</span>
                                <span class=td-social-icon-wrap>
<a target=_blank href="#" title=Youtube>
<i class="td-icon-font td-icon-youtube"></i>
</a>
</span></div>
                        </div>
                        <div id=login-form class="white-popup-block mfp-hide mfp-with-anim">
                            <div class=td-login-wrap>
                                <a href="#" class=td-back-button><i class=td-icon-modal-back></i></a>
                                <div id=td-login-div class="td-login-form-div td-display-block">
                                    <div class=td-login-panel-title>Авторизация</div>
                                    <div class=td-login-panel-descr>Добро пожаловать! Войдите в Ваш аккаунт</div>
                                    <div class=td_display_err></div>
                                    <div class=td-login-inputs>
                                        <input class=td-login-input type=text name=login_email id=login_email value="" required>
                                        <label>ваше логин</label></div>
                                    <div class=td-login-inputs>
                                        <input class=td-login-input type=password name=login_pass id=login_pass value="" required>
                                        <label>ваш пароль</label></div>
                                    <input type=button name=login_button id=login_button  class="wpb_button btn td-login-button" value=Войти>
                                    <div class=td-login-info-text>
                                        <a href="#" id=forgot-pass-link> Забыли пароль? Получить помощь</a></div>
                                </div>
                                <div id=td-forgot-pass-div class="td-login-form-div td-display-none">
                                    <div class=td-login-panel-title>Восстановление пароля</div>
                                    <div class=td-login-panel-descr>Восстановите ваш пароль</div>
                                    <div class=td_display_err></div>
                                    <div class=td-login-inputs>
                                        <input class=td-login-input type=text name=forgot_email id=forgot_email value="" required>
                                        <label>ваш email</label></div>
                                    <input type=button name=forgot_button id=forgot_button class="wpb_button btn td-login-button" value="Отправить">
                                    <div class=td-login-info-text>Пароль будет отправлен на Ваш e-mail</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td-banner-wrap-full td-logo-wrap-full td-container-wrap ">
                    <div class="td-container td-header-row td-header-header">
                        <div class=td-header-sp-logo>
                            <h1 class=td-logo><a class=td-main-logo href="/">
                                    <img class=td-retina-data
                                         data-retina="/themeassets/uploads/2018/08/logo-header@2x.png"
                                         src="/themeassets/uploads/2018/08/logo-header.png"
                                         alt="Inchats logo" title="Logotype Inchats company"/>
                                    <span class=td-visual-hidden>Newspaper 9 Demo</span>
                                </a>
                            </h1></div>
                        <div class=td-header-sp-recs>
                            <div class=td-header-rec-wrap>
                                <div class="td-a-rec td-a-rec-id-header  td_uid_1_5c76770ac298c_rand td_block_template_1">
                                    <div class=td-visible-desktop>
                                        <a href="http://themeforest.net/item/newspaper/5489609">
                                            <img class=td-retina
                                                                                                     style=max-width:728px
                                                                                                     src="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/04/newspaper-rec728.jpg"
                                                                                                     alt="" width=728
                                                                                                     height=90/></a>
                                    </div>
                                    <div class=td-visible-tablet-landscape>
                                        <a href="http://themeforest.net/item/newspaper/5489609"><img class=td-retina
                                                                                                     style=max-width:728px
                                                                                                     src="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/04/newspaper-rec728.jpg"
                                                                                                     alt="" width=728
                                                                                                     height=90/></a>
                                    </div>
                                    <div class=td-visible-tablet-portrait>
                                        <a href="http://themeforest.net/item/newspaper/5489609"><img class=td-retina
                                                                                                     style=max-width:468px
                                                                                                     src="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/04/newspaper-rec468.jpg"
                                                                                                     alt="" width=468
                                                                                                     height=60></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="td-header-menu-wrap-full td-container-wrap ">
                    <div class="td-header-menu-wrap td-header-gradient ">
                        <div class="td-container td-header-row td-header-main-menu">
                            <div id=td-header-menu role=navigation>
                                <div id=td-top-mobile-toggle><a href="#"><i class="td-icon-font td-icon-mobile"></i></a>
                                </div>
                                <div class="td-main-menu-logo td-logo-in-header">
                                    <a class="td-mobile-logo td-sticky-header" href="/">
                                        <img class=td-retina-data
                                             data-retina="/themeassets/uploads/2018/08/logo-mobile@2x.png"
                                             src="/themeassets/uploads/2018/08/logo-mobile.png"
                                             alt="Newspaper WordPress Theme" title="Newspaper WordPress Theme"/>
                                    </a>
                                    <a class="td-header-logo td-sticky-header" href="https://demo.tagdiv.com/newspaper/">
                                        <img class=td-retina-data
                                             data-retina="/themeassets/uploads/2018/08/logo-header@2x.png"
                                             src="/themeassets/uploads/2018/08/logo-header.png"
                                             alt="Newspaper WordPress Theme" title="Newspaper WordPress Theme"/>
                                    </a>
                                </div>
                                <div class=menu-main-menu-container>
                                    <ul id=menu-main-menu-1 class=sf-menu>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-13 current_page_item menu-item-first td-menu-item td-normal-menu menu-item-15">
                                            <a href="/">Новости</a></li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-mega-menu menu-item-291">
                                            <a href="/blog">Технологии</a>
                                            <ul class=sub-menu>
                                                <li class=menu-item-0>
                                                    <div class=td-container-border>
                                                        <div class=td-mega-grid>
                                                            <div class="td_block_wrap td_block_mega_menu td_uid_2_5c76770ac7c4c_rand td_with_ajax_pagination td-pb-border-top td_block_template_1 td_ajax_preloading_preload"
                                                                 data-td-block-uid=td_uid_2_5c76770ac7c4c>
                                                                <script>var block_td_uid_2_5c76770ac7c4c = new tdBlock();
                                                                    block_td_uid_2_5c76770ac7c4c.id = "td_uid_2_5c76770ac7c4c";
                                                                    block_td_uid_2_5c76770ac7c4c.atts = '{"limit":4,"td_column_number":3,"ajax_pagination":"next_prev","category_id":"6","show_child_cat":30,"td_ajax_filter_type":"td_category_ids_filter","td_ajax_preloading":"preload","block_template_id":"","header_color":"","ajax_pagination_infinite_stop":"","offset":"","td_filter_default_txt":"","td_ajax_filter_ids":"","el_class":"","color_preset":"","border_top":"","css":"","tdc_css":"","class":"td_uid_2_5c76770ac7c4c_rand","tdc_css_class":"td_uid_2_5c76770ac7c4c_rand","tdc_css_class_style":"td_uid_2_5c76770ac7c4c_rand_style"}';
                                                                    block_td_uid_2_5c76770ac7c4c.td_column_number = "3";
                                                                    block_td_uid_2_5c76770ac7c4c.block_type = "td_block_mega_menu";
                                                                    block_td_uid_2_5c76770ac7c4c.post_count = "4";
                                                                    block_td_uid_2_5c76770ac7c4c.found_posts = "32";
                                                                    block_td_uid_2_5c76770ac7c4c.header_color = "";
                                                                    block_td_uid_2_5c76770ac7c4c.ajax_pagination_infinite_stop = "";
                                                                    block_td_uid_2_5c76770ac7c4c.max_num_pages = "8";
                                                                    tdBlocksArray.push(block_td_uid_2_5c76770ac7c4c);</script>
                                                                <script>var tmpObj = JSON.parse(JSON.stringify(block_td_uid_2_5c76770ac7c4c));
                                                                    tmpObj.is_ajax_running = true;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-kerala-india-they-call-it-own-country-for-nothing\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Kerala, India: They call it Own Country for nothing\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Kerala, India: They call it Own Country for nothing\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/1-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/\" class=\"td-post-category\">Fashion<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-kerala-india-they-call-it-own-country-for-nothing\/\" rel=\"bookmark\" title=\"Kerala, India: They call it Own Country for nothing\">Kerala, India: They call it Own Country for nothing<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-designer-fashion-show-kicks-off-variety-week\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Designer fashion show kicks off Variety Week\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Designer fashion show kicks off Variety Week\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/12-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-new-look-2015\/\" class=\"td-post-category\">New look 2018<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-designer-fashion-show-kicks-off-variety-week\/\" rel=\"bookmark\" title=\"Designer fashion show kicks off Variety Week\">Designer fashion show kicks off Variety Week<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-springfest-one-fashion-show-at-the-university-of-michigan\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"SpringFest One Fashion Show at the University of Michigan\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"SpringFest One Fashion Show at the University of Michigan\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/9-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-new-look-2015\/\" class=\"td-post-category\">New look 2018<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-springfest-one-fashion-show-at-the-university-of-michigan\/\" rel=\"bookmark\" title=\"SpringFest One Fashion Show at the University of Michigan\">SpringFest One Fashion Show at the University of Michigan<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/fashion-photography-helps-raising-funds\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"15 Grooming Techniques Every Man Needs to Know\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"15 Grooming Techniques Every Man Needs to Know\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/03\/grid44-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-style-hunter\/\" class=\"td-post-category\">Style hunter<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/fashion-photography-helps-raising-funds\/\" rel=\"bookmark\" title=\"15 Grooming Techniques Every Man Needs to Know\">15 Grooming Techniques Every Man Needs to Know<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_2_5c76770ac7c4c",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));
                                                                    tmpObj = JSON.parse(JSON.stringify(block_td_uid_2_5c76770ac7c4c));
                                                                    tmpObj.is_ajax_running = true;
                                                                    tmpObj.td_current_page = 1;
                                                                    tmpObj.td_filter_value = 8;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-designer-fashion-show-kicks-off-variety-week\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Designer fashion show kicks off Variety Week\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Designer fashion show kicks off Variety Week\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/12-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-new-look-2015\/\" class=\"td-post-category\">New look 2018<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-designer-fashion-show-kicks-off-variety-week\/\" rel=\"bookmark\" title=\"Designer fashion show kicks off Variety Week\">Designer fashion show kicks off Variety Week<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-springfest-one-fashion-show-at-the-university-of-michigan\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"SpringFest One Fashion Show at the University of Michigan\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"SpringFest One Fashion Show at the University of Michigan\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/9-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-new-look-2015\/\" class=\"td-post-category\">New look 2018<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-springfest-one-fashion-show-at-the-university-of-michigan\/\" rel=\"bookmark\" title=\"SpringFest One Fashion Show at the University of Michigan\">SpringFest One Fashion Show at the University of Michigan<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-olivia-wilde-looks-fashion-forward-in-patterned-dress\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Olivia Wilde looks fashion forward in patterned dress\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Olivia Wilde looks fashion forward in patterned dress\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/13-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-new-look-2015\/\" class=\"td-post-category\">New look 2018<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-olivia-wilde-looks-fashion-forward-in-patterned-dress\/\" rel=\"bookmark\" title=\"Olivia Wilde looks fashion forward in patterned dress\">Olivia Wilde looks fashion forward in patterned dress<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-sleeping-bear-dunes-shipwrecks-spotted-by-helicopter-patrol\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Sleeping Bear Dunes shipwrecks spotted by helicopter patrol\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Sleeping Bear Dunes shipwrecks spotted by helicopter patrol\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/11-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-new-look-2015\/\" class=\"td-post-category\">New look 2018<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-sleeping-bear-dunes-shipwrecks-spotted-by-helicopter-patrol\/\" rel=\"bookmark\" title=\"Sleeping Bear Dunes shipwrecks spotted by helicopter patrol\">Sleeping Bear Dunes shipwrecks spotted by helicopter patrol<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_2_5c76770ac7c4c",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));
                                                                    tmpObj = JSON.parse(JSON.stringify(block_td_uid_2_5c76770ac7c4c));
                                                                    tmpObj.is_ajax_running = true;
                                                                    tmpObj.td_current_page = 1;
                                                                    tmpObj.td_filter_value = 7;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-if-you-only-knew-how-much-your-relative-churn-rate-matters\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"If You Only Knew How Much Your Relative Churn Rate Matters\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"If You Only Knew How Much Your Relative Churn Rate Matters\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/8-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-street-fashion\/\" class=\"td-post-category\">Street fashion<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-if-you-only-knew-how-much-your-relative-churn-rate-matters\/\" rel=\"bookmark\" title=\"If You Only Knew How Much Your Relative Churn Rate Matters\">If You Only Knew How Much Your Relative Churn Rate Matters<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-shanghai-fashion-week-the-shape-of-things-to-come\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Shanghai Fashion Week: the shape of things to come\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Shanghai Fashion Week: the shape of things to come\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/5-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-street-fashion\/\" class=\"td-post-category\">Street fashion<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-shanghai-fashion-week-the-shape-of-things-to-come\/\" rel=\"bookmark\" title=\"Shanghai Fashion Week: the shape of things to come\">Shanghai Fashion Week: the shape of things to come<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-summer-fashion-trends-2015-the-pieces-that-deserve\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Summer Fashion Trends 2015: The Pieces That Deserve\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Summer Fashion Trends 2015: The Pieces That Deserve\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/4-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-street-fashion\/\" class=\"td-post-category\">Street fashion<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-summer-fashion-trends-2015-the-pieces-that-deserve\/\" rel=\"bookmark\" title=\"Summer Fashion Trends 2015: The Pieces That Deserve\">Summer Fashion Trends 2015: The Pieces That Deserve<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-which-top-fashion-designers-wear-their-own-clothes\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Which top fashion designers wear their own clothes?\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Which top fashion designers wear their own clothes?\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/02\/7-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-street-fashion\/\" class=\"td-post-category\">Street fashion<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-which-top-fashion-designers-wear-their-own-clothes\/\" rel=\"bookmark\" title=\"Which top fashion designers wear their own clothes?\">Which top fashion designers wear their own clothes?<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_2_5c76770ac7c4c",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));
                                                                    tmpObj = JSON.parse(JSON.stringify(block_td_uid_2_5c76770ac7c4c));
                                                                    tmpObj.is_ajax_running = true;
                                                                    tmpObj.td_current_page = 1;
                                                                    tmpObj.td_filter_value = 10;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/fashion-photography-helps-raising-funds\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"15 Grooming Techniques Every Man Needs to Know\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"15 Grooming Techniques Every Man Needs to Know\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/03\/grid44-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-style-hunter\/\" class=\"td-post-category\">Style hunter<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/fashion-photography-helps-raising-funds\/\" rel=\"bookmark\" title=\"15 Grooming Techniques Every Man Needs to Know\">15 Grooming Techniques Every Man Needs to Know<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-kim-selfie-book-available-for-pre-order-walks-her-last-runway-show\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Kim Selfie Book Available For Pre-Order, Walks Her Last Runway Show\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Kim Selfie Book Available For Pre-Order, Walks Her Last Runway Show\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/21-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-style-hunter\/\" class=\"td-post-category\">Style hunter<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-kim-selfie-book-available-for-pre-order-walks-her-last-runway-show\/\" rel=\"bookmark\" title=\"Kim Selfie Book Available For Pre-Order, Walks Her Last Runway Show\">Kim Selfie Book Available For Pre-Order, Walks Her Last Runway Show<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-academy-of-country-music-awards-2015-red-carpet-fashion\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Academy of Country Music Awards 2015 Red Carpet Fashion\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Academy of Country Music Awards 2015 Red Carpet Fashion\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/22-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-style-hunter\/\" class=\"td-post-category\">Style hunter<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-academy-of-country-music-awards-2015-red-carpet-fashion\/\" rel=\"bookmark\" title=\"Academy of Country Music Awards 2015 Red Carpet Fashion\">Academy of Country Music Awards 2015 Red Carpet Fashion<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-removes-its-rule-about-running-advertising-on-covers\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Removes Its Rule About Running Advertising on Covers\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Removes Its Rule About Running Advertising on Covers\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/20-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-style-hunter\/\" class=\"td-post-category\">Style hunter<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-removes-its-rule-about-running-advertising-on-covers\/\" rel=\"bookmark\" title=\"Removes Its Rule About Running Advertising on Covers\">Removes Its Rule About Running Advertising on Covers<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_2_5c76770ac7c4c",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));
                                                                    tmpObj = JSON.parse(JSON.stringify(block_td_uid_2_5c76770ac7c4c));
                                                                    tmpObj.is_ajax_running = true;
                                                                    tmpObj.td_current_page = 1;
                                                                    tmpObj.td_filter_value = 9;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-sir-john-is-new-celebrity-makeup-artist-and-is-worth-3-8-billion\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Sir John is New Celebrity Makeup Artist and is Worth $3.8 Billion\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Sir John is New Celebrity Makeup Artist and is Worth $3.8 Billion\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/18-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-vogue\/\" class=\"td-post-category\">Vogue<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-sir-john-is-new-celebrity-makeup-artist-and-is-worth-3-8-billion\/\" rel=\"bookmark\" title=\"Sir John is New Celebrity Makeup Artist and is Worth $3.8 Billion\">Sir John is New Celebrity Makeup Artist and is Worth $3.8...<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-burberry-brings-london-to-la-including-the-grenadier-guards\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Burberry Brings London to LA, Including the Grenadier Guards\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Burberry Brings London to LA, Including the Grenadier Guards\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/17-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-vogue\/\" class=\"td-post-category\">Vogue<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-burberry-brings-london-to-la-including-the-grenadier-guards\/\" rel=\"bookmark\" title=\"Burberry Brings London to LA, Including the Grenadier Guards\">Burberry Brings London to LA, Including the Grenadier Guards<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-mcdonell-kanye-west-highlights-difficulties-for-celebrities\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"McDonell Kanye West highlights difficulties for celebrities\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"McDonell Kanye West highlights difficulties for celebrities\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/15-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-vogue\/\" class=\"td-post-category\">Vogue<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-mcdonell-kanye-west-highlights-difficulties-for-celebrities\/\" rel=\"bookmark\" title=\"McDonell Kanye West highlights difficulties for celebrities\">McDonell Kanye West highlights difficulties for celebrities<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-the-10-biggest-stories-in-fashion-this-week\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"The 10 Biggest Stories In Fashion This Week\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"The 10 Biggest Stories In Fashion This Week\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/16-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-fashion\/tagdiv-vogue\/\" class=\"td-post-category\">Vogue<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-the-10-biggest-stories-in-fashion-this-week\/\" rel=\"bookmark\" title=\"The 10 Biggest Stories In Fashion This Week\">The 10 Biggest Stories In Fashion This Week<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_2_5c76770ac7c4c",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));</script>
                                                                <div class=td_mega_menu_sub_cats>
                                                                    <div class=block-mega-child-cats>
                                                                        <a
                                                                            class="cur-sub-cat mega-menu-sub-cat-td_uid_2_5c76770ac7c4c"
                                                                            id=td_uid_3_5c76770ac8225
                                                                            data-td_block_id=td_uid_2_5c76770ac7c4c
                                                                            data-td_filter_value=""
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/">Все</a>
                                                                        <a
                                                                            class=mega-menu-sub-cat-td_uid_2_5c76770ac7c4c
                                                                            id=td_uid_4_5c76770ac8283
                                                                            data-td_block_id=td_uid_2_5c76770ac7c4c
                                                                            data-td_filter_value=8
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-new-look-2015/">Чат-боты
                                                                            </a>
                                                                        <a
                                                                            class=mega-menu-sub-cat-td_uid_2_5c76770ac7c4c
                                                                            id=td_uid_5_5c76770ac82e1
                                                                            data-td_block_id=td_uid_2_5c76770ac7c4c
                                                                            data-td_filter_value=7
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-street-fashion/">Туннели продаж
                                                                            </a>
                                                                        <a
                                                                            class=mega-menu-sub-cat-td_uid_2_5c76770ac7c4c
                                                                            id=td_uid_6_5c76770ac8339
                                                                            data-td_block_id=td_uid_2_5c76770ac7c4c
                                                                            data-td_filter_value=10
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-style-hunter/">Искуственный интеллект
                                                                            </a>
                                                                        <a
                                                                            class=mega-menu-sub-cat-td_uid_2_5c76770ac7c4c
                                                                            id=td_uid_7_5c76770ac838f
                                                                            data-td_block_id=td_uid_2_5c76770ac7c4c
                                                                            data-td_filter_value=9
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-vogue/">Роботы</a>
                                                                    </div>
                                                                </div>
                                                                <div id=td_uid_2_5c76770ac7c4c class=td_block_inner>
                                                                    <div class=td-mega-row>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb>
                                                                                        <a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-kerala-india-they-call-it-own-country-for-nothing/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Kerala, India: They call it Own Country for nothing"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Kerala, India: They call it Own Country for nothing"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/1-218x150.jpg"
                                                                                                width=218 height=150/></a>
                                                                                    </div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/"
                                                                                       class=td-post-category>Fashion</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-kerala-india-they-call-it-own-country-for-nothing/"
                                                                                           rel=bookmark
                                                                                           title="Kerala, India: They call it Own Country for nothing">Kerala,
                                                                                            India: They call it Own Country
                                                                                            for nothing</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-designer-fashion-show-kicks-off-variety-week/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Designer fashion show kicks off Variety Week"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Designer fashion show kicks off Variety Week"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/12-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-new-look-2015/"
                                                                                       class=td-post-category>New look
                                                                                        2018</a></div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-designer-fashion-show-kicks-off-variety-week/"
                                                                                           rel=bookmark
                                                                                           title="Designer fashion show kicks off Variety Week">Designer
                                                                                            fashion show kicks off Variety
                                                                                            Week</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-springfest-one-fashion-show-at-the-university-of-michigan/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="SpringFest One Fashion Show at the University of Michigan"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="SpringFest One Fashion Show at the University of Michigan"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/9-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-new-look-2015/"
                                                                                       class=td-post-category>New look
                                                                                        2018</a></div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-springfest-one-fashion-show-at-the-university-of-michigan/"
                                                                                           rel=bookmark
                                                                                           title="SpringFest One Fashion Show at the University of Michigan">SpringFest
                                                                                            One Fashion Show at the
                                                                                            University of Michigan</a></h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/fashion-photography-helps-raising-funds/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="15 Grooming Techniques Every Man Needs to Know"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="15 Grooming Techniques Every Man Needs to Know"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/03/grid44-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-style-hunter/"
                                                                                       class=td-post-category>Style
                                                                                        hunter</a></div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/fashion-photography-helps-raising-funds/"
                                                                                           rel=bookmark
                                                                                           title="15 Grooming Techniques Every Man Needs to Know">15
                                                                                            Grooming Techniques Every Man
                                                                                            Needs to Know</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=td-next-prev-wrap>
                                                                    <a href="#" class="td-ajax-prev-page ajax-page-disabled"  id=prev-page-td_uid_2_5c76770ac7c4c data-td_block_id=td_uid_2_5c76770ac7c4c>
                                                                        <i class="td-icon-font td-icon-menu-left"></i>
                                                                    </a>
                                                                    <a href="#" class=td-ajax-next-page id=next-page-td_uid_2_5c76770ac7c4c data-td_block_id=td_uid_2_5c76770ac7c4c>
                                                                        <i class="td-icon-font td-icon-menu-right"></i>
                                                                    </a>
                                                                </div>
                                                                <div class=clearfix></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-mega-menu menu-item-293">
                                            <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-gadgets/">Гаджеты</a>
                                            <ul class=sub-menu>
                                                <li class=menu-item-0>
                                                    <div class=td-container-border>
                                                        <div class=td-mega-grid>
                                                            <div class="td_block_wrap td_block_mega_menu td_uid_8_5c76770acc590_rand td-no-subcats td_with_ajax_pagination td-pb-border-top td_block_template_1 td_ajax_preloading_preload"
                                                                 data-td-block-uid=td_uid_8_5c76770acc590>
                                                                <script>var block_td_uid_8_5c76770acc590 = new tdBlock();
                                                                    block_td_uid_8_5c76770acc590.id = "td_uid_8_5c76770acc590";
                                                                    block_td_uid_8_5c76770acc590.atts = '{"limit":"5","td_column_number":3,"ajax_pagination":"next_prev","category_id":"13","show_child_cat":30,"td_ajax_filter_type":"td_category_ids_filter","td_ajax_preloading":"preload","block_template_id":"","header_color":"","ajax_pagination_infinite_stop":"","offset":"","td_filter_default_txt":"","td_ajax_filter_ids":"","el_class":"","color_preset":"","border_top":"","css":"","tdc_css":"","class":"td_uid_8_5c76770acc590_rand","tdc_css_class":"td_uid_8_5c76770acc590_rand","tdc_css_class_style":"td_uid_8_5c76770acc590_rand_style"}';
                                                                    block_td_uid_8_5c76770acc590.td_column_number = "3";
                                                                    block_td_uid_8_5c76770acc590.block_type = "td_block_mega_menu";
                                                                    block_td_uid_8_5c76770acc590.post_count = "5";
                                                                    block_td_uid_8_5c76770acc590.found_posts = "15";
                                                                    block_td_uid_8_5c76770acc590.header_color = "";
                                                                    block_td_uid_8_5c76770acc590.ajax_pagination_infinite_stop = "";
                                                                    block_td_uid_8_5c76770acc590.max_num_pages = "3";
                                                                    tdBlocksArray.push(block_td_uid_8_5c76770acc590);</script>
                                                                <div id=td_uid_8_5c76770acc590 class=td_block_inner>
                                                                    <div class=td-mega-row>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-microsoft-subsumes-open-tech-unit-back-inside-mothership/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Microsoft Subsumes Open Tech Unit Back Inside Mothership"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Microsoft Subsumes Open Tech Unit Back Inside Mothership"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/tee-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                       class=td-post-category>Gadgets</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-microsoft-subsumes-open-tech-unit-back-inside-mothership/"
                                                                                           rel=bookmark
                                                                                           title="Microsoft Subsumes Open Tech Unit Back Inside Mothership">Microsoft
                                                                                            Subsumes Open Tech Unit Back
                                                                                            Inside Mothership</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-lenovo-details-new-computers-that-could-be-heading-our-way-in-2015/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Lenovo details new computers that could be heading our way in 2015"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Lenovo details new computers that could be heading our way in 2015"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/lenovo-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                       class=td-post-category>Gadgets</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-lenovo-details-new-computers-that-could-be-heading-our-way-in-2015/"
                                                                                           rel=bookmark
                                                                                           title="Lenovo details new computers that could be heading our way in 2015">Lenovo
                                                                                            details new computers that could
                                                                                            be heading our way in&#8230;</a>
                                                                                    </h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-sony-adds-4k-to-its-action-camera-line-up-projector-to-a-camcorder-in-2015/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Sony adds 4K to its action camera line-up, projector to a camcorder in 2015"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Sony adds 4K to its action camera line-up, projector to a camcorder in 2015"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/35-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                       class=td-post-category>Gadgets</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-sony-adds-4k-to-its-action-camera-line-up-projector-to-a-camcorder-in-2015/"
                                                                                           rel=bookmark
                                                                                           title="Sony adds 4K to its action camera line-up, projector to a camcorder in 2015">Sony
                                                                                            adds 4K to its action camera
                                                                                            line-up, projector to
                                                                                            a&#8230;</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-htc-launches-another-selfie-phone-with-an-ultrapixel-camera-up-front/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="HTC launches another selfie-phone with an UltraPixel camera up front"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="HTC launches another selfie-phone with an UltraPixel camera up front"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/36-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                       class=td-post-category>Gadgets</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-htc-launches-another-selfie-phone-with-an-ultrapixel-camera-up-front/"
                                                                                           rel=bookmark
                                                                                           title="HTC launches another selfie-phone with an UltraPixel camera up front">HTC
                                                                                            launches another selfie-phone
                                                                                            with an UltraPixel camera up
                                                                                            front</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-ferrari-the-latest-1035bhp-monster-is-too-powerful-for-the-road/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Ferrari the latest 1035bhp monster is too powerful for the road"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Ferrari the latest 1035bhp monster is too powerful for the road"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/33-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                       class=td-post-category>Gadgets</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-ferrari-the-latest-1035bhp-monster-is-too-powerful-for-the-road/"
                                                                                           rel=bookmark
                                                                                           title="Ferrari the latest 1035bhp monster is too powerful for the road">Ferrari
                                                                                            the latest 1035bhp monster is
                                                                                            too powerful for the road</a>
                                                                                    </h3></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=td-next-prev-wrap><a href="#"
                                                                                                class="td-ajax-prev-page ajax-page-disabled"
                                                                                                id=prev-page-td_uid_8_5c76770acc590
                                                                                                data-td_block_id=td_uid_8_5c76770acc590><i
                                                                            class="td-icon-font td-icon-menu-left"></i></a><a
                                                                        href="#" class=td-ajax-next-page
                                                                        id=next-page-td_uid_8_5c76770acc590
                                                                        data-td_block_id=td_uid_8_5c76770acc590><i
                                                                            class="td-icon-font td-icon-menu-right"></i></a>
                                                                </div>
                                                                <div class=clearfix></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-mega-menu menu-item-308">
                                            <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/">Lifestyle</a>
                                            <ul class=sub-menu>
                                                <li class=menu-item-0>
                                                    <div class=td-container-border>
                                                        <div class=td-mega-grid>
                                                            <div class="td_block_wrap td_block_mega_menu td_uid_9_5c76770acd4f8_rand td_with_ajax_pagination td-pb-border-top td_block_template_1 td_ajax_preloading_preload"
                                                                 data-td-block-uid=td_uid_9_5c76770acd4f8>
                                                                <script>var block_td_uid_9_5c76770acd4f8 = new tdBlock();
                                                                    block_td_uid_9_5c76770acd4f8.id = "td_uid_9_5c76770acd4f8";
                                                                    block_td_uid_9_5c76770acd4f8.atts = '{"limit":4,"td_column_number":3,"ajax_pagination":"next_prev","category_id":"16","show_child_cat":30,"td_ajax_filter_type":"td_category_ids_filter","td_ajax_preloading":"preload","block_template_id":"","header_color":"","ajax_pagination_infinite_stop":"","offset":"","td_filter_default_txt":"","td_ajax_filter_ids":"","el_class":"","color_preset":"","border_top":"","css":"","tdc_css":"","class":"td_uid_9_5c76770acd4f8_rand","tdc_css_class":"td_uid_9_5c76770acd4f8_rand","tdc_css_class_style":"td_uid_9_5c76770acd4f8_rand_style"}';
                                                                    block_td_uid_9_5c76770acd4f8.td_column_number = "3";
                                                                    block_td_uid_9_5c76770acd4f8.block_type = "td_block_mega_menu";
                                                                    block_td_uid_9_5c76770acd4f8.post_count = "4";
                                                                    block_td_uid_9_5c76770acd4f8.found_posts = "32";
                                                                    block_td_uid_9_5c76770acd4f8.header_color = "";
                                                                    block_td_uid_9_5c76770acd4f8.ajax_pagination_infinite_stop = "";
                                                                    block_td_uid_9_5c76770acd4f8.max_num_pages = "8";
                                                                    tdBlocksArray.push(block_td_uid_9_5c76770acd4f8);</script>
                                                                <script>var tmpObj = JSON.parse(JSON.stringify(block_td_uid_9_5c76770acd4f8));
                                                                    tmpObj.is_ajax_running = true;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"WordPress News Magazine Charts the Most Fashionable New York Women in 2018\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"WordPress News Magazine Charts the Most Fashionable New York Women in 2018\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/03\/grid1-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-health-fitness\/\" class=\"td-post-category\">Health &amp; Fitness<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016\/\" rel=\"bookmark\" title=\"WordPress News Magazine Charts the Most Fashionable New York Women in 2018\">WordPress News Magazine Charts the Most Fashionable New York Women in...<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/the-most-anticipated-charter-flights-in-the-canary-islands\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"The Most Anticipated Hotel Openings in Strasbourg this Summer\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"The Most Anticipated Hotel Openings in Strasbourg this Summer\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/03\/grid2-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-travel\/\" class=\"td-post-category\">Travel<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/the-most-anticipated-charter-flights-in-the-canary-islands\/\" rel=\"bookmark\" title=\"The Most Anticipated Hotel Openings in Strasbourg this Summer\">The Most Anticipated Hotel Openings in Strasbourg this Summer<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/whitewater-rafting-day-trip-new-york-east\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Haunts of the Heart: Landscapes of Lynn Zimmerman\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Haunts of the Heart: Landscapes of Lynn Zimmerman\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/green1-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-business\/\" class=\"td-post-category\">Business<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/whitewater-rafting-day-trip-new-york-east\/\" rel=\"bookmark\" title=\"Haunts of the Heart: Landscapes of Lynn Zimmerman\">Haunts of the Heart: Landscapes of Lynn Zimmerman<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-five-things-you-may-have-missed-over-the-weekend-from-the-world-of-business\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Dream Homes: North Penthouse Listed For $1.7 Million\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Dream Homes: North Penthouse Listed For $1.7 Million\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/green2-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-business\/\" class=\"td-post-category\">Business<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-five-things-you-may-have-missed-over-the-weekend-from-the-world-of-business\/\" rel=\"bookmark\" title=\"Dream Homes: North Penthouse Listed For $1.7 Million\">Dream Homes: North Penthouse Listed For $1.7 Million<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_9_5c76770acd4f8",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));
                                                                    tmpObj = JSON.parse(JSON.stringify(block_td_uid_9_5c76770acd4f8));
                                                                    tmpObj.is_ajax_running = true;
                                                                    tmpObj.td_current_page = 1;
                                                                    tmpObj.td_filter_value = 20;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/whitewater-rafting-day-trip-new-york-east\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Haunts of the Heart: Landscapes of Lynn Zimmerman\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Haunts of the Heart: Landscapes of Lynn Zimmerman\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/green1-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-business\/\" class=\"td-post-category\">Business<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/whitewater-rafting-day-trip-new-york-east\/\" rel=\"bookmark\" title=\"Haunts of the Heart: Landscapes of Lynn Zimmerman\">Haunts of the Heart: Landscapes of Lynn Zimmerman<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-five-things-you-may-have-missed-over-the-weekend-from-the-world-of-business\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Dream Homes: North Penthouse Listed For $1.7 Million\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Dream Homes: North Penthouse Listed For $1.7 Million\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/green2-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-business\/\" class=\"td-post-category\">Business<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-five-things-you-may-have-missed-over-the-weekend-from-the-world-of-business\/\" rel=\"bookmark\" title=\"Dream Homes: North Penthouse Listed For $1.7 Million\">Dream Homes: North Penthouse Listed For $1.7 Million<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-400k-for-whisky-most-expensive-foods-and-drink-auctioned\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"10 Foods You Have Been Eating Wrong All Your Life\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"10 Foods You Have Been Eating Wrong All Your Life\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/green4-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-business\/\" class=\"td-post-category\">Business<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-400k-for-whisky-most-expensive-foods-and-drink-auctioned\/\" rel=\"bookmark\" title=\"10 Foods You Have Been Eating Wrong All Your Life\">10 Foods You Have Been Eating Wrong All Your Life<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-seeking-business-cuomo-heads-to-cuba-with-a-new-york-trade-delegation\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Seeking Business, Cuomo Heads to Cuba With a New York Trade Delegation\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Seeking Business, Cuomo Heads to Cuba With a New York Trade Delegation\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/green5-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-business\/\" class=\"td-post-category\">Business<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-seeking-business-cuomo-heads-to-cuba-with-a-new-york-trade-delegation\/\" rel=\"bookmark\" title=\"Seeking Business, Cuomo Heads to Cuba With a New York Trade Delegation\">Seeking Business, Cuomo Heads to Cuba With a New York Trade...<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_9_5c76770acd4f8",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));
                                                                    tmpObj = JSON.parse(JSON.stringify(block_td_uid_9_5c76770acd4f8));
                                                                    tmpObj.is_ajax_running = true;
                                                                    tmpObj.td_current_page = 1;
                                                                    tmpObj.td_filter_value = 19;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"WordPress News Magazine Charts the Most Fashionable New York Women in 2018\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"WordPress News Magazine Charts the Most Fashionable New York Women in 2018\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/03\/grid1-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-health-fitness\/\" class=\"td-post-category\">Health &amp; Fitness<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016\/\" rel=\"bookmark\" title=\"WordPress News Magazine Charts the Most Fashionable New York Women in 2018\">WordPress News Magazine Charts the Most Fashionable New York Women in...<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-food-health-star-ratings-kelloggs-reveals-the-cereal-that-gets-1-5-stars\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Heritage Museums &#038; Gardens to Open with New Landscape\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Heritage Museums &#038; Gardens to Open with New Landscape\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/green6-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-health-fitness\/\" class=\"td-post-category\">Health &amp; Fitness<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-food-health-star-ratings-kelloggs-reveals-the-cereal-that-gets-1-5-stars\/\" rel=\"bookmark\" title=\"Heritage Museums &#038; Gardens to Open with New Landscape\">Heritage Museums &#038; Gardens to Open with New Landscape<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-the-secret-to-living-200-years-just-ask-a-whale\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"The Secret To Living 200 Years? Just Ask A Whale\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"The Secret To Living 200 Years? Just Ask A Whale\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/62-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-health-fitness\/\" class=\"td-post-category\">Health &amp; Fitness<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-the-secret-to-living-200-years-just-ask-a-whale\/\" rel=\"bookmark\" title=\"The Secret To Living 200 Years? Just Ask A Whale\">The Secret To Living 200 Years? Just Ask A Whale<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-the-dangers-of-eating-too-much-restaurant-food\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"The dangers of eating too much restaurant food\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"The dangers of eating too much restaurant food\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/60-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-health-fitness\/\" class=\"td-post-category\">Health &amp; Fitness<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-the-dangers-of-eating-too-much-restaurant-food\/\" rel=\"bookmark\" title=\"The dangers of eating too much restaurant food\">The dangers of eating too much restaurant food<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_9_5c76770acd4f8",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));
                                                                    tmpObj = JSON.parse(JSON.stringify(block_td_uid_9_5c76770acd4f8));
                                                                    tmpObj.is_ajax_running = true;
                                                                    tmpObj.td_current_page = 1;
                                                                    tmpObj.td_filter_value = 18;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-cronuts-cloth-filters-and-coffee-shops-a-taste-of-what-we-like-this-week-at-cook\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Cronuts, cloth filters and coffee shops: a taste of what we like this week at Cook\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Cronuts, cloth filters and coffee shops: a taste of what we like this week at Cook\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/55-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-recipes\/\" class=\"td-post-category\">Recipes<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-cronuts-cloth-filters-and-coffee-shops-a-taste-of-what-we-like-this-week-at-cook\/\" rel=\"bookmark\" title=\"Cronuts, cloth filters and coffee shops: a taste of what we like this week at Cook\">Cronuts, cloth filters and coffee shops: a taste of what we...<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-pasta-with-caramelised-onions-and-yogurt-recipe\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Pasta with caramelised onions and yogurt recipe\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Pasta with caramelised onions and yogurt recipe\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/03\/juice-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-recipes\/\" class=\"td-post-category\">Recipes<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-pasta-with-caramelised-onions-and-yogurt-recipe\/\" rel=\"bookmark\" title=\"Pasta with caramelised onions and yogurt recipe\">Pasta with caramelised onions and yogurt recipe<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-scallop-and-mango-summer-rolls-with-spiced-peanut-dip-recipe\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Scallop and mango summer rolls with spiced peanut dip recipe\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Scallop and mango summer rolls with spiced peanut dip recipe\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/59-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-recipes\/\" class=\"td-post-category\">Recipes<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-scallop-and-mango-summer-rolls-with-spiced-peanut-dip-recipe\/\" rel=\"bookmark\" title=\"Scallop and mango summer rolls with spiced peanut dip recipe\">Scallop and mango summer rolls with spiced peanut dip recipe<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-curry-in-a-hurry-top-ten-kitchen-shortcuts-for-indian-food\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Curry in a hurry: top ten kitchen shortcuts for Indian food\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Curry in a hurry: top ten kitchen shortcuts for Indian food\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/56-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-recipes\/\" class=\"td-post-category\">Recipes<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-curry-in-a-hurry-top-ten-kitchen-shortcuts-for-indian-food\/\" rel=\"bookmark\" title=\"Curry in a hurry: top ten kitchen shortcuts for Indian food\">Curry in a hurry: top ten kitchen shortcuts for Indian food<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_9_5c76770acd4f8",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));
                                                                    tmpObj = JSON.parse(JSON.stringify(block_td_uid_9_5c76770acd4f8));
                                                                    tmpObj.is_ajax_running = true;
                                                                    tmpObj.td_current_page = 1;
                                                                    tmpObj.td_filter_value = 17;
                                                                    var currentBlockObjSignature = JSON.stringify(tmpObj);
                                                                    tdLocalCache.set(currentBlockObjSignature, JSON.stringify({
                                                                        "td_data": "<div class=\"td-mega-row\"><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/the-most-anticipated-charter-flights-in-the-canary-islands\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"The Most Anticipated Hotel Openings in Strasbourg this Summer\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"The Most Anticipated Hotel Openings in Strasbourg this Summer\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/03\/grid2-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-travel\/\" class=\"td-post-category\">Travel<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/the-most-anticipated-charter-flights-in-the-canary-islands\/\" rel=\"bookmark\" title=\"The Most Anticipated Hotel Openings in Strasbourg this Summer\">The Most Anticipated Hotel Openings in Strasbourg this Summer<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/10-landscapes-wont-even-imagined-exist\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Basketball Stars Face Off in Ultimate Playoff Beard Battle\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Basketball Stars Face Off in Ultimate Playoff Beard Battle\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/yellow1-1-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-travel\/\" class=\"td-post-category\">Travel<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/10-landscapes-wont-even-imagined-exist\/\" rel=\"bookmark\" title=\"Basketball Stars Face Off in Ultimate Playoff Beard Battle\">Basketball Stars Face Off in Ultimate Playoff Beard Battle<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-planning-a-winter-holiday-canary-islands-offers-the-best-value-getaway-this-season\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Planning a Winter Holiday? Canary Islands Offers\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Planning a Winter Holiday? Canary Islands Offers\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2017\/02\/yellow5-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-travel\/\" class=\"td-post-category\">Travel<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-planning-a-winter-holiday-canary-islands-offers-the-best-value-getaway-this-season\/\" rel=\"bookmark\" title=\"Planning a Winter Holiday? Canary Islands Offers\">Planning a Winter Holiday? Canary Islands Offers<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><div class=\"td-mega-span\">\r\n        <div class=\"td_module_mega_menu td-animation-stack td_mod_mega_menu\">\r\n            <div class=\"td-module-image\">\r\n                <div class=\"td-module-thumb\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-republic-day-week-top-weekend-getaways-from-delhi-and-mumbai\/\" rel=\"bookmark\" class=\"td-image-wrap\" title=\"Republic Day Week: Top weekend getaways from Delhi and Mumbai\"><img class=\"entry-thumb\" src=\"data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC\"alt=\"\" title=\"Republic Day Week: Top weekend getaways from Delhi and Mumbai\" data-type=\"image_tag\" data-img-url=\"https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/uploads\/2015\/04\/52-218x150.jpg\"  width=\"218\" height=\"150\" \/><\/a><\/div>                <a href=\"https:\/\/demo.tagdiv.com\/newspaper\/category\/tagdiv-lifestyle\/tagdiv-travel\/\" class=\"td-post-category\">Travel<\/a>            <\/div>\r\n\r\n            <div class=\"item-details\">\r\n                <h3 class=\"entry-title td-module-title\"><a href=\"https:\/\/demo.tagdiv.com\/newspaper\/td-post-republic-day-week-top-weekend-getaways-from-delhi-and-mumbai\/\" rel=\"bookmark\" title=\"Republic Day Week: Top weekend getaways from Delhi and Mumbai\">Republic Day Week: Top weekend getaways from Delhi and Mumbai<\/a><\/h3>            <\/div>\r\n        <\/div>\r\n        <\/div><\/div>",
                                                                        "td_block_id": "td_uid_9_5c76770acd4f8",
                                                                        "td_hide_prev": true,
                                                                        "td_hide_next": false
                                                                    }));</script>
                                                                <div class=td_mega_menu_sub_cats>
                                                                    <div class=block-mega-child-cats><a
                                                                            class="cur-sub-cat mega-menu-sub-cat-td_uid_9_5c76770acd4f8"
                                                                            id=td_uid_10_5c76770acdcd4
                                                                            data-td_block_id=td_uid_9_5c76770acd4f8
                                                                            data-td_filter_value=""
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/">Все</a><a
                                                                            class=mega-menu-sub-cat-td_uid_9_5c76770acd4f8
                                                                            id=td_uid_11_5c76770acdd2d
                                                                            data-td_block_id=td_uid_9_5c76770acd4f8
                                                                            data-td_filter_value=20
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-business/">Бизнес</a><a
                                                                            class=mega-menu-sub-cat-td_uid_9_5c76770acd4f8
                                                                            id=td_uid_12_5c76770acdd88
                                                                            data-td_block_id=td_uid_9_5c76770acd4f8
                                                                            data-td_filter_value=19
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-health-fitness/">Здоровье
                                                                            &amp; Фитнес</a><a
                                                                            class=mega-menu-sub-cat-td_uid_9_5c76770acd4f8
                                                                            id=td_uid_13_5c76770acdde0
                                                                            data-td_block_id=td_uid_9_5c76770acd4f8
                                                                            data-td_filter_value=18
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-recipes/">Еда</a><a
                                                                            class=mega-menu-sub-cat-td_uid_9_5c76770acd4f8
                                                                            id=td_uid_14_5c76770acde36
                                                                            data-td_block_id=td_uid_9_5c76770acd4f8
                                                                            data-td_filter_value=17
                                                                            href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-travel/">Путешествия</a>
                                                                    </div>
                                                                </div>
                                                                <div id=td_uid_9_5c76770acd4f8 class=td_block_inner>
                                                                    <div class=td-mega-row>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/03/grid1-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-health-fitness/"
                                                                                       class=td-post-category>Health &amp;
                                                                                        Fitness</a></div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016/"
                                                                                           rel=bookmark
                                                                                           title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018">WordPress
                                                                                            News Magazine Charts the Most
                                                                                            Fashionable New York Women in&#8230;</a>
                                                                                    </h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/the-most-anticipated-charter-flights-in-the-canary-islands/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="The Most Anticipated Hotel Openings in Strasbourg this Summer"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="The Most Anticipated Hotel Openings in Strasbourg this Summer"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/03/grid2-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-travel/"
                                                                                       class=td-post-category>Travel</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/the-most-anticipated-charter-flights-in-the-canary-islands/"
                                                                                           rel=bookmark
                                                                                           title="The Most Anticipated Hotel Openings in Strasbourg this Summer">The
                                                                                            Most Anticipated Hotel Openings
                                                                                            in Strasbourg this Summer</a>
                                                                                    </h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/whitewater-rafting-day-trip-new-york-east/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Haunts of the Heart: Landscapes of Lynn Zimmerman"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Haunts of the Heart: Landscapes of Lynn Zimmerman"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/02/green1-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-business/"
                                                                                       class=td-post-category>Business</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/whitewater-rafting-day-trip-new-york-east/"
                                                                                           rel=bookmark
                                                                                           title="Haunts of the Heart: Landscapes of Lynn Zimmerman">Haunts
                                                                                            of the Heart: Landscapes of Lynn
                                                                                            Zimmerman</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-five-things-you-may-have-missed-over-the-weekend-from-the-world-of-business/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Dream Homes: North Penthouse Listed For $1.7 Million"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Dream Homes: North Penthouse Listed For $1.7 Million"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/02/green2-218x150.jpg"
                                                                                                width=218 height=150/></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-business/"
                                                                                       class=td-post-category>Business</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-five-things-you-may-have-missed-over-the-weekend-from-the-world-of-business/"
                                                                                           rel=bookmark
                                                                                           title="Dream Homes: North Penthouse Listed For $1.7 Million">Dream
                                                                                            Homes: North Penthouse Listed
                                                                                            For $1.7 Million</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=td-next-prev-wrap><a href="#"
                                                                                                class="td-ajax-prev-page ajax-page-disabled"
                                                                                                id=prev-page-td_uid_9_5c76770acd4f8
                                                                                                data-td_block_id=td_uid_9_5c76770acd4f8><i
                                                                            class="td-icon-font td-icon-menu-left"></i></a><a
                                                                        href="#" class=td-ajax-next-page
                                                                        id=next-page-td_uid_9_5c76770acd4f8
                                                                        data-td_block_id=td_uid_9_5c76770acd4f8><i
                                                                            class="td-icon-font td-icon-menu-right"></i></a>
                                                                </div>
                                                                <div class=clearfix></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-mega-menu menu-item-295">
                                            <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-video/">Видео</a>
                                            <ul class=sub-menu>
                                                <li class=menu-item-0>
                                                    <div class=td-container-border>
                                                        <div class=td-mega-grid>
                                                            <div class="td_block_wrap td_block_mega_menu td_uid_15_5c76770ad2677_rand td-no-subcats td_with_ajax_pagination td-pb-border-top td_block_template_1 td_ajax_preloading_preload"
                                                                 data-td-block-uid=td_uid_15_5c76770ad2677>
                                                                <script>var block_td_uid_15_5c76770ad2677 = new tdBlock();
                                                                    block_td_uid_15_5c76770ad2677.id = "td_uid_15_5c76770ad2677";
                                                                    block_td_uid_15_5c76770ad2677.atts = '{"limit":"5","td_column_number":3,"ajax_pagination":"next_prev","category_id":"21","show_child_cat":30,"td_ajax_filter_type":"td_category_ids_filter","td_ajax_preloading":"preload","block_template_id":"","header_color":"","ajax_pagination_infinite_stop":"","offset":"","td_filter_default_txt":"","td_ajax_filter_ids":"","el_class":"","color_preset":"","border_top":"","css":"","tdc_css":"","class":"td_uid_15_5c76770ad2677_rand","tdc_css_class":"td_uid_15_5c76770ad2677_rand","tdc_css_class_style":"td_uid_15_5c76770ad2677_rand_style"}';
                                                                    block_td_uid_15_5c76770ad2677.td_column_number = "3";
                                                                    block_td_uid_15_5c76770ad2677.block_type = "td_block_mega_menu";
                                                                    block_td_uid_15_5c76770ad2677.post_count = "5";
                                                                    block_td_uid_15_5c76770ad2677.found_posts = "10";
                                                                    block_td_uid_15_5c76770ad2677.header_color = "";
                                                                    block_td_uid_15_5c76770ad2677.ajax_pagination_infinite_stop = "";
                                                                    block_td_uid_15_5c76770ad2677.max_num_pages = "2";
                                                                    tdBlocksArray.push(block_td_uid_15_5c76770ad2677);</script>
                                                                <div id=td_uid_15_5c76770ad2677 class=td_block_inner>
                                                                    <div class=td-mega-row>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-after-effects-guru-tracking-and-stabilizing-footage/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="After Effects Guru: Tracking and Stabilizing Footage"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="After Effects Guru: Tracking and Stabilizing Footage"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/maxresdefault9-218x150.jpg"
                                                                                                width=218 height=150/><span
                                                                                                class=td-video-play-ico><img
                                                                                                    width=40 height=40
                                                                                                    class=td-retina
                                                                                                    src="https://demo.tagdiv.com/newspaper/wp-content/themes/011/images/icons/ico-video-large.png"
                                                                                                    alt=video/></span></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-video/"
                                                                                       class=td-post-category>Video</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-after-effects-guru-tracking-and-stabilizing-footage/"
                                                                                           rel=bookmark
                                                                                           title="After Effects Guru: Tracking and Stabilizing Footage">After
                                                                                            Effects Guru: Tracking and
                                                                                            Stabilizing Footage</a></h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-how-to-make-a-perfect-caffe-macchiato-video/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="How to Make a Perfect Caffe Macchiato [video]"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="How to Make a Perfect Caffe Macchiato [video]"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/maxresdefault3-218x150.jpg"
                                                                                                width=218 height=150/><span
                                                                                                class=td-video-play-ico><img
                                                                                                    width=40 height=40
                                                                                                    class=td-retina
                                                                                                    src="https://demo.tagdiv.com/newspaper/wp-content/themes/011/images/icons/ico-video-large.png"
                                                                                                    alt=video/></span></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-music/"
                                                                                       class=td-post-category>Music</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-how-to-make-a-perfect-caffe-macchiato-video/"
                                                                                           rel=bookmark
                                                                                           title="How to Make a Perfect Caffe Macchiato [video]">How
                                                                                            to Make a Perfect Caffe
                                                                                            Macchiato [video]</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-vfx-techniques-creating-a-cg-flag-with-after-effects/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="VFX Techniques: Creating a CG Flag with After Effects"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="VFX Techniques: Creating a CG Flag with After Effects"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/516062670_6401-218x150.jpg"
                                                                                                width=218 height=150/><span
                                                                                                class=td-video-play-ico><img
                                                                                                    width=40 height=40
                                                                                                    class=td-retina
                                                                                                    src="https://demo.tagdiv.com/newspaper/wp-content/themes/011/images/icons/ico-video-large.png"
                                                                                                    alt=video/></span></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-music/"
                                                                                       class=td-post-category>Music</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-vfx-techniques-creating-a-cg-flag-with-after-effects/"
                                                                                           rel=bookmark
                                                                                           title="VFX Techniques: Creating a CG Flag with After Effects">VFX
                                                                                            Techniques: Creating a CG Flag
                                                                                            with After Effects</a></h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-what-happens-when-your-carryon-is-over-the-limit/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="What happens when your carryon is over the limit"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="What happens when your carryon is over the limit"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/SWe_q-218x150.png"
                                                                                                width=218 height=150/><span
                                                                                                class=td-video-play-ico><img
                                                                                                    width=40 height=40
                                                                                                    class=td-retina
                                                                                                    src="https://demo.tagdiv.com/newspaper/wp-content/themes/011/images/icons/ico-video-large.png"
                                                                                                    alt=video/></span></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-music/"
                                                                                       class=td-post-category>Music</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-what-happens-when-your-carryon-is-over-the-limit/"
                                                                                           rel=bookmark
                                                                                           title="What happens when your carryon is over the limit">What
                                                                                            happens when your carryon is
                                                                                            over the limit</a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=td-mega-span>
                                                                            <div class="td_module_mega_menu td-animation-stack td_mod_mega_menu">
                                                                                <div class=td-module-image>
                                                                                    <div class=td-module-thumb><a
                                                                                            href="https://demo.tagdiv.com/newspaper/td-post-lollapalooza-2014-chromeo-interview-with-dave-1-and-p-thugg/"
                                                                                            rel=bookmark class=td-image-wrap
                                                                                            title="Lollapalooza 2014: Chromeo – Interview with Dave 1 and P-Thugg"><img
                                                                                                class=entry-thumb
                                                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANoAAACWAQMAAACCSQSPAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABpJREFUWMPtwQENAAAAwiD7p7bHBwwAAAAg7RD+AAGXD7BoAAAAAElFTkSuQmCC"
                                                                                                alt=""
                                                                                                title="Lollapalooza 2014: Chromeo – Interview with Dave 1 and P-Thugg"
                                                                                                data-type=image_tag
                                                                                                data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2015/04/maxresdefault2-218x150.jpg"
                                                                                                width=218 height=150/><span
                                                                                                class=td-video-play-ico><img
                                                                                                    width=40 height=40
                                                                                                    class=td-retina
                                                                                                    src="https://demo.tagdiv.com/newspaper/wp-content/themes/011/images/icons/ico-video-large.png"
                                                                                                    alt=video/></span></a></div>
                                                                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-music/"
                                                                                       class=td-post-category>Music</a>
                                                                                </div>
                                                                                <div class=item-details>
                                                                                    <h3 class="entry-title td-module-title">
                                                                                        <a href="https://demo.tagdiv.com/newspaper/td-post-lollapalooza-2014-chromeo-interview-with-dave-1-and-p-thugg/"
                                                                                           rel=bookmark
                                                                                           title="Lollapalooza 2014: Chromeo – Interview with Dave 1 and P-Thugg">Lollapalooza
                                                                                            2014: Chromeo – Interview with
                                                                                            Dave 1 and P-Thugg</a></h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=td-next-prev-wrap><a href="#"
                                                                                                class="td-ajax-prev-page ajax-page-disabled"
                                                                                                id=prev-page-td_uid_15_5c76770ad2677
                                                                                                data-td_block_id=td_uid_15_5c76770ad2677><i
                                                                            class="td-icon-font td-icon-menu-left"></i></a><a
                                                                        href="#" class=td-ajax-next-page
                                                                        id=next-page-td_uid_15_5c76770ad2677
                                                                        data-td_block_id=td_uid_15_5c76770ad2677><i
                                                                            class="td-icon-font td-icon-menu-right"></i></a>
                                                                </div>
                                                                <div class=clearfix></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-296">
                                            <a href="#">Обучение</a>
                                            <ul class=sub-menu>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-2888">
                                                    <a target=_blank rel=noreferrer
                                                       href="https://cloud.tagdiv.com/#/load/All">Cloud Library<span
                                                            class=td-menu-badge>NEW</span></a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2893">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Headers">Headers</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2898">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Sections">Sections</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2894">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Blocks">Blocks</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2896">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Homepages">Homepages</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2900">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Single">Single
                                                                templates</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2892">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Category">Category
                                                                templates</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2891">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Author">Author
                                                                templates</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2890">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/404">404 templates</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2899">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Search">Search
                                                                templates</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2897">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Pages">Pages</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2895">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://cloud.tagdiv.com/#/load/Footers">Footers</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-312">
                                                    <a href="#">Premium Features<span class=td-menu-badge>NEW</span></a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2901">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://demo.tagdiv.com/newspaper_gossip/2018/08/24/td-post-the-travel-insurance-catch-that-can-double-your-cover-in-two-months/">Auto
                                                                Loading Articles <span class=td-menu-badge>NEW</span></a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2681">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://tagdiv.com/amp-newspaper-theme/">Google
                                                                AMP<span class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2761">
                                                            <a href="https://demo.tagdiv.com/newspaper_crypto/buttons/">Multipurpose
                                                                Elements<span class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2729">
                                                            <a target=_blank rel=noreferrer
                                                               href="https://tagdiv.com/newspaper-theme-typography-font-styles-blocks-shortcodes/">Responsive
                                                                Typography<span class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2733">
                                                            <a target=_blank
                                                               href="https://demo.tagdiv.com/newspaper_crypto/newsletter/">Newsletter
                                                                Plugin<span class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2755">
                                                            <a target=_blank
                                                               href="https://demo.tagdiv.com/newspaper_crypto/video-background/">Video
                                                                Background<span class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2757">
                                                            <a target=_blank
                                                               href="https://demo.tagdiv.com/newspaper_crypto/paralax/">Parallax<span
                                                                    class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2758">
                                                            <a target=_blank
                                                               href="https://demo.tagdiv.com/newspaper_crypto/fixed-image-background/">Fixed
                                                                Image Background<span class=td-menu-badge>NEW</span></a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2759">
                                                            <a target=_blank
                                                               href="https://demo.tagdiv.com/newspaper_crypto/row-dividers/">Row
                                                                Dividers<span class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2102">
                                                            <a href="https://demo.tagdiv.com/newspaper/mobile-theme/">Mobile
                                                                Theme</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2212">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-header-1/">17
                                                                Block Header Templates</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2076">
                                                            <a href="https://demo.tagdiv.com/newspaper/mobile-menu/">Mobile
                                                                Menu</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1865">
                                                            <a href="https://demo.tagdiv.com/newspaper/social-counter-widget/">Social
                                                                Counter</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1866">
                                                            <a href="https://demo.tagdiv.com/newspaper/instagram-widget/">Instagram
                                                                Widget</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1868">
                                                            <a href="https://demo.tagdiv.com/newspaper/weather-widget/">Weather
                                                                Widget</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2652">
                                                            <a href="https://demo.tagdiv.com/newspaper/pinterest-widget/">Pinterest
                                                                Widget</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1867">
                                                            <a href="https://demo.tagdiv.com/newspaper/exchange-widget/">Exchange
                                                                Widget</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1588">
                                                            <a href="https://demo.tagdiv.com/newspaper/video-playlist/">Video
                                                                Playlist</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1590">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-aston-villa-beat-liverpool-to-join-arsenal-in-the-fa-cup-final/">tagDiv
                                                                Gallery</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-2756">
                                                            <a href="#">More</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2131">
                                                                    <a href="https://demo.tagdiv.com/newspaper/author-box/">Author
                                                                        Box</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2130">
                                                                    <a href="https://demo.tagdiv.com/newspaper/image-box/">Image
                                                                        Box</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1591">
                                                                    <a href="https://demo.tagdiv.com/newspaper/td-post-zeta-architecture-hexagon-is-the-new-circle-in-2016/">Image
                                                                        Lightbox</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-297">
                                                    <a href="#">Category layouts</a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-310">
                                                            <a href="#">Templates</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-796">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-1/">Template
                                                                        Style 1</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-797">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-2/">Template
                                                                        Style 2</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-798">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-3/">Template
                                                                        Style 3</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-799">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-4/">Template
                                                                        Style 4</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-800">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-5/">Template
                                                                        Style 5</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-801">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-6/">Template
                                                                        Style 6</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-802">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-7/">Template
                                                                        Style 7</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-803">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-8/">Template
                                                                        Style 8</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-311">
                                                            <a href="#">Top posts style</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-812">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-1/">Grid
                                                                        1</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-813">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-2/">Grid
                                                                        2</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-814">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-3/">Grid
                                                                        3</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-815">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-4/">Grid
                                                                        4</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-816">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-5/">Grid
                                                                        5</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-817">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-6/">Grid
                                                                        6</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-818">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-7/">Grid
                                                                        7</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-819">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-8/">Grid
                                                                        8</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1721">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-9/">Grid
                                                                        9</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1718">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-10/">Grid
                                                                        10</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1719">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-11/">Grid
                                                                        11</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1720">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-12/">Grid
                                                                        12</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-820">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/no-grid/">No
                                                                        Grid</a></li>
                                                                <li class="td-demo-menuitem-hide menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1731">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/template-style-1/">hidden</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-2312">
                                                            <a href="#">Full top posts style</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2313">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-1/">Grid
                                                                        Full 1</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2315">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-2/">Grid
                                                                        Full 2</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2316">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-3/">Grid
                                                                        Full 3</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2317">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-4/">Grid
                                                                        Full 4</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2318">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-5/">Grid
                                                                        Full 5</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2319">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-6/">Grid
                                                                        Full 6</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2320">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-7/">Grid
                                                                        Full 7</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2321">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-8/">Grid
                                                                        Full 8</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2322">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-9/">Grid
                                                                        Full 9</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-2314">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/grid-full-10/">Grid
                                                                        Full 10</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-309">
                                                            <a href="#">Module list</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-821">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-1-layout/">Module
                                                                        1</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-822">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-2-layout/">Module
                                                                        2</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-823">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-3-layout/">Module
                                                                        3</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-824">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-4-layout/">Module
                                                                        4</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-825">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-5-layout/">Module
                                                                        5</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-826">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-6-layout/">Module
                                                                        6</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-827">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-7-layout/">Module
                                                                        7</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-828">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-8-layout/">Module
                                                                        8</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-829">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-9-layout/">Module
                                                                        9</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-830">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-10-layout/">Module
                                                                        10</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-831">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-11-layout/">Module
                                                                        11</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-832">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-12-layout/">Module
                                                                        12</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-833">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-13-layout/">Module
                                                                        13</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-834">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-14-layout/">Module
                                                                        14</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-835">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-15-layout/">Module
                                                                        15</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-836">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-16-layout/">Module
                                                                        16</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1727">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-17-layout/">Module
                                                                        17</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1728">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-18-layout/">Module
                                                                        18</a></li>
                                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1729">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-19-layout/">Module
                                                                        19</a></li>
                                                                <li class="td-demo-menuitem-hide menu-item menu-item-type-taxonomy menu-item-object-category td-menu-item td-normal-menu menu-item-1730">
                                                                    <a href="https://demo.tagdiv.com/newspaper/category/module-19-layout/">hidden</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-298">
                                                    <a href="#">Post templates</a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-973">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-more-than-120-er-visits-linked-to-synthetic-marijuana-in-nyc-over-past-week/">Default
                                                                Style</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-974">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-400k-for-whisky-most-expensive-foods-and-drink-auctioned/">Style
                                                                1</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-975">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-patricia-urquiola-coats-transparent-furniture-for-glas-italia-with-an-iridescent-sheen/">Style
                                                                2</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-976">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-if-you-only-knew-how-much-your-relative-churn-rate-matters/">Style
                                                                3</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1943">
                                                            <a href="https://demo.tagdiv.com/newspaper/15-grooming-techniques-every-man-needs-to-know/">Style
                                                                4</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-979">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-mcdonell-kanye-west-highlights-difficulties-for-celebrities/">Style
                                                                5</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-981">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-the-new-screen-savers-the-show-that-launched-video-into-the-stratosphere/">Style
                                                                6</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-982">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-lenovo-details-new-computers-that-could-be-heading-our-way-in-2015/">Style
                                                                7</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-985">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-2015-awards-all-of-the-best-and-worst-moments-from-the-show/">Style
                                                                8</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-986">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-major-deep-feelings-january-2015-deep-house-mix/">Style
                                                                9</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-987">
                                                            <a href="https://demo.tagdiv.com/newspaper/louge-music-reasons-why-in-form-leicester-city-will-finish/">Style
                                                                10</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-988">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-how-to-make-a-perfect-caffe-macchiato-video/">Style
                                                                11</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1736">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-blake-griffin-posterizes-aron-baynes-twice-in-clippers-spurs-game/">Style
                                                                12</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1735">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-man-agrees-to-complete-50000-hereford-inlet-lighthouse-paint-job/">Style
                                                                13</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-299">
                                                    <a href="#">Smart lists</a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1229">
                                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-1/">Smart
                                                                List – Style 1</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1228">
                                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-2/">Smart
                                                                List – Style 2</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1227">
                                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-3/">Smart
                                                                List – Style 3</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1226">
                                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-4/">Smart
                                                                List – Style 4</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1308">
                                                            <a href="https://demo.tagdiv.com/newspaper/smart-list-style-5/">Smart
                                                                List – Style 5</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1655">
                                                            <a href="https://demo.tagdiv.com/newspaper/whitewater-rafting-day-trip-new-york-east/">Smart
                                                                List &#8211; Style 6</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1654">
                                                            <a href="https://demo.tagdiv.com/newspaper/10-landscapes-wont-even-imagined-exist/">Smart
                                                                List &#8211; Style 7</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1672">
                                                            <a href="https://demo.tagdiv.com/newspaper/apple-ipad-pro-review-powerful-ipad-experience/">Smart
                                                                List &#8211; Style 8</a></li>
                                                    </ul>
                                                </li>
                                                <li class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-300">
                                                    <a href="#">Content blocks <span class=td-menu-badge>NEW</span></a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2728">
                                                            <a href="https://demo.tagdiv.com/newspaper/flex-block/">Flex 1
                                                                <span class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-497">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-1/">Block 1</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-508">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-2/">Block 2</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-511">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-3/">Block 3</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-512">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-4/">Block 4</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-513">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-5/">Block 5</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-514">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-6/">Block 6</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-515">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-7/">Block 7</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-516">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-8/">Block 8</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-517">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-9/">Block 9</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-498">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-10/">Block
                                                                10</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-499">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-11/">Block
                                                                11</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-500">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-12/">Block
                                                                12</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-501">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-13/">Block
                                                                13</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-502">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-14/">Block
                                                                14</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-503">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-15/">Block
                                                                15</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-504">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-16/">Block
                                                                16</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-505">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-17/">Block
                                                                17</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-506">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-18/">Block
                                                                18</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-507">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-19/">Block
                                                                19</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-509">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-20/">Block
                                                                20</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-510">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-21/">Block
                                                                21</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1752">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-22/">Block
                                                                22</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1751">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-23/">Block
                                                                23</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1750">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-24/">Block
                                                                24</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1784">
                                                            <a href="https://demo.tagdiv.com/newspaper/block-25/">Block
                                                                25</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-301">
                                                    <a href="#">Other blocks content</a>
                                                    <ul class=sub-menu>
                                                        <li class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-565">
                                                            <a href="#">12 Big Grids</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-608">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-1/">Big
                                                                        Grid 1</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-609">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-2/">Big
                                                                        Grid 2</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-610">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-3/">Big
                                                                        Grid 3</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-611">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-4/">Big
                                                                        Grid 4</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-612">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-5/">Big
                                                                        Grid 5</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-613">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-6/">Big
                                                                        Grid 6</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-614">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-7/">Big
                                                                        Grid 7</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-615">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-8/">Big
                                                                        Grid 8</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1789">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-9/">Big
                                                                        Grid 9</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1788">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-10/">Big
                                                                        Grid 10</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1787">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-11/">Big
                                                                        Grid 11</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1786">
                                                                    <a href="https://demo.tagdiv.com/newspaper/big-grid-12/">Big
                                                                        Grid 12</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="td-demo-multicolumn-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-2441">
                                                            <a href="#">10 Full Big Grids</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2440">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-1/">Full
                                                                        Grid 1</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2439">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-2/">Full
                                                                        Grid 2</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2438">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-3/">Full
                                                                        Grid 3</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2437">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-4/">Full
                                                                        Grid 4</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2436">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-5/">Full
                                                                        Grid 5</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2435">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-6/">Full
                                                                        Grid 6</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2434">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-7/">Full
                                                                        Grid 7</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2433">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-8/">Full
                                                                        Grid 8</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2432">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-9/">Full
                                                                        Grid 9</a></li>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2431">
                                                                    <a href="https://demo.tagdiv.com/newspaper/full-big-grid-10/">Full
                                                                        Grid 10</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1608">
                                                            <a href="https://demo.tagdiv.com/newspaper/big-grid-slide/">Big
                                                                Grid Slide</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-621">
                                                            <a href="https://demo.tagdiv.com/newspaper/ios-slider/">IOS
                                                                Slider</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-631">
                                                            <a href="https://demo.tagdiv.com/newspaper/news-ticker/">News
                                                                Ticker</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-636">
                                                            <a href="https://demo.tagdiv.com/newspaper/homepage-one-top-post/">Homepage
                                                                Post</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-302">
                                                    <a href="#">Shortcodes</a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-669">
                                                            <a href="https://demo.tagdiv.com/newspaper/blockquotes-pullquotes/">Blockquotes
                                                                &#038; Pullquotes</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-668">
                                                            <a href="https://demo.tagdiv.com/newspaper/grid-columns/">Grid
                                                                Columns</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-667">
                                                            <a href="https://demo.tagdiv.com/newspaper/dropcaps/">Dropcaps</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-665">
                                                            <a href="https://demo.tagdiv.com/newspaper/lists/">Lists</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-2072">
                                                            <a href="https://demo.tagdiv.com/newspaper/typography-formats/">Typography
                                                                Formats</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-664">
                                                            <a href="https://demo.tagdiv.com/newspaper/typology-and-html-elements/">Typology
                                                                and HTML elements</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-303">
                                                    <a href="#">Sidebars</a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1615">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-10-superfoods-that-lower-cholesterol/">Left
                                                                Sidebar</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1612">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-five-things-you-may-have-missed-over-the-weekend-from-the-world-of-business/">No
                                                                Sidebar</a></li>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-post td-menu-item td-normal-menu menu-item-1613">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-microsoft-subsumes-open-tech-unit-back-inside-mothership/">Right
                                                                Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-304">
                                                    <a target=_blank href="https://demo.tagdiv.com/newspaper_tech/shop">WooCommerce</a>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-305">
                                                    <a href="#">Pages <span class=td-menu-badge>NEW</span></a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-2730">
                                                            <a target=_blank
                                                               href="https://demo.tagdiv.com/newspaper_nature/news/">Menu
                                                                Overlay Page<span class=td-menu-badge>NEW</span></a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-683">
                                                            <a href="#">Embeds</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-684">
                                                                    <a href="https://demo.tagdiv.com/newspaper/td-post-vfx-techniques-creating-a-cg-flag-with-after-effects/">Vimeo</a>
                                                                </li>
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-688">
                                                                    <a href="https://demo.tagdiv.com/newspaper/td-post-lollapalooza-2014-chromeo-interview-with-dave-1-and-p-thugg/">Youtube</a>
                                                                </li>
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-691">
                                                                    <a href="https://demo.tagdiv.com/newspaper/td-post-what-happens-when-your-carryon-is-over-the-limit/">Dailymotion</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-692">
                                                            <a href="https://demo.tagdiv.com/newspaper/author/admin/">Author</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-693">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-more-than-120-er-visits-linked-to-synthetic-marijuana-in-nyc-over-past-week/#comments">Comments</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-697">
                                                            <a href="https://demo.tagdiv.com/newspaper/no-page">404</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-698">
                                                            <a href="https://demo.tagdiv.com/newspaper/2017/">Archive</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-699">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-pasta-with-caramelised-onions-and-yogurt-recipe/attachment/57/">Attachment</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-700">
                                                            <a href="https://demo.tagdiv.com/newspaper/?s=food">Search</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-701">
                                                            <a href="https://demo.tagdiv.com/newspaper/tag/wordpress/">Tag</a>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-702">
                                                            <a href="https://demo.tagdiv.com/newspaper/blog/">Blog</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-714">
                                                            <a href="https://demo.tagdiv.com/newspaper/contact/">Contact</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-306">
                                                    <a href="#">Reviews</a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-738">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-intel-claims-new-ssd-750-drives-are-its-fastest-ever-for-desktop/">Points
                                                                Review</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-736">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-why-tech-accelerators-may-soon-be-as-irrelevant-as-an-mba/">Stars
                                                                Review</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-737">
                                                            <a href="https://demo.tagdiv.com/newspaper/td-post-htc-nexus-8-with-64-bit-processor-4gb-of-ram-and-8mp-camera-leaks/">Percent
                                                                Review</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-739">
                                                    <a href="#">Child menu</a>
                                                    <ul class=sub-menu>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-742">
                                                            <a href="#">Sub-child menu</a>
                                                            <ul class=sub-menu>
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-743">
                                                                    <a href="#">Sub-child menu</a></li>
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-744">
                                                                    <a href="#">Sub-child menu</a></li>
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-745">
                                                                    <a href="#">Sub-child menu</a></li>
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-746">
                                                                    <a href="#">Sub-child menu</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-740">
                                                            <a href="#">Sub-child menu</a></li>
                                                        <li class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-741">
                                                            <a href="#">Sub-child menu</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children td-menu-item td-normal-menu menu-item-307">
                                            <a href="#">Мероприятия</a>
                                            <ul class=sub-menu>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1094">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-fashion/">Homepage –
                                                        Fashion</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1112">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-blog/">Homepage –
                                                        Blog</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1109">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-video/">Homepage –
                                                        Video</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1129">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-tech/">Homepage –
                                                        Tech</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1123">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-sport/">Homepage –
                                                        Sport</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1185">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-full-post-featured/">Homepage
                                                        – Full Post Featured</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1140">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-newspaper/">Homepage
                                                        – Newspaper</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1563">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-newsmag/">Homepage –
                                                        Newsmag</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1195">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-magazine/">Homepage
                                                        – Magazine</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1161">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-big-slide/">Homepage
                                                        – Big Slide</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1137">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-infinite-scroll/">Homepage
                                                        – Infinite Scroll</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1158">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-loop/">Homepage –
                                                        Loop</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page td-menu-item td-normal-menu menu-item-1167">
                                                    <a href="https://demo.tagdiv.com/newspaper/homepage-less-images/">Homepage
                                                        – Less Images</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class=header-search-wrap>
                                <div class=td-search-btns-wrap>
                                    <a id=td-header-search-button href="#" role=button class="dropdown-toggle " data-toggle=dropdown>
                                        <i class=td-icon-search></i>
                                    </a>
                                    <a id=td-header-search-button-mob href="#" role=button class="dropdown-toggle " data-toggle=dropdown>
                                        <i class=td-icon-search></i>
                                    </a>
                                </div>
                                <div class=td-drop-down-search aria-labelledby=td-header-search-button>
                                    <form method=get class=td-search-form action="https://demo.tagdiv.com/newspaper/">
                                        <div role=search class=td-head-form-search-wrap>
                                            <input id=td-header-search type=text value="" name=s autocomplete=off >
                                            <input class="wpb_button wpb_btn-inverse btn" type=submit id=td-header-search-top value="Поиск" >
                                        </div>
                                    </form>
                                    <div id=td-aj-search></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <?php echo $content ?>

        <div class="td-footer-wrapper td-container-wrap ">
            <div class=td-container>
                <div class=td-pb-row>
                    <div class=td-pb-span12>
                    </div>
                </div>
                <div class=td-pb-row>
                    <div class=td-pb-span4>
                        <div class="td_block_wrap td_block_7 td_uid_76_5c76770af18f8_rand td-pb-border-top td_block_template_1 td-column-1 td_block_padding"
                             data-td-block-uid=td_uid_76_5c76770af18f8>
                            <script>var block_td_uid_76_5c76770af18f8 = new tdBlock();
                                block_td_uid_76_5c76770af18f8.id = "td_uid_76_5c76770af18f8";
                                block_td_uid_76_5c76770af18f8.atts = '{"custom_title":"EDITOR PICKS","limit":3,"sort":"featured","separator":"","custom_url":"","block_template_id":"","m6_tl":"","post_ids":"","category_id":"","category_ids":"","tag_slug":"","autors_id":"","installed_post_types":"","offset":"","el_class":"","td_ajax_filter_type":"","td_ajax_filter_ids":"","td_filter_default_txt":"All","td_ajax_preloading":"","f_header_font_header":"","f_header_font_title":"Block header","f_header_font_settings":"","f_header_font_family":"","f_header_font_size":"","f_header_font_line_height":"","f_header_font_style":"","f_header_font_weight":"","f_header_font_transform":"","f_header_font_spacing":"","f_header_":"","f_ajax_font_title":"Ajax categories","f_ajax_font_settings":"","f_ajax_font_family":"","f_ajax_font_size":"","f_ajax_font_line_height":"","f_ajax_font_style":"","f_ajax_font_weight":"","f_ajax_font_transform":"","f_ajax_font_spacing":"","f_ajax_":"","f_more_font_title":"Load more button","f_more_font_settings":"","f_more_font_family":"","f_more_font_size":"","f_more_font_line_height":"","f_more_font_style":"","f_more_font_weight":"","f_more_font_transform":"","f_more_font_spacing":"","f_more_":"","m6f_title_font_header":"","m6f_title_font_title":"Article title","m6f_title_font_settings":"","m6f_title_font_family":"","m6f_title_font_size":"","m6f_title_font_line_height":"","m6f_title_font_style":"","m6f_title_font_weight":"","m6f_title_font_transform":"","m6f_title_font_spacing":"","m6f_title_":"","m6f_cat_font_title":"Article category tag","m6f_cat_font_settings":"","m6f_cat_font_family":"","m6f_cat_font_size":"","m6f_cat_font_line_height":"","m6f_cat_font_style":"","m6f_cat_font_weight":"","m6f_cat_font_transform":"","m6f_cat_font_spacing":"","m6f_cat_":"","m6f_meta_font_title":"Article meta info","m6f_meta_font_settings":"","m6f_meta_font_family":"","m6f_meta_font_size":"","m6f_meta_font_line_height":"","m6f_meta_font_style":"","m6f_meta_font_weight":"","m6f_meta_font_transform":"","m6f_meta_font_spacing":"","m6f_meta_":"","ajax_pagination":"","ajax_pagination_infinite_stop":"","css":"","tdc_css":"","td_column_number":1,"header_color":"","color_preset":"","border_top":"","class":"td_uid_76_5c76770af18f8_rand","tdc_css_class":"td_uid_76_5c76770af18f8_rand","tdc_css_class_style":"td_uid_76_5c76770af18f8_rand_style"}';
                                block_td_uid_76_5c76770af18f8.td_column_number = "1";
                                block_td_uid_76_5c76770af18f8.block_type = "td_block_7";
                                block_td_uid_76_5c76770af18f8.post_count = "3";
                                block_td_uid_76_5c76770af18f8.found_posts = "17";
                                block_td_uid_76_5c76770af18f8.header_color = "";
                                block_td_uid_76_5c76770af18f8.ajax_pagination_infinite_stop = "";
                                block_td_uid_76_5c76770af18f8.max_num_pages = "6";
                                tdBlocksArray.push(block_td_uid_76_5c76770af18f8);</script>
                            <div class=td-block-title-wrap><h4 class="block-title td-block-title"><span
                                        class=td-pulldown-size>МЕРОПРИЯТИЯ</span></h4></div>
                            <div id=td_uid_76_5c76770af18f8 class=td_block_inner>
                                <div class=td-block-span12>
                                    <div class="td_module_6 td_module_wrap td-animation-stack">
                                        <div class=td-module-thumb><a
                                                href="https://demo.tagdiv.com/newspaper/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016/"
                                                rel=bookmark class=td-image-wrap
                                                title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018"><img
                                                    class=entry-thumb
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABGAQMAAAAASKMqAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABBJREFUKM9jGAWjYBQMKwAAA9QAAQWBn6cAAAAASUVORK5CYII="
                                                    alt=""
                                                    title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018"
                                                    data-type=image_tag
                                                    data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/03/grid1-100x70.jpg"
                                                    width=100 height=70/></a></div>
                                        <div class=item-details>
                                            <h3 class="entry-title td-module-title"><a
                                                    href="https://demo.tagdiv.com/newspaper/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016/"
                                                    rel=bookmark
                                                    title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018">WordPress
                                                    News Magazine Charts the Most Fashionable New York Women in...</a></h3>
                                            <div class=td-module-meta-info>
                                            <span class=td-post-date><time class="entry-date updated td-module-date"
                                                                           datetime="2017-03-22T05:58:41+00:00">Mar 22, 2017</time></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=td-block-span12>
                                    <div class="td_module_6 td_module_wrap td-animation-stack">
                                        <div class=td-module-thumb><a
                                                href="https://demo.tagdiv.com/newspaper/the-most-anticipated-charter-flights-in-the-canary-islands/"
                                                rel=bookmark class=td-image-wrap
                                                title="The Most Anticipated Hotel Openings in Strasbourg this Summer"><img
                                                    class=entry-thumb
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABGAQMAAAAASKMqAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABBJREFUKM9jGAWjYBQMKwAAA9QAAQWBn6cAAAAASUVORK5CYII="
                                                    alt="" title="The Most Anticipated Hotel Openings in Strasbourg this Summer"
                                                    data-type=image_tag
                                                    data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/03/grid2-100x70.jpg"
                                                    width=100 height=70/></a></div>
                                        <div class=item-details>
                                            <h3 class="entry-title td-module-title"><a
                                                    href="https://demo.tagdiv.com/newspaper/the-most-anticipated-charter-flights-in-the-canary-islands/"
                                                    rel=bookmark
                                                    title="The Most Anticipated Hotel Openings in Strasbourg this Summer">The
                                                    Most Anticipated Hotel Openings in Strasbourg this Summer</a></h3>
                                            <div class=td-module-meta-info>
                                            <span class=td-post-date><time class="entry-date updated td-module-date"
                                                                           datetime="2017-03-22T05:47:36+00:00">Mar 22, 2017</time></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=td-block-span12>
                                    <div class="td_module_6 td_module_wrap td-animation-stack">
                                        <div class=td-module-thumb><a
                                                href="https://demo.tagdiv.com/newspaper/15-grooming-techniques-every-man-needs-to-know/"
                                                rel=bookmark class=td-image-wrap
                                                title="Fashion Photography Helps Raising Funds"><img class=entry-thumb
                                                                                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABGAQMAAAAASKMqAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABBJREFUKM9jGAWjYBQMKwAAA9QAAQWBn6cAAAAASUVORK5CYII="
                                                                                                     alt=""
                                                                                                     title="Fashion Photography Helps Raising Funds"
                                                                                                     data-type=image_tag
                                                                                                     data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/03/grid3-100x70.jpg"
                                                                                                     width=100
                                                                                                     height=70/></a></div>
                                        <div class=item-details>
                                            <h3 class="entry-title td-module-title"><a
                                                    href="https://demo.tagdiv.com/newspaper/15-grooming-techniques-every-man-needs-to-know/"
                                                    rel=bookmark title="Fashion Photography Helps Raising Funds">Fashion
                                                    Photography Helps Raising Funds</a></h3>
                                            <div class=td-module-meta-info>
                                            <span class=td-post-date><time class="entry-date updated td-module-date"
                                                                           datetime="2017-03-22T05:23:51+00:00">Mar 22, 2017</time></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=td-pb-span4>
                        <div class="td_block_wrap td_block_7 td_uid_77_5c76770af2612_rand td-pb-border-top td_block_template_1 td-column-1 td_block_padding"
                             data-td-block-uid=td_uid_77_5c76770af2612>
                            <script>var block_td_uid_77_5c76770af2612 = new tdBlock();
                                block_td_uid_77_5c76770af2612.id = "td_uid_77_5c76770af2612";
                                block_td_uid_77_5c76770af2612.atts = '{"custom_title":"POPULAR POSTS","limit":3,"sort":"popular","separator":"","custom_url":"","block_template_id":"","m6_tl":"","post_ids":"","category_id":"","category_ids":"","tag_slug":"","autors_id":"","installed_post_types":"","offset":"","el_class":"","td_ajax_filter_type":"","td_ajax_filter_ids":"","td_filter_default_txt":"All","td_ajax_preloading":"","f_header_font_header":"","f_header_font_title":"Block header","f_header_font_settings":"","f_header_font_family":"","f_header_font_size":"","f_header_font_line_height":"","f_header_font_style":"","f_header_font_weight":"","f_header_font_transform":"","f_header_font_spacing":"","f_header_":"","f_ajax_font_title":"Ajax categories","f_ajax_font_settings":"","f_ajax_font_family":"","f_ajax_font_size":"","f_ajax_font_line_height":"","f_ajax_font_style":"","f_ajax_font_weight":"","f_ajax_font_transform":"","f_ajax_font_spacing":"","f_ajax_":"","f_more_font_title":"Load more button","f_more_font_settings":"","f_more_font_family":"","f_more_font_size":"","f_more_font_line_height":"","f_more_font_style":"","f_more_font_weight":"","f_more_font_transform":"","f_more_font_spacing":"","f_more_":"","m6f_title_font_header":"","m6f_title_font_title":"Article title","m6f_title_font_settings":"","m6f_title_font_family":"","m6f_title_font_size":"","m6f_title_font_line_height":"","m6f_title_font_style":"","m6f_title_font_weight":"","m6f_title_font_transform":"","m6f_title_font_spacing":"","m6f_title_":"","m6f_cat_font_title":"Article category tag","m6f_cat_font_settings":"","m6f_cat_font_family":"","m6f_cat_font_size":"","m6f_cat_font_line_height":"","m6f_cat_font_style":"","m6f_cat_font_weight":"","m6f_cat_font_transform":"","m6f_cat_font_spacing":"","m6f_cat_":"","m6f_meta_font_title":"Article meta info","m6f_meta_font_settings":"","m6f_meta_font_family":"","m6f_meta_font_size":"","m6f_meta_font_line_height":"","m6f_meta_font_style":"","m6f_meta_font_weight":"","m6f_meta_font_transform":"","m6f_meta_font_spacing":"","m6f_meta_":"","ajax_pagination":"","ajax_pagination_infinite_stop":"","css":"","tdc_css":"","td_column_number":1,"header_color":"","color_preset":"","border_top":"","class":"td_uid_77_5c76770af2612_rand","tdc_css_class":"td_uid_77_5c76770af2612_rand","tdc_css_class_style":"td_uid_77_5c76770af2612_rand_style"}';
                                block_td_uid_77_5c76770af2612.td_column_number = "1";
                                block_td_uid_77_5c76770af2612.block_type = "td_block_7";
                                block_td_uid_77_5c76770af2612.post_count = "3";
                                block_td_uid_77_5c76770af2612.found_posts = "161";
                                block_td_uid_77_5c76770af2612.header_color = "";
                                block_td_uid_77_5c76770af2612.ajax_pagination_infinite_stop = "";
                                block_td_uid_77_5c76770af2612.max_num_pages = "54";
                                tdBlocksArray.push(block_td_uid_77_5c76770af2612);</script>
                            <div class=td-block-title-wrap><h4 class="block-title td-block-title"><span
                                        class=td-pulldown-size>ПОПУЛЯРНЫЕ СТАТЬИ</span></h4></div>
                            <div id=td_uid_77_5c76770af2612 class=td_block_inner>
                                <div class=td-block-span12>
                                    <div class="td_module_6 td_module_wrap td-animation-stack">
                                        <div class=td-module-thumb><a
                                                href="https://demo.tagdiv.com/newspaper/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016/"
                                                rel=bookmark class=td-image-wrap
                                                title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018"><img
                                                    class=entry-thumb
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABGAQMAAAAASKMqAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABBJREFUKM9jGAWjYBQMKwAAA9QAAQWBn6cAAAAASUVORK5CYII="
                                                    alt=""
                                                    title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018"
                                                    data-type=image_tag
                                                    data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/03/grid1-100x70.jpg"
                                                    width=100 height=70/></a></div>
                                        <div class=item-details>
                                            <h3 class="entry-title td-module-title"><a
                                                    href="https://demo.tagdiv.com/newspaper/wordpress-news-magazine-charts-the-most-fashionable-new-york-couples-in-2016/"
                                                    rel=bookmark
                                                    title="WordPress News Magazine Charts the Most Fashionable New York Women in 2018">WordPress
                                                    News Magazine Charts the Most Fashionable New York Women in...</a></h3>
                                            <div class=td-module-meta-info>
                                            <span class=td-post-date><time class="entry-date updated td-module-date"
                                                                           datetime="2017-03-22T05:58:41+00:00">Mar 22, 2017</time></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=td-block-span12>
                                    <div class="td_module_6 td_module_wrap td-animation-stack">
                                        <div class=td-module-thumb><a
                                                href="https://demo.tagdiv.com/newspaper/10-landscapes-wont-even-imagined-exist/"
                                                rel=bookmark class=td-image-wrap
                                                title="Basketball Stars Face Off in Ultimate Playoff Beard Battle"><img
                                                    class=entry-thumb
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABGAQMAAAAASKMqAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABBJREFUKM9jGAWjYBQMKwAAA9QAAQWBn6cAAAAASUVORK5CYII="
                                                    alt="" title="Basketball Stars Face Off in Ultimate Playoff Beard Battle"
                                                    data-type=image_tag
                                                    data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/02/yellow1-1-100x70.jpg"
                                                    width=100 height=70/></a></div>
                                        <div class=item-details>
                                            <h3 class="entry-title td-module-title"><a
                                                    href="https://demo.tagdiv.com/newspaper/10-landscapes-wont-even-imagined-exist/"
                                                    rel=bookmark
                                                    title="Basketball Stars Face Off in Ultimate Playoff Beard Battle">Basketball
                                                    Stars Face Off in Ultimate Playoff Beard Battle</a></h3>
                                            <div class=td-module-meta-info>
                                            <span class=td-post-date><time class="entry-date updated td-module-date"
                                                                           datetime="2017-02-26T05:47:34+00:00">Feb 26, 2017</time></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=td-block-span12>
                                    <div class="td_module_6 td_module_wrap td-animation-stack">
                                        <div class=td-module-thumb><a
                                                href="https://demo.tagdiv.com/newspaper/decorating-to-celebrate-the-great-outdoor-space/"
                                                rel=bookmark class=td-image-wrap
                                                title="Tokyo Fashion Week Is Making Itself Great Again"><img
                                                    class=entry-thumb
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABGAQMAAAAASKMqAAAAA1BMVEWurq51dlI4AAAAAXRSTlMmkutdmwAAABBJREFUKM9jGAWjYBQMKwAAA9QAAQWBn6cAAAAASUVORK5CYII="
                                                    alt="" title="Tokyo Fashion Week Is Making Itself Great Again"
                                                    data-type=image_tag
                                                    data-img-url="https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/02/yellow2-100x70.jpg"
                                                    width=100 height=70/></a></div>
                                        <div class=item-details>
                                            <h3 class="entry-title td-module-title"><a
                                                    href="https://demo.tagdiv.com/newspaper/decorating-to-celebrate-the-great-outdoor-space/"
                                                    rel=bookmark title="Tokyo Fashion Week Is Making Itself Great Again">Tokyo
                                                    Fashion Week Is Making Itself Great Again</a></h3>
                                            <div class=td-module-meta-info>
                                            <span class=td-post-date><time class="entry-date updated td-module-date"
                                                                           datetime="2017-02-25T05:46:01+00:00">Feb 25, 2017</time></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=td-pb-span4>
                        <div class="td_block_wrap td_block_popular_categories td_uid_78_5c76770af32b6_rand widget widget_categories td-pb-border-top td_block_template_1"
                             data-td-block-uid=td_uid_78_5c76770af32b6>
                            <div class=td-block-title-wrap><h4 class="block-title td-block-title"><span
                                        class=td-pulldown-size>ПОПУЛЯРНЫЕ КАТЕГОРИИ</span></h4></div>
                            <ul class=td-pb-padding-side>
                                <li>
                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-gadgets/"><span
                                            class=td-cat-name>Gadgets</span><span class=td-cat-no>15</span></a></li>
                                <li><a href="https://demo.tagdiv.com/newspaper/category/tagdiv-design/tagdiv-architecture/"><span
                                            class=td-cat-name>Architecture</span><span class=td-cat-no>15</span></a></li>
                                <li>
                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-new-look-2015/"><span
                                            class=td-cat-name>New look 2018</span><span class=td-cat-no>14</span></a></li>
                                <li>
                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-reviews/"><span
                                            class=td-cat-name>Reviews</span><span class=td-cat-no>14</span></a></li>
                                <li>
                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-technology/tagdiv-mobile-and-phones/"><span
                                            class=td-cat-name>Mobile and Phones</span><span class=td-cat-no>14</span></a>
                                </li>
                                <li>
                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-lifestyle/tagdiv-recipes/"><span
                                            class=td-cat-name>Recipes</span><span class=td-cat-no>14</span></a></li>
                                <li>
                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-design/tagdiv-decorating/"><span
                                            class=td-cat-name>Decorating</span><span class=td-cat-no>14</span></a></li>
                                <li>
                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-design/tagdiv-interiors/"><span
                                            class=td-cat-name>Interiors</span><span class=td-cat-no>14</span></a></li>
                                <li>
                                    <a href="https://demo.tagdiv.com/newspaper/category/tagdiv-fashion/tagdiv-street-fashion/"><span
                                            class=td-cat-name>Street fashion</span><span class=td-cat-no>13</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class=td-footer-bottom-full>
                <div class=td-container>
                    <div class=td-pb-row>
                        <div class=td-pb-span3>
                            <aside class=footer-logo-wrap><a href="/">
                                    <img class=td-retina-data src="/themeassets/uploads/2018/08/logo-footer.png"
                                        data-retina="/themeassets/uploads/2018/08/logo-footer@2x.png"
                                        alt="Newspaper WordPress Theme" title="Newspaper WordPress Theme" width=272/></a>
                            </aside>
                        </div>
                        <div class=td-pb-span5>
                            <aside class=footer-text-wrap>
                                <div class=block-title><span>О НАС</span></div>
                                <a href="https://inchats.ru">inchats.ru </a> это интернет издание о технологиях,
                                маркетинге, и бизнесе. Мы предоставляем Вам свежий актуальный контент включающий в себя новости, обзоры, дайджесты и видео
                                из индустрии науки, технологий и новых открытий в бизнесе.
                                <div class=footer-email-wrap>E-mail для связи: <a href="mailto:info@inchats.ru">info@inchats.ru</a>
                                </div>
                            </aside>
                        </div>
                        <div class=td-pb-span4>
                            <aside class="footer-social-wrap td-social-style-2">
                                <div class=block-title><span>FOLLOW US</span></div>
                                <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=Facebook>
                <i class="td-icon-font td-icon-facebook"></i>
                </a>
                </span>
                                                <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=Twitter>
                <i class="td-icon-font td-icon-twitter"></i>
                </a>
                </span>
                                                <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=Vimeo>
                <i class="td-icon-font td-icon-vimeo"></i>
                </a>
                </span>
                                                <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=VKontakte>
                <i class="td-icon-font td-icon-vk"></i>
                </a>
                </span>
                                                <span class=td-social-icon-wrap>
                <a target=_blank href="#" title=Youtube>
                <i class="td-icon-font td-icon-youtube"></i>
                </a>
                </span></aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="td-sub-footer-container td-container-wrap ">
            <div class=td-container>
                <div class=td-pb-row>
                    <div class="td-pb-span td-sub-footer-menu">
                        <div class=menu-footer-menu-container>
                            <ul id=menu-footer-menu class=td-subfooter-menu>

                                <li id=menu-item-17
                                    class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-17">
                                    <a href="<?= \yii\helpers\Url::to('site/privacy');?>">Политика конфиденциальности</a></li>
                                <li id=menu-item-18
                                    class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-18">
                                    <a href="<?= \yii\helpers\Url::to('site/advertise');?>">Реклама</a></li>
                                <li id=menu-item-19
                                    class="menu-item menu-item-type-custom menu-item-object-custom td-menu-item td-normal-menu menu-item-19">
                                    <a href="<?= \yii\helpers\Url::to('site/contact');?>">Свяжитесь с нами</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="td-pb-span td-sub-footer-copy">
                        &copy; Copyright - inchats.ru by <a href="https://infomarketstudio.ru?utm_source=inchats.ru">Infomarket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id=td-theme-settings class="td-live-theme-demos td-theme-settings-small">
        <div class=td-skin-body>
            <div class=td-skin-wrap>
                <div class="td-skin-container td-skin-buy"><a target=_blank rel=noreferrer
                                                              href="http://themeforest.net/item/newspaper/5489609?ref=tagdiv">BUY
                        NEWSPAPER NOW!</a></div>
                <div class="td-skin-container td-skin-header">GET AN AWESOME START!</div>
                <div class="td-skin-container td-skin-desc">With easy <span>ONE CLICK INSTALL</span> and fully customizable
                    options, our demos are the best start you'll ever get!!
                </div>
                <div class="td-skin-container td-skin-content">
                    <div class=td-demos-list>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper/"
                                                         class="td-set-theme-style-link td-popup td-popup-default"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/default.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_black/"
                                                         class="td-set-theme-style-link td-popup td-popup-black"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/black.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_food/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_food"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_food.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_racing/"
                                                         class="td-set-theme-style-link td-popup td-popup-racing"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/racing.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_nomad/"
                                                         class="td-set-theme-style-link td-popup td-popup-nomad"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/nomad.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_decor/"
                                                         class="td-set-theme-style-link td-popup td-popup-decor"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/decor.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_lifestyle/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_lifestyle"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_lifestyle.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_living_mag/"
                                                         class="td-set-theme-style-link td-popup td-popup-living_mag"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/living_mag.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_fast/"
                                                         class="td-set-theme-style-link td-popup td-popup-fast"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/fast.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_crypto/"
                                                         class="td-set-theme-style-link td-popup td-popup-crypto"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/crypto.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_gossip/"
                                                         class="td-set-theme-style-link td-popup td-popup-gossip"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/gossip.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_craft_ideas/"
                                                         class="td-set-theme-style-link td-popup td-popup-craft_ideas"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/craft_ideas.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_classy/"
                                                         class="td-set-theme-style-link td-popup td-popup-classy"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/classy.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_journal/"
                                                         class="td-set-theme-style-link td-popup td-popup-journal"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/journal.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_dentist/"
                                                         class="td-set-theme-style-link td-popup td-popup-dentist"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/dentist.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_gaming/"
                                                         class="td-set-theme-style-link td-popup td-popup-gaming"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/gaming.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_entertainment/"
                                                         class="td-set-theme-style-link td-popup td-popup-entertainment"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/entertainment.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_coffee/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_coffee"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_coffee.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_nature/"
                                                         class="td-set-theme-style-link td-popup td-popup-nature"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/nature.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_wine/"
                                                         class="td-set-theme-style-link td-popup td-popup-wine"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/wine.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_city_news/"
                                                         class="td-set-theme-style-link td-popup td-popup-city_news"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/city_news.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_smart_app/"
                                                         class="td-set-theme-style-link td-popup td-popup-smart_app"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/smart_app.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_lifestyle/"
                                                         class="td-set-theme-style-link td-popup td-popup-lifestyle"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/lifestyle.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_gadgets/"
                                                         class="td-set-theme-style-link td-popup td-popup-gadgets"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/gadgets.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_wildlife/"
                                                         class="td-set-theme-style-link td-popup td-popup-wildlife"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/wildlife.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_business/"
                                                         class="td-set-theme-style-link td-popup td-popup-business"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/business.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_construction/"
                                                         class="td-set-theme-style-link td-popup td-popup-construction"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/construction.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_recipes/"
                                                         class="td-set-theme-style-link td-popup td-popup-recipes"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/recipes.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_week/"
                                                         class="td-set-theme-style-link td-popup td-popup-week"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/week.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_ink/"
                                                         class="td-set-theme-style-link td-popup td-popup-ink"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/ink.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_what/"
                                                         class="td-set-theme-style-link td-popup td-popup-what"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/what.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_book_club/"
                                                         class="td-set-theme-style-link td-popup td-popup-book_club"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/book_club.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_law_firm/"
                                                         class="td-set-theme-style-link td-popup td-popup-law_firm"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/law_firm.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_tech/"
                                                         class="td-set-theme-style-link td-popup td-popup-tech"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/tech.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_spa/"
                                                         class="td-set-theme-style-link td-popup td-popup-spa"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/spa.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_travel/"
                                                         class="td-set-theme-style-link td-popup td-popup-travel"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/travel.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_retro/"
                                                         class="td-set-theme-style-link td-popup td-popup-retro"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/retro.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_architecture/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_architecture"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_architecture.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_fitness/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_fitness"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_fitness.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_magazine/"
                                                         class="td-set-theme-style-link td-popup td-popup-magazine"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/magazine.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_voice/"
                                                         class="td-set-theme-style-link td-popup td-popup-voice"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/voice.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_technology/"
                                                         class="td-set-theme-style-link td-popup td-popup-technology"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/technology.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_art_creek/"
                                                         class="td-set-theme-style-link td-popup td-popup-art_creek"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/art_creek.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_sound_radar/"
                                                         class="td-set-theme-style-link td-popup td-popup-sound_radar"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/sound_radar.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_travel/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_travel"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_travel.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_church/"
                                                         class="td-set-theme-style-link td-popup td-popup-church"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/church.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_beauty/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_beauty"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_beauty.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_restro/"
                                                         class="td-set-theme-style-link td-popup td-popup-restro"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/restro.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_showcase/"
                                                         class="td-set-theme-style-link td-popup td-popup-showcase"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/showcase.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_old_fashioned/"
                                                         class="td-set-theme-style-link td-popup td-popup-old_fashioned"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/old_fashioned.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_photography/"
                                                         class="td-set-theme-style-link td-popup td-popup-photography"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/photography.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_baby/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_baby"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_baby.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_cafe/"
                                                         class="td-set-theme-style-link td-popup td-popup-cafe"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/cafe.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_sport/"
                                                         class="td-set-theme-style-link td-popup td-popup-sport"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/sport.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_local_news/"
                                                         class="td-set-theme-style-link td-popup td-popup-local_news"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/local_news.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_cars/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_cars"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_cars.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_medicine/"
                                                         class="td-set-theme-style-link td-popup td-popup-medicine"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/medicine.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_blog_health/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog_health"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog_health.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_wedding/"
                                                         class="td-set-theme-style-link td-popup td-popup-wedding"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/wedding.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_animals/"
                                                         class="td-set-theme-style-link td-popup td-popup-animals"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/animals.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_politics/"
                                                         class="td-set-theme-style-link td-popup td-popup-politics"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/politics.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_classic_blog/"
                                                         class="td-set-theme-style-link td-popup td-popup-blog"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/blog.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_college/"
                                                         class="td-set-theme-style-link td-popup td-popup-college"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/college.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_cars/"
                                                         class="td-set-theme-style-link td-popup td-popup-cars"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/cars.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_health/"
                                                         class="td-set-theme-style-link td-popup td-popup-health"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/health.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_video/"
                                                         class="td-set-theme-style-link td-popup td-popup-video"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/video.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style><a href="https://demo.tagdiv.com/newspaper_fashion/"
                                                         class="td-set-theme-style-link td-popup td-popup-fashion"
                                                         data-img-url="https://demo.tagdiv.com/newspaper/wp-content/themes/011/demos_popup/large/fashion.jpg"><span></span></a>
                        </div>
                        <div class=td-set-theme-style-empty><a href="#" class="td-popup td-popup-empty1"></a></div>
                        <div class=clearfix></div>
                    </div>
                </div>
                <div class=td-skin-scroll><i class=td-icon-read-down></i></div>
            </div>
        </div>
        <div class=clearfix></div>
        <div class=td-set-hide-show><a href="#" id=td-theme-set-hide></a></div>
        <div class=td-screen-demo data-width-preview=380></div>
    </div>



<?php $this->endContent() ?>