<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */


 frontend\assets\InchatsAsset::register($this);

?>
<?php $this->beginPage() ?>


<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8" lang="<?php echo Yii::$app->language ?>">
<![endif]-->
<!--[if IE 9]>
<html class="ie9" lang="<?php echo Yii::$app->language ?>">
<![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?php echo Yii::$app->language ?>">
<head>


<html lang="<?php echo Yii::$app->language ?>"  prefix="og: http://ogp.me/ns#"> <!--<![endif]-->
<head>
    <title><?php echo Html::encode($this->title) ?></title>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta name="yandex-verification" content="d4da37517c7502f2" />
    <link rel=pingback href="https://demo.tagdiv.com/newspaper/xmlrpc.php"/>
    <link rel=apple-touch-icon-precomposed sizes=76x76
          href="https://demo.tagdiv.com/newspaper/wp-content/uploads/2016/04/ico-76.png"/>
    <link rel=apple-touch-icon-precomposed sizes=120x120
          href="https://demo.tagdiv.com/newspaper/wp-content/uploads/2016/04/ico-120.png"/>
    <link rel=apple-touch-icon-precomposed sizes=152x152
          href="https://demo.tagdiv.com/newspaper/wp-content/uploads/2016/04/ico-152.png"/>
    <link rel=apple-touch-icon-precomposed sizes=114x114
          href="https://demo.tagdiv.com/newspaper/wp-content/uploads/2016/04/ico-114.png"/>
    <link rel=apple-touch-icon-precomposed sizes=144x144
          href="https://demo.tagdiv.com/newspaper/wp-content/uploads/2016/04/ico-144.png"/>
    <meta name=description
          content="Discover the stunning features and widgets packed in the Newspaper WordPress Theme with Newspaper Default Demo website. Experience the best news theme now!"/>
    <link rel=canonical href="https://demo.tagdiv.com/newspaper/"/>
    <meta property=og:locale content=en_US/>
    <meta property=og:type content=website/>
    <meta property=og:title content="Newspaper Demo | The Best News Magazine WordPress Theme"/>
    <meta property=og:description
          content="Discover the stunning features and widgets packed in the Newspaper WordPress Theme with Newspaper Default Demo website. Experience the best news theme now!"/>
    <meta property=og:url content="https://demo.tagdiv.com/newspaper/"/>
    <meta property=og:site_name content="Newspaper 9 Demo"/>
    <meta property=fb:app_id content=1681822448721994/>
    <meta name=twitter:card content=summary/>
    <meta name=twitter:description
          content="Discover the stunning features and widgets packed in the Newspaper WordPress Theme with Newspaper Default Demo website. Experience the best news theme now!"/>
    <meta name=twitter:title content="Newspaper Demo | The Best News Magazine WordPress Theme"/>
    <meta name=twitter:creator content="@tagdivofficial"/>
    <script type='application/ld+json'>
        {"@context":"https:\/\/schema.org","@type":"WebSite","@id":"#website","url":"https:\/\/demo.tagdiv.com\/newspaper\/","name":"Newspaper 9 Demo","potentialAction":{"@type":"SearchAction","target":"https:\/\/demo.tagdiv.com\/newspaper\/?s={search_term_string}","query-input":"required name=search_term_string"}}
    </script>
    <link rel=dns-prefetch href='//fonts.googleapis.com'/>
    <link rel=dns-prefetch href='//s.w.org'/>
    <link rel=alternate type="application/rss+xml" title="Newspaper 9 Demo &raquo; Feed"
          href="https://demo.tagdiv.com/newspaper/feed/"/>
    <link rel=alternate type="application/rss+xml" title="Newspaper 9 Demo &raquo; Comments Feed"
          href="https://demo.tagdiv.com/newspaper/comments/feed/"/>
    <link rel=alternate type="application/rss+xml" title="Newspaper 9 Demo &raquo; Homepage Comments Feed"
          href="https://demo.tagdiv.com/newspaper/homepage/feed/"/>
    <script type="text/javascript">window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/",
            "svgExt": ".svg",
            "source": {"concatemoji": "https:\/\/demo.tagdiv.com\/newspaper\/wp-includes\/js\/wp-emoji-release.min.js?ver=b1a8c55f"}
        };
        !function (a, b, c) {
            function d(a, b) {
                var c = String.fromCharCode;
                l.clearRect(0, 0, k.width, k.height), l.fillText(c.apply(this, a), 0, 0);
                var d = k.toDataURL();
                l.clearRect(0, 0, k.width, k.height), l.fillText(c.apply(this, b), 0, 0);
                var e = k.toDataURL();
                return d === e
            }

            function e(a) {
                var b;
                if (!l || !l.fillText)return !1;
                switch (l.textBaseline = "top", l.font = "600 32px Arial", a) {
                    case"flag":
                        return !(b = d([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819])) && (b = d([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]), !b);
                    case"emoji":
                        return b = d([55358, 56760, 9792, 65039], [55358, 56760, 8203, 9792, 65039]), !b
                }
                return !1
            }

            function f(a) {
                var c = b.createElement("script");
                c.src = a, c.defer = c.type = "text/javascript", b.getElementsByTagName("head")[0].appendChild(c)
            }

            var g, h, i, j, k = b.createElement("canvas"), l = k.getContext && k.getContext("2d");
            for (j = Array("flag", "emoji"), c.supports = {
                everything: !0,
                everythingExceptFlag: !0
            }, i = 0; i < j.length; i++)c.supports[j[i]] = e(j[i]), c.supports.everything = c.supports.everything && c.supports[j[i]], "flag" !== j[i] && (c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && c.supports[j[i]]);
            c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && !c.supports.flag, c.DOMReady = !1, c.readyCallback = function () {
                c.DOMReady = !0
            }, c.supports.everything || (h = function () {
                c.readyCallback()
            }, b.addEventListener ? (b.addEventListener("DOMContentLoaded", h, !1), a.addEventListener("load", h, !1)) : (a.attachEvent("onload", h), b.attachEvent("onreadystatechange", function () {
                "complete" === b.readyState && c.readyCallback()
            })), g = c.source || {}, g.concatemoji ? f(g.concatemoji) : g.wpemoji && g.twemoji && (f(g.twemoji), f(g.wpemoji)))
        }(window, document, window._wpemojiSettings);</script>
    <style type="text/css">img.wp-smiley, img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -.1em !important;
            background: none !important;
            padding: 0 !important
        }</style>
    <link rel=stylesheet id=google-fonts-style-css
          href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400%2C400italic%2C600%2C600italic%2C700%7CRoboto%3A300%2C400%2C400italic%2C500%2C500italic%2C700%2C900'
          type='text/css' media=all/>
    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>


<!--    <script type='text/javascript' src='https://demo.tagdiv.com/newspaper/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>-->
<!--    <script type='text/javascript' src='https://demo.tagdiv.com/newspaper/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>-->

    <link rel='https://api.w.org/' href='https://demo.tagdiv.com/newspaper/wp-json/'/>
    <link rel=EditURI type="application/rsd+xml" title=RSD href="https://demo.tagdiv.com/newspaper/xmlrpc.php?rsd"/>
    <link rel=wlwmanifest type="application/wlwmanifest+xml"
          href="https://demo.tagdiv.com/newspaper/wp-includes/wlwmanifest.xml"/>
    <link rel=shortlink href='https://demo.tagdiv.com/newspaper/'/>
    <link rel=alternate type="application/json+oembed"
          href="https://demo.tagdiv.com/newspaper/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo.tagdiv.com%2Fnewspaper%2F"/>
    <link rel=alternate type="text/xml+oembed"
          href="https://demo.tagdiv.com/newspaper/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo.tagdiv.com%2Fnewspaper%2F&#038;format=xml"/>
    <script>window.tdb_globals = {
            "wpRestNonce": "4e69827986",
            "wpRestUrl": "https:\/\/demo.tagdiv.com\/newspaper\/wp-json\/",
            "permalinkStructure": "\/%postname%\/",
            "isAdminBarShowing": false,
            "origPostEditUrl": null
        };</script>
    <script>window.tdwGlobal = {
            "adminUrl": "https:\/\/demo.tagdiv.com\/newspaper\/wp-admin\/",
            "wpRestNonce": "4e69827986",
            "wpRestUrl": "https:\/\/demo.tagdiv.com\/newspaper\/wp-json\/",
            "permalinkStructure": "\/%postname%\/"
        };</script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <style type="text/css">.recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important
        }</style>
    <script>var td_is_safari = false;
        var td_is_ios = false;
        var td_is_windows_phone = false;
        var ua = navigator.userAgent.toLowerCase();
        var td_is_android = ua.indexOf('android') > -1;
        if (ua.indexOf('safari') != -1) {
            if (ua.indexOf('chrome') > -1) {
            } else {
                td_is_safari = true;
            }
        }
        if (navigator.userAgent.match(/(iPhone|iPod|iPad)/i)) {
            td_is_ios = true;
        }
        if (navigator.userAgent.match(/Windows Phone/i)) {
            td_is_windows_phone = true;
        }
        if (td_is_ios || td_is_safari || td_is_windows_phone || td_is_android) {
            if (top.location != location) {
                top.location.replace('https://demo.tagdiv.com/newspaper/');
            }
        }
        var tdBlocksArray = [];
        function tdBlock() {
            this.id = '';
            this.block_type = 1;
            this.atts = '';
            this.td_column_number = '';
            this.td_current_page = 1;
            this.post_count = 0;
            this.found_posts = 0;
            this.max_num_pages = 0;
            this.td_filter_value = '';
            this.is_ajax_running = false;
            this.td_user_action = '';
            this.header_color = '';
            this.ajax_pagination_infinite_stop = '';
        }
        (function () {
            var htmlTag = document.getElementsByTagName("html")[0];
            if (navigator.userAgent.indexOf("MSIE 10.0") > -1) {
                htmlTag.className += ' ie10';
            }
            if (!!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                htmlTag.className += ' ie11';
            }
            if (navigator.userAgent.indexOf("Edge") > -1) {
                htmlTag.className += ' ieEdge';
            }
            if (/(iPad|iPhone|iPod)/g.test(navigator.userAgent)) {
                htmlTag.className += ' td-md-is-ios';
            }
            var user_agent = navigator.userAgent.toLowerCase();
            if (user_agent.indexOf("android") > -1) {
                htmlTag.className += ' td-md-is-android';
            }
            if (-1 !== navigator.userAgent.indexOf('Mac OS X')) {
                htmlTag.className += ' td-md-is-os-x';
            }
            if (/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())) {
                htmlTag.className += ' td-md-is-chrome';
            }
            if (-1 !== navigator.userAgent.indexOf('Firefox')) {
                htmlTag.className += ' td-md-is-firefox';
            }
            if (-1 !== navigator.userAgent.indexOf('Safari') && -1 === navigator.userAgent.indexOf('Chrome')) {
                htmlTag.className += ' td-md-is-safari';
            }
            if (-1 !== navigator.userAgent.indexOf('IEMobile')) {
                htmlTag.className += ' td-md-is-iemobile';
            }
        })();
        var tdLocalCache = {};
        (function () {
            "use strict";
            tdLocalCache = {
                data: {}, remove: function (resource_id) {
                    delete tdLocalCache.data[resource_id];
                }, exist: function (resource_id) {
                    return tdLocalCache.data.hasOwnProperty(resource_id) && tdLocalCache.data[resource_id] !== null;
                }, get: function (resource_id) {
                    return tdLocalCache.data[resource_id];
                }, set: function (resource_id, cachedData) {
                    tdLocalCache.remove(resource_id);
                    tdLocalCache.data[resource_id] = cachedData;
                }
            };
        })();
        var tds_login_sing_in_widget = "show";
        var td_viewport_interval_list = [{"limitBottom": 767, "sidebarWidth": 228}, {
            "limitBottom": 1018,
            "sidebarWidth": 300
        }, {"limitBottom": 1140, "sidebarWidth": 324}];
        var td_animation_stack_effect = "type0";
        var tds_animation_stack = true;
        var td_animation_stack_specific_selectors = ".entry-thumb, img";
        var td_animation_stack_general_selectors = ".td-animation-stack img, .td-animation-stack .entry-thumb, .post img";
        var td_ajax_url = "https:\/\/demo.tagdiv.com\/newspaper\/wp-admin\/admin-ajax.php?td_theme_name=Newspaper&v=9.5_d89";
        var td_get_template_directory_uri = "https:\/\/demo.tagdiv.com\/newspaper\/wp-content\/themes\/011";
        var tds_snap_menu = "smart_snap_always";
        var tds_logo_on_sticky = "show_header_logo";
        var tds_header_style = "";
        var td_please_wait = "Please wait...";
        var td_email_user_pass_incorrect = "User or password incorrect!";
        var td_email_user_incorrect = "Email or username incorrect!";
        var td_email_incorrect = "Email incorrect!";
        var tds_more_articles_on_post_enable = "";
        var tds_more_articles_on_post_time_to_wait = "";
        var tds_more_articles_on_post_pages_distance_from_top = 0;
        var tds_theme_color_site_wide = "#4db2ec";
        var tds_smart_sidebar = "enabled";
        var tdThemeName = "Newspaper";
        var td_magnific_popup_translation_tPrev = "Previous (Left arrow key)";
        var td_magnific_popup_translation_tNext = "Next (Right arrow key)";
        var td_magnific_popup_translation_tCounter = "%curr% of %total%";
        var td_magnific_popup_translation_ajax_tError = "The content from %url% could not be loaded.";
        var td_magnific_popup_translation_image_tError = "The image #%curr% could not be loaded.";
        var tdDateNamesI18n = {
            "month_names": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            "month_names_short": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            "day_names": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            "day_names_short": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]
        };
        var td_ad_background_click_link = "";
        var td_ad_background_click_target = "";</script>
    <style>.block-title > span,
        .block-title > span > a,
        .block-title > a,
        .block-title > label,
        .widgettitle,
        .widgettitle:after,
        .td-trending-now-title,
        .td-trending-now-wrapper:hover .td-trending-now-title,
        .wpb_tabs li.ui-tabs-active a,
        .wpb_tabs li:hover a,
        .vc_tta-container .vc_tta-color-grey.vc_tta-tabs-position-top.vc_tta-style-classic .vc_tta-tabs-container .vc_tta-tab.vc_active > a,
        .vc_tta-container .vc_tta-color-grey.vc_tta-tabs-position-top.vc_tta-style-classic .vc_tta-tabs-container .vc_tta-tab:hover > a,
        .td_block_template_1 .td-related-title .td-cur-simple-item,
        .woocommerce .product .products h2:not(.woocommerce-loop-product__title),
        .td-subcat-filter .td-subcat-dropdown:hover .td-subcat-more,
        .td-weather-information:before,
        .td-weather-week:before,
        .td_block_exchange .td-exchange-header:before,
        .td-theme-wrap .td_block_template_3 .td-block-title > *,
        .td-theme-wrap .td_block_template_4 .td-block-title > *,
        .td-theme-wrap .td_block_template_7 .td-block-title > *,
        .td-theme-wrap .td_block_template_9 .td-block-title:after,
        .td-theme-wrap .td_block_template_10 .td-block-title::before,
        .td-theme-wrap .td_block_template_11 .td-block-title::before,
        .td-theme-wrap .td_block_template_11 .td-block-title::after,
        .td-theme-wrap .td_block_template_14 .td-block-title,
        .td-theme-wrap .td_block_template_15 .td-block-title:before,
        .td-theme-wrap .td_block_template_17 .td-block-title:before {
            background-color: #222
        }

        .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
            background-color: #222 !important
        }

        .block-title, .td_block_template_1 .td-related-title, .wpb_tabs .wpb_tabs_nav, .vc_tta-container .vc_tta-color-grey.vc_tta-tabs-position-top.vc_tta-style-classic .vc_tta-tabs-container, .woocommerce div.product .woocommerce-tabs ul.tabs:before, .td-theme-wrap .td_block_template_5 .td-block-title > *, .td-theme-wrap .td_block_template_17 .td-block-title, .td-theme-wrap .td_block_template_17 .td-block-title::before {
            border-color: #222
        }

        .td-theme-wrap .td_block_template_4 .td-block-title > *:before, .td-theme-wrap .td_block_template_17 .td-block-title::after {
            border-color: #222 transparent transparent transparent
        }

        .td-theme-wrap .td_block_template_4 .td-related-title .td-cur-simple-item:before {
            border-color: #222 transparent transparent transparent !important
        }

        .td-menu-background:before, .td-search-background:before {
            background: rgba(0, 0, 0, .5);
            background: -moz-linear-gradient(top, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .6) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(0, 0, 0, .5)), color-stop(100%, rgba(0, 0, 0, .6)));
            background: -webkit-linear-gradient(top, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .6) 100%);
            background: -o-linear-gradient(top, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .6) 100%);
            background: -ms-linear-gradient(top, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .6) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .6) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='rgba(0,0,0,0.5)', endColorstr='rgba(0,0,0,0.6)', GradientType=0)
        }

        .td-footer-wrapper, .td-footer-wrapper .td_block_template_7 .td-block-title > *, .td-footer-wrapper .td_block_template_17 .td-block-title, .td-footer-wrapper .td-block-title-wrap .td-wrapper-pulldown-filter {
            background-color: #111
        }

        .td-footer-wrapper::before {
            background-image: url(https://demo.tagdiv.com/newspaper/wp-content/uploads/2017/04/footer-bg2.jpg)
        }

        .td-footer-wrapper::before {
            background-size: cover
        }

        .td-footer-wrapper::before {
            background-position: center center
        }

        .td-footer-wrapper::before {
            opacity: .1
        }

        .td-menu-background, .td-search-background {
            background-image: url(https://demo.tagdiv.com/newspaper/wp-content/uploads/2016/05/mobile-bg.jpg)
        }

        .white-popup-block:before {
            background-image: url(https://demo.tagdiv.com/newspaper/wp-content/uploads/2016/05/login-mod.jpg)
        }</style>
    <script>(function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-43963494-1', 'auto');
        ga('send', 'pageview');</script>
    <script>!function (f, b, e, v, n, t, s) {
            if (f.fbq)return;
            n = f.fbq = function () {
                n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '853851948102692');
        fbq('track', 'PageView');</script>
    <noscript><img height=1 width=1 style=display:none
                   src="https://www.facebook.com/tr?id=853851948102692&ev=PageView&noscript=1"/></noscript>
    <style></style>
    <style id=tdw-css-placeholder></style>
    <link rel=dns-prefetch href="//secure.gravatar.com">
</head>
<body class="home page-template page-template-page-pagebuilder-latest page-template-page-pagebuilder-latest-php page page-id-13 homepage global-block-template-1 td-animation-stack-type0 td-full-layout"
      itemscope=itemscope itemtype="https://schema.org/WebPage">

<?php $this->beginBody() ?>
<?php echo $content ?>
<?php $this->endBody() ?>
<script type='text/javascript'>//<![CDATA[
    var wpcf7 = {
        "apiSettings": {
            "root": "https:\/\/demo.tagdiv.com\/newspaper\/wp-json\/contact-form-7\/v1",
            "namespace": "contact-form-7\/v1"
        }, "recaptcha": {"messages": {"empty": "Please verify that you are not a robot."}}, "cached": "1"
    };
    //]]></script>
<script type='text/javascript' src='/themeassets/plugins/contact-form-7/includes/js/scripts.js'></script>
<script type='text/javascript' src='/themeassets/wp-includes/js/underscore.min.js'></script>
<script type='text/javascript' src='/themeassets/plugins/td-cloud-library/assets/js/js_posts_autoload.min.js'></script>
<script type='text/javascript' src='/themeassets/themes/011/js/tagdiv_theme.min.js'></script>
<script type='text/javascript' src='/themeassets/wp-includes/js/comment-reply.min.js'></script>
<script type='text/javascript' src='/themeassets/plugins/td-cloud-library/assets/js/js_files_for_front.min.js'></script>
<script type='text/javascript' src='/themeassets/wp-includes/js/wp-embed.min.js'></script>
<script>jQuery().ready(function () {
        tdWeather.addItem({
            "block_uid": "td_top_weather_uid",
            "location": "New York",
            "api_location": "New York",
            "api_language": "en",
            "api_key": "c937b98a4e6a49405410bfe0790a0eac",
            "today_icon": "broken-clouds-n",
            "today_icon_text": "overcast clouds",
            "today_temp": [-4.9, 23.1],
            "today_humidity": 45,
            "today_wind_speed": [3.1, 1.9],
            "today_min": [-6.1, 21],
            "today_max": [-3.9, 25],
            "today_clouds": 90,
            "current_unit": 0,
            "forecast": [{
                "timestamp": 1551268800,
                "day_name": "Wed",
                "day_temp": [-2, 28],
                "owm_day_index": 0
            }, {
                "timestamp": 1551312000,
                "day_name": "Thu",
                "day_temp": [2, 35],
                "owm_day_index": 4
            }, {
                "timestamp": 1551398400,
                "day_name": "Fri",
                "day_temp": [3, 38],
                "owm_day_index": 12
            }, {
                "timestamp": 1551484800,
                "day_name": "Sat",
                "day_temp": [7, 44],
                "owm_day_index": 20
            }, {"timestamp": 1551571200, "day_name": "Sun", "day_temp": [5, 42], "owm_day_index": 28}]
        });
    });
    (function () {
        var html_jquery_obj = jQuery('html');
        if (html_jquery_obj.length && (html_jquery_obj.is('.ie8') || html_jquery_obj.is('.ie9'))) {
            var path = 'https://demo.tagdiv.com/newspaper/wp-content/themes/011/style.css';
            jQuery.get(path, function (data) {
                var str_split_separator = '#td_css_split_separator';
                var arr_splits = data.split(str_split_separator);
                var arr_length = arr_splits.length;
                if (arr_length > 1) {
                    var dir_path = 'https://demo.tagdiv.com/newspaper/wp-content/themes/011';
                    var splited_css = '';
                    for (var i = 0; i < arr_length; i++) {
                        if (i > 0) {
                            arr_splits[i] = str_split_separator + ' ' + arr_splits[i];
                        }
                        var formated_str = arr_splits[i].replace(/\surl\(\'(?!data\:)/gi, function regex_function(str) {
                            return ' url(\'' + dir_path + '/' + str.replace(/url\(\'/gi, '').replace(/^\s+|\s+$/gm, '');
                        });
                        splited_css += "<style>" + formated_str + "</style>";
                    }
                    var td_theme_css = jQuery('link#td-theme-css');
                    if (td_theme_css.length) {
                        td_theme_css.after(splited_css);
                    }
                }
            });
        }
    })();</script>
<div id=tdw-css-writer style=display:none class="tdw-drag-dialog tdc-window-sidebar">
    <header>
        <a title=Editor class="tdw-tab tdc-tab-active" href="#" data-tab-content=tdw-tab-editor>Edit with Live CSS</a>
        <div class=tdw-less-info title="This will be red when errors are detected in your CSS and LESS"></div>
    </header>
    <div class=tdw-content>
        <div class="tdw-tabs-content tdw-tab-editor tdc-tab-content-active">
            <script>(function (jQuery, undefined) {
                    jQuery(window).ready(function () {
                        if ('undefined' !== typeof tdcAdminIFrameUI) {
                            var $liveIframe = tdcAdminIFrameUI.getLiveIframe();
                            if ($liveIframe.length) {
                                $liveIframe.on('load', function () {
                                    $liveIframe.contents().find('body').append('<textarea class="tdw-css-writer-editor" style="display: none"></textarea>');
                                });
                            }
                        }
                    });
                })(jQuery);</script>
            <textarea class="tdw-css-writer-editor td_live_css_uid_1_5c76770af3fe5"></textarea>
            <div id=td_live_css_uid_1_5c76770af3fe5 class=td-code-editor></div>
            <script>
                jQuery(window).on('load', function () {
                    if ('undefined' !== typeof tdLiveCssInject) {
                        tdLiveCssInject.init();
                        var editor_textarea = jQuery('.td_live_css_uid_1_5c76770af3fe5');
                        var languageTools = ace.require("ace/ext/language_tools");
                        var tdcCompleter = {
                            getCompletions: function (editor, session, pos, prefix, callback) {
                                if (prefix.length === 0) {
                                    callback(null, []);
                                    return
                                }
                                if ('undefined' !== typeof tdcAdminIFrameUI) {
                                    var data = {error: undefined, getShortcode: ''};
                                    tdcIFrameData.getShortcodeFromData(data);
                                    if (!_.isUndefined(data.error)) {
                                        tdcDebug.log(data.error);
                                    }
                                    if (!_.isUndefined(data.getShortcode)) {
                                        var regex = /el_class=\"([A-Za-z0-9_-]*\s*)+\"/g,
                                            results = data.getShortcode.match(regex);
                                        var elClasses = {};
                                        for (var i = 0; i < results.length; i++) {
                                            var currentClasses = results[i].replace('el_class="', '').replace('"', '').split(' ');
                                            for (var j = 0; j < currentClasses.length; j++) {
                                                if (_.isUndefined(elClasses[currentClasses[j]])) {
                                                    elClasses[currentClasses[j]] = '';
                                                }
                                            }
                                        }
                                        var arrElClasses = [];
                                        for (var prop in elClasses) {
                                            arrElClasses.push(prop);
                                        }
                                        callback(null, arrElClasses.map(function (item) {
                                            return {name: item, value: item, meta: 'in_page'}
                                        }));
                                    }
                                }
                            }
                        };
                        languageTools.addCompleter(tdcCompleter);
                        window.editor = ace.edit("td_live_css_uid_1_5c76770af3fe5");
                        window.editor.$blockScrolling = Infinity;
                        window.editorChangeHandler = function () {
                            window.onbeforeunload = function () {
                                if (tdwState.lessWasEdited) {
                                    return "You have attempted to leave this page. Are you sure?";
                                }
                                return false;
                            };
                            var editorValue = editor.getSession().getValue();
                            editor_textarea.val(editorValue);
                            if ('undefined' !== typeof tdcAdminIFrameUI) {
                                tdcAdminIFrameUI.getLiveIframe().contents().find('.tdw-css-writer-editor:first').val(editorValue);
                                tdcMain.setContentModified();
                            }
                            tdLiveCssInject.less();
                        };
                        editor.getSession().setValue(editor_textarea.val());
                        editor.getSession().on('change', editorChangeHandler);
                        editor.setTheme("ace/theme/textmate");
                        editor.setShowPrintMargin(false);
                        editor.getSession().setMode("ace/mode/less");
                        editor.getSession().setUseWrapMode(true);
                        editor.setOptions({
                            enableBasicAutocompletion: true,
                            enableSnippets: true,
                            enableLiveAutocompletion: false
                        });
                    }
                });</script>
        </div>
    </div>
    <footer>
        <a href="#" class=tdw-save-css>Save</a>
        <div class=tdw-more-info-text>Write CSS OR LESS and hit save. CTRL + SPACE for auto-complete.</div>
        <div class=tdw-resize></div>
    </footer>
</div>
</body>
</html>


<?php $this->endPage() ?>
