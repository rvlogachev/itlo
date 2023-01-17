<?php
use yii\helpers\Html;
use \frontend\assets\CryptoparrotAsset;
/* @var $this \yii\web\View */
/* @var $content string */

CryptoparrotAsset::register($this);
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\CryptoparrotAsset')->baseUrl.'/cryptoparrot';

//\Yii::$app->templateBoomerang->initTheme();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="<?= $bundlePath;?>/wp-content/plugins/td-composer/legacy/Newspaper/assets/images/icons/newspaper-icons.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="<?= $bundlePath;?>/wp-content/themes/011/images/icons/newspaper.woff" as="font" type="font/woff" crossorigin>
    <link rel="stylesheet" media="print" onload="this.onload=null;this.media='all';" id="ao_optimized_gfonts" href="https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C600%2C700%2C300%7CRoboto%3A400%2C500%2C700%2C300&amp;display=swap" />
    <link rel="pingback" href="<?= $bundlePath;?>/xmlrpc.php" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <link rel="canonical" href="/" />
<!--    <link rel="next" href="/cms/view/2/" />-->
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Newspaper Demo | The Best News Magazine WordPress Theme" />
    <meta property="og:description" content="Discover the stunning features and widgets packed in the Newspaper WordPress Theme with Newspaper Default Demo website. Experience the best news theme now!" />
    <meta property="og:url" content="https://cryptoparrot.ru/" />
    <meta property="og:site_name" content="Newspaper Demo | The Best News Magazine WordPress Theme" />
    <meta property="article:modified_time" content="2021-07-02T07:23:15+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="8 minutes" />
    <meta name="robots" content="noindex, nofollow"/>
    <script type="application/ld+json" class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"WebSite","@id":"https://cryptoparrot.ru/#website","url":"https://cryptoparrot.ru/","name":"Newspaper Demo | The Best News Magazine WordPress Theme","description":"Discover the stunning features and widgets packed in the Newspaper WordPress Theme with Newspaper Default Demo website. Experience the best news theme now!","potentialAction":[{"@type":"SearchAction","target":"https://cryptoparrot.ru/?s={search_term_string}","query-input":"required name=search_term_string"}],"inLanguage":"en-US"},{"@type":"WebPage","@id":"https://cryptoparrot.ru/#webpage","url":"https://cryptoparrot.ru/","name":"Newspaper Demo | The Best News Magazine WordPress Theme","isPartOf":{"@id":"https://cryptoparrot.ru/#website"},"datePublished":"2019-08-07T07:37:01+00:00","dateModified":"2021-07-02T07:23:15+00:00","description":"Discover the stunning features and widgets packed in the Newspaper WordPress Theme with Newspaper Default Demo website. Experience the best news theme now!","breadcrumb":{"@id":"https://cryptoparrot.ru/#breadcrumb"},"inLanguage":"en-US","potentialAction":[{"@type":"ReadAction","target":["https://cryptoparrot.ru/"]}]},{"@type":"BreadcrumbList","@id":"https://cryptoparrot.ru/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Home"}]}]}</script>

    <link rel='dns-prefetch' href='//s.w.org' />
    <link href='https://fonts.gstatic.com' crossorigin='anonymous' rel='preconnect' />
    <link rel="alternate" type="application/rss+xml" title="Newspaper Demo | The Best News Magazine WordPress Theme &raquo; Feed" href="https://cryptoparrot.ru/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Newspaper Demo | The Best News Magazine WordPress Theme &raquo; Comments Feed" href="https://cryptoparrot.ru/comments/feed/" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="<?= CryptoparrotAsset::getAssetUrl('favicon.ico'); ?>"  type="image/x-icon" />
    <script type="text/javascript">
      window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/cautoptimize_1368e30074c523a0ddfd50fe85290f63.jsore\/emoji\/13.1.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/demo.tagdiv.com\/newspaper_pro\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.8"}};
      !function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode;p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0);e=i.toDataURL();return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(!p||!p.fillText)return!1;switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([10084,65039,8205,55357,56613],[10084,65039,8203,55357,56613])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(n=t.source||{}).concatemoji?c(n.concatemoji):n.wpemoji&&n.twemoji&&(c(n.twemoji),c(n.wpemoji)))}(window,document,window._wpemojiSettings);
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='td-critical-css' href='<?php echo $bundlePath;?>/wp-content/td_cache/td_analyze/css/256-tda-critical-css-7b48e68a-efbf-edbf-9eef-d8c2b0b73056.css' type='text/css' media='all' />
<!--    <link rel='stylesheet' id='td-critical-css' href='--><?php //echo  $bundlePath;?><!--/wp-content/td_cache/td_analyze/css/1884-tda-critical-css-9b27e222-8b0c-49b9-9cc2-dd413c3811aa.css' type='text/css' media='all' />-->
    <style id='td-critical-inline-css' type='text/css'>
        .td-md-is-ios .tdc-row[class*="stretch_row"] > .td-pb-row > .td-element-style,
        .td-md-is-ios .tdc-row-composer[class*="stretch_row"] > .td-pb-row > .td-element-style {
            width: calc(100vw + 1px) !important;
        }
        @media (max-width: 767px) {
            .td-md-is-ios .td-pb-row > .td-element-style {
                width: calc(100vw + 1px) !important;
            }
        }
        .td-element-style {
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .tdb-logo-text-title,
        .tdb-logo-text-tagline,
        .tdm-title {
            -webkit-background-clip: text;
        }
        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"] {
            -webkit-appearance: button;
        }
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }


    </style>
<!--    <script type='text/javascript' src='<?= $bundlePath;?>/wp-includes/js/jquery/jquery.min.js?ver=3.6.0' id='jquery-core-js'></script>-->
    <link rel="https://api.w.org/" href="<?= $bundlePath;?>/wp-json/" />
    <link rel="alternate" type="application/json" href="<?= $bundlePath;?>/wp-json/wp/v2/pages/256" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?= $bundlePath;?>/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?= $bundlePath;?>/wp-includes/wlwmanifest.xml" />
    <link rel='shortlink' href='/' />
    <link rel="alternate" type="application/json+oembed" href="<?= $bundlePath;?>/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo.tagdiv.com%2Fnewspaper_pro%2F" />
    <link rel="alternate" type="text/xml+oembed" href="<?= $bundlePath;?>/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo.tagdiv.com%2Fnewspaper_pro%2F&#038;format=xml" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <script>
      window.tdb_globals = {"wpRestNonce":"d3fb458db8","wpRestUrl":"https:\/\/demo.tagdiv.com\/newspaper_pro\/wp-json\/","permalinkStructure":"\/%postname%\/","isAjax":false,"isAdminBarShowing":false,"autoloadScrollPercent":20};
    </script>
    <script>
      window.tdwGlobal = {"adminUrl":"https:\/\/demo.tagdiv.com\/newspaper_pro\/wp-admin\/","wpRestNonce":"d3fb458db8","wpRestUrl":"https:\/\/demo.tagdiv.com\/newspaper_pro\/wp-json\/","permalinkStructure":"\/%postname%\/"};
    </script>
    <script>
      window.tdaGlobal = {"adminUrl":"https:\/\/demo.tagdiv.com\/newspaper_pro\/wp-admin\/","wpRestNonce":"d3fb458db8","wpRestUrl":"https:\/\/demo.tagdiv.com\/newspaper_pro\/wp-json\/","permalinkStructure":"\/%postname%\/","postId":256};
    </script>
    <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>

    <script>



      var tdBlocksArray = []; //here we store all the items for the current page

      //td_block class - each ajax block uses a object of this class for requests
      function tdBlock() {
        this.id = '';
        this.block_type = 1; //block type id (1-234 etc)
        this.atts = '';
        this.td_column_number = '';
        this.td_current_page = 1; //
        this.post_count = 0; //from wp
        this.found_posts = 0; //from wp
        this.max_num_pages = 0; //from wp
        this.td_filter_value = ''; //current live filter value
        this.is_ajax_running = false;
        this.td_user_action = ''; // load more or infinite loader (used by the animation)
        this.header_color = '';
        this.ajax_pagination_infinite_stop = ''; //show load more at page x
      }


      // td_js_generator - mini detector
      (function(){
        var htmlTag = document.getElementsByTagName("html")[0];

        if ( navigator.userAgent.indexOf("MSIE 10.0") > -1 ) {
          htmlTag.className += ' ie10';
        }

        if ( !!navigator.userAgent.match(/Trident.*rv\:11\./) ) {
          htmlTag.className += ' ie11';
        }

        if ( navigator.userAgent.indexOf("Edge") > -1 ) {
          htmlTag.className += ' ieEdge';
        }

        if ( /(iPad|iPhone|iPod)/g.test(navigator.userAgent) ) {
          htmlTag.className += ' td-md-is-ios';
        }

        var user_agent = navigator.userAgent.toLowerCase();
        if ( user_agent.indexOf("android") > -1 ) {
          htmlTag.className += ' td-md-is-android';
        }

        if ( -1 !== navigator.userAgent.indexOf('Mac OS X')  ) {
          htmlTag.className += ' td-md-is-os-x';
        }

        if ( /chrom(e|ium)/.test(navigator.userAgent.toLowerCase()) ) {
          htmlTag.className += ' td-md-is-chrome';
        }

        if ( -1 !== navigator.userAgent.indexOf('Firefox') ) {
          htmlTag.className += ' td-md-is-firefox';
        }

        if ( -1 !== navigator.userAgent.indexOf('Safari') && -1 === navigator.userAgent.indexOf('Chrome') ) {
          htmlTag.className += ' td-md-is-safari';
        }

        if( -1 !== navigator.userAgent.indexOf('IEMobile') ){
          htmlTag.className += ' td-md-is-iemobile';
        }

      })();




      var tdLocalCache = {};

      ( function () {
        "use strict";

        tdLocalCache = {
          data: {},
          remove: function (resource_id) {
            delete tdLocalCache.data[resource_id];
          },
          exist: function (resource_id) {
            return tdLocalCache.data.hasOwnProperty(resource_id) && tdLocalCache.data[resource_id] !== null;
          },
          get: function (resource_id) {
            return tdLocalCache.data[resource_id];
          },
          set: function (resource_id, cachedData) {
            tdLocalCache.remove(resource_id);
            tdLocalCache.data[resource_id] = cachedData;
          }
        };
      })();



      var td_viewport_interval_list=[{"limitBottom":767,"sidebarWidth":228},{"limitBottom":1018,"sidebarWidth":300},{"limitBottom":1140,"sidebarWidth":324}];
      var td_animation_stack_effect="type0";
      var tds_animation_stack=true;
      var td_animation_stack_specific_selectors=".entry-thumb, img, .td-lazy-img";
      var td_animation_stack_general_selectors=".td-animation-stack img, .td-animation-stack .entry-thumb, .post img, .td-animation-stack .td-lazy-img";
      var tds_general_modal_image="yes";
      var tds_video_scroll="enabled";
      var tds_video_position_v="bottom";
      var tdc_is_installed="yes";
      var td_ajax_url="http:\/\/cryptoparrot.loc\/user/user/login";
      var td_get_template_directory_uri="https:\/\/demo.tagdiv.com\/newspaper_pro\/wp-content\/plugins\/td-composer\/legacy\/common";
      var tds_snap_menu="";
      var tds_logo_on_sticky="";
      var tds_header_style="";
      var td_please_wait="Please wait...";
      var td_email_user_pass_incorrect="User or password incorrect!";
      var td_email_user_incorrect="Email or username incorrect!";
      var td_email_incorrect="Email incorrect!";
      var tds_more_articles_on_post_enable="";
      var tds_more_articles_on_post_time_to_wait="";
      var tds_more_articles_on_post_pages_distance_from_top=0;
      var tds_theme_color_site_wide="#4db2ec";
      var tds_smart_sidebar="";
      var tdThemeName="Newspaper";
      var td_magnific_popup_translation_tPrev="Previous (Left arrow key)";
      var td_magnific_popup_translation_tNext="Next (Right arrow key)";
      var td_magnific_popup_translation_tCounter="%curr% of %total%";
      var td_magnific_popup_translation_ajax_tError="The content from %url% could not be loaded.";
      var td_magnific_popup_translation_image_tError="The image #%curr% could not be loaded.";
      var tdBlockNonce="bf4fd8eafc";
      var tdDateNamesI18n={"month_names":["January","February","March","April","May","June","July","August","September","October","November","December"],"month_names_short":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"day_names":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"day_names_short":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]};
      var td_ad_background_click_link="";
      var td_ad_background_click_target="";
    </script>
    <style id="tdw-css-placeholder">.td-footer-page p:empty {
            display: none;
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="home page-template-default page page-id-256 global-block-template-1 tdb-template  tdc-header-template  tdc-footer-template td-animation-stack-type0 td-full-layout" itemscope="itemscope" itemtype="https://schema.org/WebPage">
    <?php $this->beginBody() ?>
    <div class="td-scroll-up  td-hide-scroll-up-on-mob" style="display:none;"><i class="td-icon-menu-up"></i></div>
    <div class="td-menu-background"></div>

        <div id="td-mobile-nav">
            <div class="td-mobile-container">

                <div class="td-menu-socials-wrap">

                    <div class="td-menu-socials">
                    </div>

                    <div class="td-mobile-close">
                        <a href="#" aria-label="Close"><i class="td-icon-close-mobile"></i></a>
                    </div>
                </div>

                <div class="td-menu-login-section">
                    <div class="td-guest-wrap">
                        <div class="td-menu-login"><a id="login-link-mob">Sign in</a></div>
                    </div>
                </div>

                <div class="td-mobile-content">
                    <div class="menu-main-menu-container">
                        <ul id="menu-main-menu" class="td-mobile-main-menu">
                            <li id="menu-item-258"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-256 current_page_item menu-item-first menu-item-258">
                                <a href="/">News</a></li>
                            <li id="menu-item-259"
                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-259">
                                <a href="<?= $bundlePath;?>/category/tagdiv-fashion/">Fashion<i
                                            class="td-icon-menu-right td-element-after"></i></a>
                                <ul class="sub-menu">
                                    <li id="menu-item-0" class="menu-item-0"><a
                                                href="/category/tagdiv-fashion/tagdiv-new-look/">New
                                            Look</a></li>
                                    <li class="menu-item-0"><a
                                                href="/category/tagdiv-fashion/tagdiv-street-fashion/">Street
                                            Fashion</a></li>
                                    <li class="menu-item-0"><a
                                                href="/category/tagdiv-fashion/tagdiv-style-hunter/">Style
                                            Hunter</a></li>
                                    <li class="menu-item-0"><a
                                                href="/category/tagdiv-fashion/tagdiv-vogue/">Vogue</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="menu-item-856"
                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-856"><a
                                        href="/category/tagdiv-technology/tagdiv-gadgets/">Gadgets</a>
                            </li>
                            <li id="menu-item-261"
                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-261"><a
                                        href="/category/tagdiv-lifestyle/">Lifestyle</a></li>
                            <li id="menu-item-262"
                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-262"><a
                                        href="/category/tagdiv-video/">Video</a></li>
                            <li id="menu-item-372"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-372">
                                <a href="#">Features<i class="td-icon-menu-right td-element-after"></i></a>
                                <ul class="sub-menu">
                                    <li id="menu-item-385"
                                        class="td-menu-badge-width menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-385">
                                        <a target="_blank" rel="noreferrer" href="https://cloud.tagdiv.com/#/load/All">Cloud
                                            Library<span class="td-menu-badge">1024+ Elements</span><span
                                                    class="td-menu-subtitle">One click Pre-made, fully customizable templates, sections, and elements</span><span
                                                    class="td-menu-border"></span><i
                                                    class="td-icon-menu-right td-element-after"></i></a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-386"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-386"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Headers">Headers<span
                                                            class="td-menu-badge td-menu-badge-right">69</span></a></li>
                                            <li id="menu-item-387"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-387"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Sections">Sections<span
                                                            class="td-menu-badge td-menu-badge-right">195</span></a></li>
                                            <li id="menu-item-388"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-388"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Blocks">Blocks<span
                                                            class="td-menu-badge td-menu-badge-right">313</span></a></li>
                                            <li id="menu-item-389"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-389"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Homepages">Homepages<span
                                                            class="td-menu-badge td-menu-badge-right">58</span></a></li>
                                            <li id="menu-item-390"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-390"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Single">Single Templates<span
                                                            class="td-menu-badge td-menu-badge-right">80</span></a></li>
                                            <li id="menu-item-391"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-391"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Category">Category Templates<span
                                                            class="td-menu-badge td-menu-badge-right">49</span></a></li>
                                            <li id="menu-item-392"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-392"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Author">Author templates<span
                                                            class="td-menu-badge td-menu-badge-right">43</span></a></li>
                                            <li id="menu-item-393"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-393"><a
                                                        target="_blank" rel="noreferrer" href="https://cloud.tagdiv.com/#/load/404">404
                                                    templates<span class="td-menu-badge td-menu-badge-right">44</span></a></li>
                                            <li id="menu-item-394"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-394"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Search">Search templates<span
                                                            class="td-menu-badge td-menu-badge-right">41</span></a></li>
                                            <li id="menu-item-395"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-395"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Pages">Pages<span
                                                            class="td-menu-badge td-menu-badge-right">34</span></a></li>
                                            <li id="menu-item-396"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-396"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://cloud.tagdiv.com/#/load/Footers">Footers<span
                                                            class="td-menu-badge td-menu-badge-right">52</span></a></li>
                                            <li id="menu-item-2074"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2074">
                                                <a target="_blank" href="https://cloud.tagdiv.com/#/load/Woo%20Shop%20Base">Woo
                                                    Shop Base<span class="td-menu-badge td-menu-badge-right">7</span></a></li>
                                            <li id="menu-item-2075"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2075">
                                                <a target="_blank" href="https://cloud.tagdiv.com/#/load/Woo%20Product">Woo
                                                    Product<span class="td-menu-badge td-menu-badge-right">9</span></a></li>
                                            <li id="menu-item-2076"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2076">
                                                <a target="_blank" href="https://cloud.tagdiv.com/#/load/Woo%20Archive">Woo
                                                    Archive<span class="td-menu-badge td-menu-badge-right">8</span></a></li>
                                            <li id="menu-item-2077"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2077">
                                                <a target="_blank" href="https://cloud.tagdiv.com/#/load/Woo%20Search">Woo
                                                    Search<span class="td-menu-badge td-menu-badge-right">8</span></a></li>
                                            <li id="menu-item-1098"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1098">
                                                <a rel="noreferrer" href="https://cloud.tagdiv.com/#/load/All">Other<span
                                                            class="td-menu-badge td-menu-badge-right">50+</span></a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-397"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-397">
                                        <a href="#">Premium Features<i class="td-icon-menu-right td-element-after"></i></a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-1816"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1816">
                                                <a href="/covid-19-shortcodes/">Covid-19
                                                    Shortcodes <span class="td-menu-badge">New</span></a></li>
                                            <li id="menu-item-1670"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1670">
                                                <a href="/modal-video-popup/">Modal Video
                                                    Popup <span class="td-menu-badge">New</span></a></li>
                                            <li id="menu-item-1668"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1668">
                                                <a href="/td-post-major-deep-new-release-feelings-power-deep-house-mix/">Sticky
                                                    Video Player <span class="td-menu-badge">New</span></a></li>
                                            <li id="menu-item-1419"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1419">
                                                <a href="#">SoundCloud / Self-hosted Audio<i
                                                            class="td-icon-menu-right td-element-after"></i></a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-1421"
                                                        class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1421">
                                                        <a href="/dj-dark-chill-vibes/">SoundCloud
                                                            Single Template</a></li>
                                                    <li id="menu-item-1474"
                                                        class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1474">
                                                        <a href="/td-post-the-quiet-city-winter-in-paris-by-andrew-julian/">Self-hosted
                                                            Single Template</a></li>
                                                    <li id="menu-item-1420"
                                                        class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1420">
                                                        <a href="/category/tagdiv-music/">Music
                                                            Category</a></li>
                                                </ul>
                                            </li>
                                            <li id="menu-item-1152"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1152">
                                                <a href="/td-post-another-big-apartment-project-slated-for-broad-ripple-company/">Auto
                                                    Loading Articles</a></li>
                                            <li id="menu-item-449"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-449">
                                                <a href="/video-playlist/">Video Playlist
                                                    <span class="td-menu-badge">Updated</span></a></li>
                                            <li id="menu-item-1097"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1097">
                                                <a href="/td-post-study-2020-fake-engagement-is-only-half-the-problem/">tagDiv
                                                    Gallery</a></li>
                                            <li id="menu-item-1493"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1493">
                                                <a href="/block-header-1/">18 Block Header
                                                    Templates</a></li>
                                            <li id="menu-item-430"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-430">
                                                <a href="/instagram-widget/">Instagram
                                                    Block</a></li>
                                            <li id="menu-item-434"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-434">
                                                <a href="/weather-widget/">Weather
                                                    Block</a></li>
                                            <li id="menu-item-442"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-442">
                                                <a href="/exchange-widget/">Exchange
                                                    Block</a></li>
                                            <li id="menu-item-438"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-438">
                                                <a href="/pinterest-widget/">Pinterest
                                                    Block</a></li>
                                            <li id="menu-item-1465"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1465">
                                                <a href="/row-dividers/">Row Dividers</a>
                                            </li>
                                            <li id="menu-item-401"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-401"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://tagdiv.com/newspaper-theme-typography-font-styles-blocks-shortcodes/">Responsive
                                                    Typography</a></li>
                                            <li id="menu-item-399"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-399"><a
                                                        target="_blank" rel="noreferrer"
                                                        href="https://tagdiv.com/amp-newspaper-theme/">Google AMP</a></li>
                                            <li id="menu-item-467"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-467">
                                                <a href="#">More<i class="td-icon-menu-right td-element-after"></i></a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-418"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-418">
                                                        <a href="/mobile-menu/">Mobile
                                                            Menu</a></li>
                                                    <li id="menu-item-463"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-463">
                                                        <a href="/author-box/">Author
                                                            Box</a></li>
                                                    <li id="menu-item-470"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-470">
                                                        <a href="/image-box/">Image Box</a>
                                                    </li>
                                                    <li id="menu-item-1466"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1466">
                                                        <a href="/fixed-image-background/">Fixed
                                                            Image Background</a></li>
                                                    <li id="menu-item-1467"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1467">
                                                        <a href="/background-parallax/">Background
                                                            Parallax</a></li>
                                                    <li id="menu-item-1468"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1468">
                                                        <a href="/video-background/">Video
                                                            Background</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-400"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-400"><a
                                                target="_blank" rel="noreferrer"
                                                href="https://demo.tagdiv.com/newspaper_crypto/buttons/">Multipurpose Elements</a>
                                    </li>
                                    <li id="menu-item-1487"
                                        class="td-menu-badge-width menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1487">
                                        <a href="#">Premium Plugins <span class="td-menu-badge">Included</span><i
                                                    class="td-icon-menu-right td-element-after"></i></a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-1491"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1491">
                                                <a target="_blank" rel="noreferrer"
                                                   href="https://tagdiv.com/category/documentation/tagdiv-composer/">tagDiv
                                                    Composer</a></li>
                                            <li id="menu-item-1488"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1488">
                                                <a target="_blank" rel="noreferrer" href="https://cloud.tagdiv.com/#/load/All">tagDiv
                                                    Cloud Library</a></li>
                                            <li id="menu-item-413"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-413">
                                                <a target="_blank" href="/mobile-theme/">tagDiv
                                                    Mobile Theme<span class="td-menu-badge">AMP Support</span></a></li>
                                            <li id="menu-item-2087"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2087">
                                                <a target="_blank"
                                                   href="https://tagdiv.com/how-to-build-an-ecommerce-website-with-newspaper-theme/">tagDiv
                                                    Shop</a></li>
                                            <li id="menu-item-2086"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2086">
                                                <a target="_blank" href="https://tagdiv.com/newspaper-11-2/">tagDiv Opt-in
                                                    Builder</a></li>
                                            <li id="menu-item-424"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-424">
                                                <a href="/social-counter-widget/">tagDiv
                                                    Social Counter</a></li>
                                            <li id="menu-item-402"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-402"><a
                                                        target="_blank" href="https://demo.tagdiv.com/newspaper_crypto/newsletter/">tagDiv
                                                    Newsletter</a></li>
                                            <li id="menu-item-1489"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1489">
                                                <a target="_blank" rel="noreferrer"
                                                   href="https://tagdiv.com/newspaper-theme-update-standard-pack-or-tagdiv-cloud-templates/">tagDiv
                                                    Standard Pack</a></li>
                                            <li id="menu-item-1492"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1492">
                                                <a target="_blank" rel="noreferrer"
                                                   href="https://demo.tagdiv.com/newspaper_politics/">Revolution Slider</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-600"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-600">
                                        <a href="#">Smart Lists<i class="td-icon-menu-right td-element-after"></i></a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-836"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-836">
                                                <a href="/top-interior-design-in-2020-new-york-business/">One
                                                    page Smart List 1</a></li>
                                            <li id="menu-item-837"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-837">
                                                <a href="/most-popular-recipes-you-need-to-try-in-2020/">One
                                                    page Smart List 2</a></li>
                                            <li id="menu-item-838"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-838">
                                                <a href="/top-shared-images-and-videos-in-your-instagram/">One
                                                    page Smart List 3</a></li>
                                            <li id="menu-item-839"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-839">
                                                <a href="/td-post-china-helps-the-smartphone-production-reach-record-levels/">Smart
                                                    List 4 with Pagination</a></li>
                                            <li id="menu-item-840"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-840">
                                                <a href="/td-post-10-fabulous-over-the-ankle-shoes-to-wear-this-cold-season/">Smart
                                                    List 5 with Pagination</a></li>
                                            <li id="menu-item-841"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-841">
                                                <a href="/td-post-kim-selfie-book-available-for-pre-order-walks-her-last-runway/">Dropdown
                                                    Smart List 6</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-1117"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1117">
                                        <a href="#">Reviews<i class="td-icon-menu-right td-element-after"></i></a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-1116"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1116">
                                                <a href="/td-post-cisco-knows-its-routers-are-the-fastest-ever-for-desktop-pcs/">Sidebar
                                                    Stars Review</a></li>
                                            <li id="menu-item-1114"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1114">
                                                <a href="/td-post-this-new-headphone-from-sony-cancel-out-almost-every-background/">Points
                                                    Review</a></li>
                                            <li id="menu-item-1115"
                                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-1115">
                                                <a href="/td-post-laptop-with-128-bit-processor-32gb-of-ram-and-24mp-front-camera/">Stars
                                                    Review</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-1642"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1642">
                                        <a target="_blank" rel="noreferrer"
                                           href="https://demo.tagdiv.com/newspaper_shop_kids_store/">WooCommerce <span
                                                    class="td-menu-badge">Shop</span><i
                                                    class="td-icon-menu-right td-element-after"></i></a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-2078"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2078">
                                                <a target="_blank" href="https://demo.tagdiv.com/newspaper_shop_kids_store/">Kids
                                                    Store<span class="td-menu-badge">Demo</span></a></li>
                                            <li id="menu-item-2079"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2079">
                                                <a target="_blank" href="https://demo.tagdiv.com/newspaper_shop_blog_gadgets/">Gadgets
                                                    Blog &#038; Shop<span class="td-menu-badge">Demo</span></a></li>
                                            <li id="menu-item-2080"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2080">
                                                <a target="_blank" href="https://demo.tagdiv.com/newspaper_shop_audio/">Audio
                                                    Shop<span class="td-menu-badge">Demo</span></a></li>
                                            <li id="menu-item-2081"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2081">
                                                <a target="_blank"
                                                   href="https://demo.tagdiv.com/newspaper_shop_vintage_choppers_store/">Vintage
                                                    Choppers Store<span class="td-menu-badge">Demo</span></a></li>
                                            <li id="menu-item-2082"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2082">
                                                <a target="_blank" href="https://demo.tagdiv.com/newspaper_shop_apocryph/">Apocryph
                                                    Shop<span class="td-menu-badge">Demo</span></a></li>
                                            <li id="menu-item-2083"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2083">
                                                <a target="_blank" href="https://demo.tagdiv.com/newspaper_shop_watches_store/">Watches
                                                    Shop<span class="td-menu-badge">Demo</span></a></li>
                                            <li id="menu-item-2084"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2084">
                                                <a target="_blank" href="https://demo.tagdiv.com/newspaper_shop_vaness/">Vaness
                                                    Shop<span class="td-menu-badge">Demo</span></a></li>
                                            <li id="menu-item-2085"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2085">
                                                <a target="_blank" href="https://demo.tagdiv.com/newspaper_shop_makeup/">Makeup
                                                    Shop<span class="td-menu-badge">Demo</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="login-form-mobile" class="td-register-section">
                <div id="td-login-mob" class="td-login-animation td-login-hide-mob">

                    <div class="td-login-close">
                        <a href="#" aria-label="Back" class="td-back-button"><i class="td-icon-read-down"></i></a>
                        <div class="td-login-title">Sign in</div>

                        <div class="td-mobile-close">
                            <a href="#" aria-label="Close"><i class="td-icon-close-mobile"></i></a>
                        </div>
                    </div>
                    <form class="td-login-form-wrap" action="#" method="post">
                        <div class="td-login-panel-title"><span>Welcome!</span>Log into your account</div>
                        <div class="td_display_err"></div>
                        <div class="td-login-inputs"><input class="td-login-input" autocomplete="username" type="text"
                                                            name="login_email" id="login_email-mob" value="" required><label
                                    for="login_email-mob">your username</label></div>
                        <div class="td-login-inputs"><input class="td-login-input" autocomplete="current-password"
                                                            type="password" name="login_pass" id="login_pass-mob" value=""
                                                            required><label for="login_pass-mob">your password</label></div>
                        <input type="button" name="login_button" id="login_button-mob" class="td-login-button" value="LOG IN">
                        <div class="td-login-info-text">
                            <a href="#" id="forgot-pass-link-mob">Forgot your password?</a>
                        </div>
                        <div class="td-login-register-link">
                        </div>
                    </form>
                </div>
                <div id="td-forgot-pass-mob" class="td-login-animation td-login-hide-mob">

                    <div class="td-forgot-pass-close">
                        <a href="#" aria-label="Back" class="td-back-button"><i class="td-icon-read-down"></i></a>
                        <div class="td-login-title">Password recovery</div>
                    </div>
                    <div class="td-login-form-wrap">
                        <div class="td-login-panel-title">Recover your password</div>
                        <div class="td_display_err"></div>
                        <div class="td-login-inputs"><input class="td-login-input" type="text" name="forgot_email"
                                                            id="forgot_email-mob" value="" required><label
                                    for="forgot_email-mob">your email</label></div>
                        <input type="button" name="forgot_button" id="forgot_button-mob" class="td-login-button"
                               value="Send My Pass">
                    </div>
                </div>
            </div>
        </div>
        <div class="td-search-background"></div>
        <div class="td-search-wrap-mob">
            <div class="td-drop-down-search">
                <form method="get" class="td-search-form" action="/">

                    <div class="td-search-close">
                        <a href="#"><i class="td-icon-close-mobile"></i></a>
                    </div>
                    <div role="search" class="td-search-input">
                        <span>Search</span>
                        <input id="td-header-search-mob" type="text" value="" name="s" autocomplete="off"/>
                    </div>
                </form>
                <div id="td-aj-search-mob" class="td-ajax-search-flex"></div>
            </div>
        </div>
        <div id="td-outer-wrap" class="td-theme-wrap">

            <?php echo $this->render('@frontend/templates/cryptoparrot/header'); ?>

            <?php echo $content; ?>


            <?php echo $this->render('@frontend/templates/cryptoparrot/footer'); ?>
            <style>
                .tdc-footer-template .td-main-content-wrap {
                    padding-bottom: 0;
                }
            </style>
        </div>

<!--        <a href="#themes"target="_blank" rel="noreferrer" id="td-theme-demos-button" class="td-right-demos-button">Themes</a>-->
<!--        <a href="# " id="td-theme-buy-button" class="td-right-demos-button">Order</a>-->








    <?php $this->endBody() ?>
    <link rel='stylesheet' id='td-rest-css'
          href='<?= $bundlePath;?>/wp-content/td_cache/td_analyze/css/256-tda-rest-css-7b48e68a-efbf-edbf-9eef-d8c2b0b73056.css'
          type='text/css' media='all'/>

    <script>
      jQuery().ready(function () {
        tdWeather.addItem({
          'block_uid': 'tdb_header_weather_uid',
          'location': 'New York',
          'api_location': 'New York',
          'api_language': 'en',
          'api_key': 'c937b98a4e6a49405410bfe0790a0eac',
          'today_icon': 'mist-n',
          'today_icon_text': 'mist',
          'today_temp': [12, 53.600000000000001],
          'today_humidity': 92,
          'today_wind_speed': [8.1999999999999993, 5.0999999999999996],
          'today_min': [9.3000000000000007, 48.799999999999997],
          'today_max': [15.300000000000001, 59.600000000000001],
          'today_clouds': 90,
          'current_unit': 0,
          'forecast': [{
            'timestamp': 1635573600,
            'day_name': 'Sat',
            'day_temp': [17, 62],
            'owm_day_index': 0
          }, {
            'timestamp': 1635638400,
            'day_name': 'Sun',
            'day_temp': [17, 63],
            'owm_day_index': 6
          }, {
            'timestamp': 1635724800,
            'day_name': 'Mon',
            'day_temp': [15, 59],
            'owm_day_index': 14
          }, {
            'timestamp': 1635811200,
            'day_name': 'Tue',
            'day_temp': [13, 55],
            'owm_day_index': 22
          }, {'timestamp': 1635897600, 'day_name': 'Wed', 'day_temp': [12, 53], 'owm_day_index': 30}]
        })
      })

      jQuery().ready(function () {

        var blockClass = '.tdi_29'

        jQuery(blockClass + '.tdb-horiz-menu-singleline > .menu-item-has-children a').click(function (e) {
          e.preventDefault()
        })

      })

      /* global jQuery:{} */
      jQuery(window).on('load', function () {

        var tdbMenuItem = new tdbMenu.item()
        tdbMenuItem.blockUid = 'tdi_48'
        tdbMenuItem.jqueryObj = jQuery('.tdi_48')

        tdbMenuItem.isMegaMenuFull = true

        tdbMenu.addItem(tdbMenuItem)

      })

      jQuery().ready(function () {

        var tdbSearchItem = new tdbSearch.item()

        //block unique ID
        tdbSearchItem.blockUid = 'tdi_58'
        tdbSearchItem.blockAtts = '{"inline":"yes","toggle_txt_pos":"after","form_align":"content-horiz-right","results_msg_align":"content-horiz-center","image_floated":"float_left","image_width":"30","image_size":"td_324x400","show_cat":"none","show_btn":"none","show_date":"","show_review":"","show_com":"none","show_excerpt":"none","show_author":"none","art_title":"0 0 2px 0","all_modules_space":"20","tdicon":"td-icon-magnifier-big-rounded","icon_size":"eyJhbGwiOiIyMCIsInBvcnRyYWl0IjoiMTgifQ==","tdc_css":"eyJhbGwiOnsiZGlzcGxheSI6IiJ9LCJwb3J0cmFpdCI6eyJtYXJnaW4tdG9wIjoiMSIsImRpc3BsYXkiOiIifSwicG9ydHJhaXRfbWF4X3dpZHRoIjoxMDE4LCJwb3J0cmFpdF9taW5fd2lkdGgiOjc2OH0=","modules_on_row":"eyJhbGwiOiI1MCUiLCJwb3J0cmFpdCI6IjUwJSIsImxhbmRzY2FwZSI6IjUwJSJ9","meta_info_horiz":"content-horiz-left","form_width":"600","input_border":"0 0 1px 0","modules_divider":"","form_padding":"eyJwb3J0cmFpdCI6IjIwcHggMjBweCAyMHB4IiwiYWxsIjoiMzBweCJ9","arrow_color":"#ffffff","btn_bg_h":"rgba(0,0,0,0)","btn_tdicon":"td-icon-menu-right","btn_icon_pos":"after","btn_icon_size":"7","btn_icon_space":"8","f_title_font_family":"","f_cat_font_family":"","f_cat_font_transform":"uppercase","f_title_font_weight":"","f_title_font_transform":"","f_title_font_size":"13","title_txt_hover":"#4db2ec","results_limit":"6","float_block":"yes","icon_color":"#000000","results_border":"0 0 1px 0","f_title_font_line_height":"1.4","btn_color":"#000000","btn_color_h":"#4db2ec","all_underline_color":"","results_msg_color_h":"#4db2ec","image_height":"100","meta_padding":"3px 0 0 16px","modules_gap":"20","mc1_tl":"12","show_form":"yes","f_meta_font_weight":"","h_effect":"","results_msg_padding":"10px 0","f_results_msg_font_style":"normal","video_icon":"24","modules_divider_color":"","modules_border_color":"","btn_padding":"0","form_border":"0","form_shadow_shadow_offset_vertical":"3","results_padding":"0 30px 30px","btn_bg":"rgba(0,0,0,0)","icon_padding":"eyJhbGwiOjIuNCwicG9ydHJhaXQiOiIyLjYifQ==","block_type":"tdb_header_search","disable_live_search":"","separator":"","toggle_txt":"","toggle_txt_align":"0","toggle_txt_space":"","toggle_horiz_align":"content-horiz-left","form_offset":"","form_offset_left":"","form_content_width":"","form_align_screen":"","input_placeholder":"","placeholder_travel":"0","input_padding":"","input_radius":"","btn_text":"Search","btn_icon_align":"0","btn_margin":"","btn_border":"","btn_radius":"","results_msg_border":"","mc1_title_tag":"","mc1_el":"","m_padding":"","modules_border_size":"","modules_border_style":"","image_alignment":"50","image_radius":"","hide_image":"","show_vid_t":"block","vid_t_margin":"","vid_t_padding":"","vid_t_color":"","vid_t_bg_color":"","f_vid_time_font_header":"","f_vid_time_font_title":"Video duration text","f_vid_time_font_settings":"","f_vid_time_font_family":"","f_vid_time_font_size":"","f_vid_time_font_line_height":"","f_vid_time_font_style":"","f_vid_time_font_weight":"","f_vid_time_font_transform":"","f_vid_time_font_spacing":"","f_vid_time_":"","meta_info_align":"","meta_width":"","meta_margin":"","meta_info_border_size":"","meta_info_border_style":"","meta_info_border_color":"#eaeaea","art_btn":"","modules_category":"","modules_category_margin":"","modules_category_padding":"","modules_cat_border":"","modules_category_radius":"0","author_photo":"","author_photo_size":"","author_photo_space":"","author_photo_radius":"","show_modified_date":"","time_ago":"","time_ago_add_txt":"ago","review_space":"","review_size":"2.5","review_distance":"","art_excerpt":"","excerpt_col":"1","excerpt_gap":"","excerpt_middle":"","btn_title":"","btn_border_width":"","form_general_bg":"","icon_color_h":"","toggle_txt_color":"","toggle_txt_color_h":"","f_toggle_txt_font_header":"","f_toggle_txt_font_title":"Text","f_toggle_txt_font_settings":"","f_toggle_txt_font_family":"","f_toggle_txt_font_size":"","f_toggle_txt_font_line_height":"","f_toggle_txt_font_style":"","f_toggle_txt_font_weight":"","f_toggle_txt_font_transform":"","f_toggle_txt_font_spacing":"","f_toggle_txt_":"","form_bg":"","form_border_color":"","form_shadow_shadow_header":"","form_shadow_shadow_title":"Shadow","form_shadow_shadow_size":"","form_shadow_shadow_offset_horizontal":"","form_shadow_shadow_spread":"","form_shadow_shadow_color":"","input_color":"","placeholder_color":"","placeholder_opacity":"0","input_bg":"","input_border_color":"","input_shadow_shadow_header":"","input_shadow_shadow_title":"Input shadow","input_shadow_shadow_size":"","input_shadow_shadow_offset_horizontal":"","input_shadow_shadow_offset_vertical":"","input_shadow_shadow_spread":"","input_shadow_shadow_color":"","btn_icon_color":"","btn_icon_color_h":"","btn_border_color":"","btn_border_color_h":"","btn_shadow_shadow_header":"","btn_shadow_shadow_title":"Button shadow","btn_shadow_shadow_size":"","btn_shadow_shadow_offset_horizontal":"","btn_shadow_shadow_offset_vertical":"","btn_shadow_shadow_spread":"","btn_shadow_shadow_color":"","f_input_font_header":"","f_input_font_title":"Input text","f_input_font_settings":"","f_input_font_family":"","f_input_font_size":"","f_input_font_line_height":"","f_input_font_style":"","f_input_font_weight":"","f_input_font_transform":"","f_input_font_spacing":"","f_input_":"","f_placeholder_font_title":"Placeholder text","f_placeholder_font_settings":"","f_placeholder_font_family":"","f_placeholder_font_size":"","f_placeholder_font_line_height":"","f_placeholder_font_style":"","f_placeholder_font_weight":"","f_placeholder_font_transform":"","f_placeholder_font_spacing":"","f_placeholder_":"","f_btn_font_title":"Button text","f_btn_font_settings":"","f_btn_font_family":"","f_btn_font_size":"","f_btn_font_line_height":"","f_btn_font_style":"","f_btn_font_weight":"","f_btn_font_transform":"","f_btn_font_spacing":"","f_btn_":"","results_bg":"","results_border_color":"","results_msg_color":"","results_msg_bg":"","results_msg_border_color":"","f_results_msg_font_header":"","f_results_msg_font_title":"Text","f_results_msg_font_settings":"","f_results_msg_font_family":"","f_results_msg_font_size":"","f_results_msg_font_line_height":"","f_results_msg_font_weight":"","f_results_msg_font_transform":"","f_results_msg_font_spacing":"","f_results_msg_":"","m_bg":"","color_overlay":"","shadow_module_shadow_header":"","shadow_module_shadow_title":"Module Shadow","shadow_module_shadow_size":"","shadow_module_shadow_offset_horizontal":"","shadow_module_shadow_offset_vertical":"","shadow_module_shadow_spread":"","shadow_module_shadow_color":"","title_txt":"","all_underline_height":"","cat_bg":"","cat_bg_hover":"","cat_txt":"","cat_txt_hover":"","cat_border":"","cat_border_hover":"","meta_bg":"","author_txt":"","author_txt_hover":"","date_txt":"","ex_txt":"","com_bg":"","com_txt":"","rev_txt":"","shadow_meta_shadow_header":"","shadow_meta_shadow_title":"Meta info shadow","shadow_meta_shadow_size":"","shadow_meta_shadow_offset_horizontal":"","shadow_meta_shadow_offset_vertical":"","shadow_meta_shadow_spread":"","shadow_meta_shadow_color":"","btn_bg_hover":"","btn_txt":"","btn_txt_hover":"","btn_border_hover":"","f_title_font_header":"","f_title_font_title":"Article title","f_title_font_settings":"","f_title_font_style":"","f_title_font_spacing":"","f_title_":"","f_cat_font_title":"Article category tag","f_cat_font_settings":"","f_cat_font_size":"","f_cat_font_line_height":"","f_cat_font_style":"","f_cat_font_weight":"","f_cat_font_spacing":"","f_cat_":"","f_meta_font_title":"Article meta info","f_meta_font_settings":"","f_meta_font_family":"","f_meta_font_size":"","f_meta_font_line_height":"","f_meta_font_style":"","f_meta_font_transform":"","f_meta_font_spacing":"","f_meta_":"","f_ex_font_title":"Article excerpt","f_ex_font_settings":"","f_ex_font_family":"","f_ex_font_size":"","f_ex_font_line_height":"","f_ex_font_style":"","f_ex_font_weight":"","f_ex_font_transform":"","f_ex_font_spacing":"","f_ex_":"","el_class":"","block_template_id":"","td_column_number":3,"header_color":"","ajax_pagination_infinite_stop":"","offset":"","limit":"5","td_ajax_preloading":"","td_ajax_filter_type":"","td_filter_default_txt":"","td_ajax_filter_ids":"","color_preset":"","ajax_pagination":"","border_top":"","css":"","class":"tdi_58","tdc_css_class":"tdi_58","tdc_css_class_style":"tdi_58_rand_style"}'
        tdbSearchItem.jqueryObj = jQuery('.tdi_58')
        tdbSearchItem._openSearchFormClass = 'tdb-drop-down-search-open'
        tdbSearchItem._resultsLimit = '6'

        tdbSearch.addItem(tdbSearchItem)

      })

    </script>
    <script defer src="<?php echo $bundlePath;?>/wp-content/cache/autoptimize/js/autoptimize_1368e30074c523a0ddfd50fe85290f63.js"></script>
</body>
</html>
<?php $this->endPage() ?>