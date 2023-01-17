<?php
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\CryptoparrotAsset')->baseUrl.'/cryptoparrot';
?>
<?= \common\modules\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
    'namespace'      => 'menu-top',
    'viewFile'       => '@template/widgets/TreeMenuCmsWidget/menu-top.php',
    'label'          => '',
    'level'          => '1',
    'enabledRunCache'=> \common\modules\cms\components\Cms::BOOL_N,
]); ?>

<div class="td-header-template-wrap" style="position: relative">
    <div class="td-header-mobile-wrap ">
        <div id="tdi_1" class="tdc-zone">
            <div class="tdc_zone tdi_2  wpb_row td-pb-row tdc-element-style">
                <div class="tdi_1_rand_style td-element-style"></div>
                <div id="tdi_3" class="tdc-row">
                    <div class="vc_row tdi_4  wpb_row td-pb-row">
                        <div class="vc_column tdi_6  wpb_column vc_column_container tdc-column td-pb-span4">
                            <div class="wpb_wrapper">
                                <div class="td_block_wrap tdb_mobile_menu tdi_7 td-pb-border-top td_block_template_1 tdb-header-align"
                                     data-td-block-uid="tdi_7">
                                    <div class="tdb-block-inner td-fix-index"><a class="tdb-mobile-menu-button"
                                                                                 aria-label="menu-button"
                                                                                 href="#"><i
                                                    class="tdb-mobile-menu-icon td-icon-mobile"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_column tdi_9  wpb_column vc_column_container tdc-column td-pb-span4">
                            <div class="wpb_wrapper">
                                <div class="td_block_wrap tdb_header_logo tdi_10 td-pb-border-top td_block_template_1 tdb-header-align"
                                     data-td-block-uid="tdi_10">
                                    <div class="tdb-block-inner td-fix-index">

                                        <a class="tdb-logo-a" href="/">
                                            <h1>
                                                <span class="tdb-logo-img-wrap">
                                                    <img class="tdb-logo-img"
                                                         src="<?= $bundlePath;?>/wp-content/uploads/2021/06/newspaper-11-logo-white.png"
                                                         alt="Logo" title="" width="272" height="90"/>
                                                </span>
                                            </h1>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_column tdi_12  wpb_column vc_column_container tdc-column td-pb-span4">
                            <div class="wpb_wrapper">
                                <div class="td_block_wrap tdb_mobile_search tdi_13 td-pb-border-top td_block_template_1 tdb-header-align"
                                     data-td-block-uid="tdi_13">
                                    <div class="tdb-block-inner td-fix-index"><a
                                                class="tdb-header-search-button-mob" href="#"
                                                role="button" aria-label="Search" data-toggle="dropdown"><span
                                                    class="tdb-mobile-search-icon tdb-mobile-search-icon-svg"><svg
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 1024 1024"><path
                                                            d="M946.371 843.601l-125.379-125.44c43.643-65.925 65.495-142.1 65.475-218.040 0.051-101.069-38.676-202.588-115.835-279.706-77.117-77.148-178.606-115.948-279.644-115.886-101.079-0.061-202.557 38.738-279.665 115.876-77.169 77.128-115.937 178.627-115.907 279.716-0.031 101.069 38.728 202.588 115.907 279.665 77.117 77.117 178.616 115.825 279.665 115.804 75.94 0.020 152.136-21.862 218.061-65.495l125.348 125.46c30.915 30.904 81.029 30.904 111.954 0.020 30.915-30.935 30.915-81.029 0.020-111.974zM705.772 714.925c-59.443 59.341-136.899 88.842-214.784 88.924-77.896-0.082-155.341-29.583-214.784-88.924-59.443-59.484-88.975-136.919-89.037-214.804 0.061-77.885 29.604-155.372 89.037-214.825 59.464-59.443 136.878-88.945 214.784-89.016 77.865 0.082 155.3 29.583 214.784 89.016 59.361 59.464 88.914 136.919 88.945 214.825-0.041 77.885-29.583 155.361-88.945 214.804z"></path></svg></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="td-header-mobile-sticky-wrap tdc-zone-sticky-invisible tdc-zone-sticky-inactive"
         style="display: none">
        <div id="tdi_14" class="tdc-zone">
            <div class="tdc_zone tdi_15  wpb_row td-pb-row" data-sticky-offset="0">
                <div id="tdi_16" class="tdc-row">
                    <div class="vc_row tdi_17  wpb_row td-pb-row">
                        <div class="vc_column tdi_19  wpb_column vc_column_container tdc-column td-pb-span12">
                            <div class="wpb_wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="td-header-desktop-wrap ">

        <div id="login-form" class="white-popup-block mfp-hide mfp-with-anim">
            <div class="td-login-wrap">
                <a href="#" aria-label="Back" class="td-back-button"><i class="td-icon-modal-back"></i></a>
                <div id="td-login-div" class="td-login-form-div td-display-block">
                    <div class="td-login-panel-title">Sign in</div>
                    <div class="td-login-panel-descr">Welcome! Log into your account</div>
                    <div class="td_display_err"></div>
                    <form action="#" method="post">
                        <div class="td-login-inputs"><input class="td-login-input" autocomplete="username"
                                                            type="text" name="login_email" id="login_email" value=""
                                                            required><label for="login_email">your username</label>
                        </div>
                        <div class="td-login-inputs"><input class="td-login-input" autocomplete="current-password"
                                                            type="password" name="login_pass" id="login_pass"
                                                            value="" required><label for="login_pass">your
                                password</label></div>
                        <input type="button" name="login_button" id="login_button"
                               class="wpb_button btn td-login-button" value="Login">
                    </form>
                    <div class="td-login-info-text"><a href="#" id="forgot-pass-link">Forgot your password? Get
                            help</a></div>
                </div>
                <div id="td-forgot-pass-div" class="td-login-form-div td-display-none">
                    <div class="td-login-panel-title">Password recovery</div>
                    <div class="td-login-panel-descr">Recover your password</div>
                    <div class="td_display_err"></div>
                    <div class="td-login-inputs"><input class="td-login-input" type="text" name="forgot_email"
                                                        id="forgot_email" value="" required><label
                                for="forgot_email">your email</label></div>
                    <input type="button" name="forgot_button" id="forgot_button"
                           class="wpb_button btn td-login-button" value="Send My Password">
                    <div class="td-login-info-text">A password will be e-mailed to you.</div>
                </div>
            </div>
        </div>
        <div id="tdi_20" class="tdc-zone">
            <div class="tdc_zone tdi_21  wpb_row td-pb-row tdc-element-style">
                <div class="tdi_20_rand_style td-element-style"></div>
                <div id="tdi_22" class="tdc-row stretch_row">
                    <div class="vc_row tdi_23  wpb_row td-pb-row tdc-element-style">
                        <div class="tdi_22_rand_style td-element-style"></div>
                        <div class="vc_column tdi_25  wpb_column vc_column_container tdc-column td-pb-span12">
                            <div class="wpb_wrapper">
                                <div class="td_block_wrap tdb_header_weather tdi_26 td-pb-border-top td_block_template_1 tdb-header-align"
                                     data-td-block-uid="tdi_26">
                                    <div class="tdb-block-inner td-fix-index"><i class="td-icons mist-n"></i>
                                        <div class="tdb-weather-deg-wrap" data-block-uid="tdb_header_weather_uid">
                                            <span class="tdb-weather-deg">-20</span>
                                            <span class="tdb-weather-unit">C</span>
                                        </div>
                                        <div class="tdb-weather-city">Moscow</div>
                                    </div>
                                </div>
                                <div class="td_block_wrap tdb_header_date tdi_27 td-pb-border-top td_block_template_1 tdb-header-align"
                                     data-td-block-uid="tdi_27">
                                    <div class="tdb-block-inner td-fix-index">

                                        <div class="tdb-head-date-txt"><?= date("F j, Y, g:i a");?></div>
                                    </div>
                                </div>
                                <script>

                                  var tdb_login_sing_in_shortcode = 'on'

                                </script>
                                <div class="td_block_wrap tdb_header_user tdi_28 td-pb-border-top td_block_template_1 tdb-header-align"
                                     data-td-block-uid="tdi_28">
                                    <div class="tdb-block-inner td-fix-index"><a
                                                class="td-login-modal-js tdb-head-usr-item tdb-head-usr-log"
                                                href="#login-form" data-effect="mpf-td-login-effect"><span
                                                    class="tdb-head-usr-log-txt">Sign in / Join</span></a></div>
                                </div>
                                <div class="td_block_wrap tdb_mobile_horiz_menu tdi_29 td-pb-border-top td_block_template_1 tdb-header-align"
                                     data-td-block-uid="tdi_29" style=" z-index: 999;">
                                    <div id=tdi_29 class="td_block_inner td-fix-index">
                                        <div class="menu-top-menu-container">
                                            <ul id="menu-top-menu" class="tdb-horiz-menu">
                                                <li id="menu-item-368"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-368">
                                                    <a href="/blog/">
                                                        <div class="tdb-menu-item-text">Blog</div>
                                                    </a></li>
                                                <li id="menu-item-369"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-369">
                                                    <a target="_blank"
                                                       href="/forums/">
                                                        <div class="tdb-menu-item-text">Earn</div>
                                                    </a></li>
                                                <li id="menu-item-370"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-370">
                                                    <a target="_blank" rel="noopener"
                                                       href="#">
                                                        <div class="tdb-menu-item-text">NFT</div>
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tdm_block td_block_wrap tdm_block_socials tdi_30 tdm-content-horiz-left td-pb-border-top td_block_template_1"
                                     data-td-block-uid="tdi_30">
                                    <div class="tdm-social-wrapper tds-social1 tdi_31">
                                        <div class="tdm-social-item-wrap">
                                            <a target="_blank" href="https://vk.com/cryptoparrot" title="Vkontakte" class="tdm-social-item">
                                                <i class="td-icon-font td-icon-vk"></i>
                                            </a>
                                            <a target="_blank" href="https://vk.com/cryptoparrot" class="tdm-social-text">Vkontakte</a>
                                        </div>
                                        <div class="tdm-social-item-wrap">
                                            <a target="_blank" href="https://fb.com/cryptoparrot" title="Facebook" class="tdm-social-item">
                                                <i class="td-icon-font td-icon-facebook"></i>
                                            </a>
                                            <a target="_blank" href="https://fb.com/cryptoparrot" class="tdm-social-text">Facebook</a>
                                        </div>
                                        <div class="tdm-social-item-wrap">
                                            <a target="_blank" href="https://youtube.com/cryptoparrot" title="Youtube" class="tdm-social-item">
                                                <i class="td-icon-font td-icon-youtube"></i></a>
                                            <a target="_blank" href="https://youtube.com/cryptoparrot" class="tdm-social-text">Youtube</a>
                                        </div>
                                        <div class="tdm-social-item-wrap">
                                            <a target="_blank" href="https://instagram.com/cryptoparrot" title="Instagram" class="tdm-social-item">
                                                <i class="td-icon-font td-icon-instagram"></i>
                                            </a>
                                            <a target="_blank" href="https://instagram.com/cryptoparrot" class="tdm-social-text">Instagram</a>
                                        </div>
                                        <div class="tdm-social-item-wrap">
                                            <a target="_blank" href="https://twitter.com/cryptoparrot" title="Twitter" class="tdm-social-item">
                                                <i class="td-icon-font td-icon-twitter"></i>
                                            </a>
                                            <a target="_blank" href="https://twitter.com/cryptoparrot" class="tdm-social-text">Twitter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tdi_32" class="tdc-row">
                    <div class="vc_row tdi_33  wpb_row td-pb-row">
                        <div class="vc_column tdi_35  wpb_column vc_column_container tdc-column td-pb-span12">
                            <div class="wpb_wrapper">
                                <div class="vc_row_inner tdi_37  vc_row vc_inner wpb_row td-pb-row tdc-row-content-vert-center">
                                    <div class="vc_column_inner tdi_39  wpb_column vc_column_container tdc-inner-column td-pb-span4">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="td_block_wrap tdb_header_logo tdi_40 td-pb-border-top td_block_template_1 tdb-header-align"
                                                     data-td-block-uid="tdi_40">
                                                    <div class="tdb-block-inner td-fix-index"><a class="tdb-logo-a"
                                                                                                 href="/">
                                                            <h1><span class="tdb-logo-img-wrap"><img
                                                                            class="tdb-logo-img"
                                                                            src="<?= $bundlePath;?>/crypto-logo/crypto_parrot_logo_red.png"
                                                                            alt="Logo" title="" width="272" height="90"/></span>
                                                            </h1></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_column_inner tdi_42  wpb_column vc_column_container tdc-inner-column td-pb-span8">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="td-a-rec td-a-rec-id-header  tdi_43 td_block_template_1">
                                                    <div class="walletBlock">
                                                        <button class="enableEthereumButton">Enable Ethereum</button>
                                                        <h6 class="showAccountLabel">Wallet: <span class="showAccount"></span>
<!--                                                            <div class="td_block_wrap tdb_header_search tdi_58 td-pb-border-top td_block_template_1 tdb-header-align" data-td-block-uid="tdi_58">-->
<!--                                                                <div class="tdb-block-inner td-fix-index">-->
<!--                                                                    <div class="tdb-drop-down-search" aria-labelledby="td-header-search-button" style="width: 1833px !important;">-->
<!--                                                                        <div class="tdb-drop-down-search-inner">-->
<!--                                                                            <form method="get" class="tdb-search-form" action="/">-->
<!--                                                                                <div class="tdb-search-form-inner"><input class="tdb-head-search-form-input" type="text" value="" name="s" autocomplete="off">-->
<!--                                                                                    <button class="wpb_button wpb_btn-inverse btn tdb-head-search-form-btn" type="submit"><span>Search</span><i class="tdb-head-search-form-btn-icon td-icon-menu-right"></i>-->
<!--                                                                                    </button>-->
<!--                                                                                </div>-->
<!--                                                                            </form>-->
<!--                                                                            <div class="tdb-aj-search"></div>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <a href="#" role="button" aria-label="Search" class="tdb-head-search-btn dropdown-toggle" data-toggle="dropdown"><span class="tdb-search-icon tdb-search-icon-svg"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024"><path d="M946.371 843.601l-125.379-125.44c43.643-65.925 65.495-142.1 65.475-218.040 0.051-101.069-38.676-202.588-115.835-279.706-77.117-77.148-178.606-115.948-279.644-115.886-101.079-0.061-202.557 38.738-279.665 115.876-77.169 77.128-115.937 178.627-115.907 279.716-0.031 101.069 38.728 202.588 115.907 279.665 77.117 77.117 178.616 115.825 279.665 115.804 75.94 0.020 152.136-21.862 218.061-65.495l125.348 125.46c30.915 30.904 81.029 30.904 111.954 0.020 30.915-30.935 30.915-81.029 0.020-111.974zM705.772 714.925c-59.443 59.341-136.899 88.842-214.784 88.924-77.896-0.082-155.341-29.583-214.784-88.924-59.443-59.484-88.975-136.919-89.037-214.804 0.061-77.885 29.604-155.372 89.037-214.825 59.464-59.443 136.878-88.945 214.784-89.016 77.865 0.082 155.3 29.583 214.784 89.016 59.361 59.464 88.914 136.919 88.945 214.825-0.041 77.885-29.583 155.361-88.945 214.804z"></path></svg></span></a>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
                                                        </h6>

                                                    </div>
<!--                                                    <div class="td-visible-desktop"><a-->
<!--                                                                href="http://themeforest.net/item/newspaper/5489609"-->
<!--                                                                rel="noopener" target="_blank"><img class=""-->
<!--                                                                                                    style="max-width: 728px;"-->
<!--                                                                                                    src="--><?//= $bundlePath; ?><!--/wp-content/uploads/2019/08/newspaper-rec728.jpg"-->
<!--                                                                                                    alt="tagDiv Newspaper Theme"-->
<!--                                                                                                    width="728"-->
<!--                                                                                                    height="90"></a>-->
<!--                                                    </div>-->
<!--                                                    <div class="td-visible-tablet-landscape"><a-->
<!--                                                                href="http://themeforest.net/item/newspaper/5489609"-->
<!--                                                                rel="noopener" target="_blank"><img class=""-->
<!--                                                                                                    style="max-width: 728px;"-->
<!--                                                                                                    src="--><?//= $bundlePath; ?><!--/wp-content/uploads/2019/08/newspaper-rec728.jpg"-->
<!--                                                                                                    alt="tagDiv Newspaper Theme"-->
<!--                                                                                                    width="728"-->
<!--                                                                                                    height="90"></a>-->
<!--                                                    </div>-->
<!--                                                    <div class="td-visible-tablet-portrait"><a-->
<!--                                                                href="http://themeforest.net/item/newspaper/5489609"-->
<!--                                                                rel="noopener" target="_blank"><img class=""-->
<!--                                                                                                    style="max-width:468px"-->
<!--                                                                                                    src="--><?//= $bundlePath; ?><!--/wp-content/uploads/2019/09/newspaper-rec468.jpg"-->
<!--                                                                                                    alt="tagDiv Newspaper Theme"-->
<!--                                                                                                    width="468"-->
<!--                                                                                                    height="60"></a>-->
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row_inner tdi_45  vc_row vc_inner wpb_row td-pb-row">
                                    <div class="vc_column_inner tdi_47  wpb_column vc_column_container tdc-inner-column td-pb-span12">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="td_block_wrap tdb_header_menu tdi_48 tds_menu_active1 tds_menu_sub_active1 tdb-head-menu-inline tdb-mm-align-screen td-pb-border-top td_block_template_1 tdb-header-align"
                                                     data-td-block-uid="tdi_48" style=" z-index: 999;">
                                                    <div id=tdi_48 class="td_block_inner td-fix-index">
                                                        <ul id="menu-main-menu-1"
                                                            class="tdb-block-menu tdb-menu tdb-menu-items-visible">
                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-256 current_page_item menu-item-first tdb-menu-item-button tdb-menu-item tdb-normal-menu menu-item-258">
                                                                <a href="/">
                                                                    <div class="tdb-menu-item-text">News</div>
                                                                </a></li>
                                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category tdb-menu-item-button tdb-menu-item tdb-mega-menu tdb-mega-menu-inactive tdb-mega-menu-cats-first menu-item-259">
                                                                <a href="/category/tagdiv-fashion/">
                                                                    <div class="tdb-menu-item-text">Fashion</div>
                                                                    <i class="tdb-sub-menu-icon td-icon-down"></i></a>
                                                                <ul class="sub-menu">
                                                                    <li class="menu-item-0">
                                                                        <div class="tdb-menu-item-text">
                                                                            <div class="tdb_header_mega_menu tdi_51 td_with_ajax_pagination td-pb-border-top td_block_template_1"
                                                                                 data-td-block-uid="tdi_51">
                                                                                <script>var block_tdi_51 = new tdBlock()
                                                                                  block_tdi_51.id = 'tdi_51'
                                                                                  block_tdi_51.atts = '{"main_sub_tdicon":"td-icon-down","sub_tdicon":"td-icon-right-arrow","mm_align_horiz":"content-horiz-center","modules_on_row_regular":"20%","modules_on_row_cats":"25%","image_size":"td_324x400","modules_category":"image","show_excerpt":"none","show_com":"none","show_date":"","show_author":"none","mm_sub_align_horiz":"content-horiz-right","mm_elem_align_horiz":"content-horiz-right","inline":"yes","menu_id":"26","mm_align_screen":"yes","f_elem_font_family":"","f_elem_font_size":"eyJwb3J0cmFpdCI6IjExIn0=","mm_width":"1300","mm_subcats_bg":"#ffffff","mm_elem_border_a":"0 1px 0 0","mm_elem_padd":"eyJhbGwiOiIycHggMjJweCIsInBvcnRyYWl0IjoiMCAxNHB4In0=","mm_sub_padd":"eyJhbGwiOiIxNnB4IDAiLCJwb3J0cmFpdCI6IjE0cHggMCJ9","f_title_font_size":"eyJhbGwiOiIxNSIsImxhbmRzY2FwZSI6IjE0IiwicG9ydHJhaXQiOiIxMyJ9","f_title_font_line_height":"1.2","art_title":"3px 0","f_mm_sub_font_size":"eyJhbGwiOiIxMyIsInBvcnRyYWl0IjoiMTEifQ==","mm_child_cats":"10","mm_elem_border":"0 1px 0 0","mm_height":"eyJhbGwiOiIzNDUiLCJsYW5kc2NhcGUiOiIzMDAiLCJwb3J0cmFpdCI6IjI0MCJ9","mm_sub_width":"eyJsYW5kc2NhcGUiOiIxNjAiLCJwb3J0cmFpdCI6IjE0MCJ9","mm_padd":"eyJwb3J0cmFpdCI6IjE0In0=","modules_gap":"eyJwb3J0cmFpdCI6IjE0In0=","elem_padd":"eyJwb3J0cmFpdCI6IjAgMTJweCJ9","f_elem_font_line_height":"eyJwb3J0cmFpdCI6IjQ4cHgifQ==","video_icon":"eyJwb3J0cmFpdCI6IjI0In0=","all_modules_space":"26","tds_menu_sub_active":"tds_menu_sub_active1","tds_menu_sub_active2-line_color":"","mc1_title_tag":"p","block_type":"tdb_header_mega_menu","show_subcat":"","show_mega":"","show_mega_cats":"","separator":"","width":"","more":"","float_right":"","align_horiz":"content-horiz-left","elem_space":"","main_sub_icon_size":"","main_sub_icon_space":"","main_sub_icon_align":"-1","sep_tdicon":"","sep_icon_size":"","sep_icon_space":"","sep_icon_align":"-1","more_txt":"","more_tdicon":"","more_icon_size":"","more_icon_align":"0","sub_width":"","sub_first_left":"","sub_rest_top":"","sub_padd":"","sub_align_horiz":"content-horiz-left","sub_elem_inline":"","sub_elem_space":"","sub_elem_padd":"","sub_elem_radius":"0","sub_icon_size":"","sub_icon_space":"","sub_icon_pos":"","sub_icon_align":"1","mm_content_width":"","mm_offset":"","mm_posts_limit":"5","mm_subcats_posts_limit":"4","mm_ajax_preloading":"","mm_hide_all_item":"","mm_sub_border":"","mm_sub_inline":"","mm_elem_order":"name","mm_elem_space":"","mm_elem_border_rad":"","mc1_tl":"","mc1_el":"","m_padding":"","modules_border_size":"","modules_border_style":"","modules_border_color":"#eaeaea","modules_divider":"","modules_divider_color":"#eaeaea","h_effect":"","image_alignment":"50","image_height":"","image_width":"","image_floated":"no_float","image_radius":"","hide_image":"","show_vid_t":"block","vid_t_margin":"","vid_t_padding":"","vid_t_color":"","vid_t_bg_color":"","f_vid_time_font_header":"","f_vid_time_font_title":"Video duration text","f_vid_time_font_settings":"","f_vid_time_font_family":"","f_vid_time_font_size":"","f_vid_time_font_line_height":"","f_vid_time_font_style":"","f_vid_time_font_weight":"","f_vid_time_font_transform":"","f_vid_time_font_spacing":"","f_vid_time_":"","show_audio":"block","hide_audio":"","art_audio":"","art_audio_size":"1","meta_info_align":"","meta_info_horiz":"content-horiz-left","meta_width":"","meta_margin":"","meta_padding":"","meta_info_border_size":"","meta_info_border_style":"","meta_info_border_color":"#eaeaea","modules_category_margin":"","modules_category_padding":"","modules_cat_border":"","modules_category_radius":"0","show_cat":"inline-block","author_photo":"","author_photo_size":"","author_photo_space":"","author_photo_radius":"","show_modified_date":"","time_ago":"","time_ago_add_txt":"ago","art_excerpt":"","excerpt_col":"1","excerpt_gap":"","excerpt_middle":"","show_review":"inline-block","review_space":"","review_size":"2.5","review_distance":"","show_pagination":"","pag_space":"","pag_padding":"","pag_border_width":"","pag_border_radius":"","prev_tdicon":"","next_tdicon":"","pag_icons_size":"","text_color":"","main_sub_color":"","sep_color":"","more_icon_color":"","tds_menu_active":"tds_menu_active1","hover_opacity":"","f_elem_font_header":"","f_elem_font_title":"Elements text","f_elem_font_settings":"","f_elem_font_style":"","f_elem_font_weight":"","f_elem_font_transform":"","f_elem_font_spacing":"","f_elem_":"","sub_bg_color":"","sub_border_size":"","sub_border_color":"","sub_text_color":"","sub_elem_bg_color":"","sub_color":"","sub_shadow_shadow_header":"","sub_shadow_shadow_title":"Shadow","sub_shadow_shadow_size":"","sub_shadow_shadow_offset_horizontal":"","sub_shadow_shadow_offset_vertical":"","sub_shadow_shadow_spread":"","sub_shadow_shadow_color":"","f_sub_elem_font_header":"","f_sub_elem_font_title":"Elements text","f_sub_elem_font_settings":"","f_sub_elem_font_family":"","f_sub_elem_font_size":"","f_sub_elem_font_line_height":"","f_sub_elem_font_style":"","f_sub_elem_font_weight":"","f_sub_elem_font_transform":"","f_sub_elem_font_spacing":"","f_sub_elem_":"","mm_bg":"","mm_border_size":"","mm_border_color":"","mm_shadow_shadow_header":"","mm_shadow_shadow_title":"Shadow","mm_shadow_shadow_size":"","mm_shadow_shadow_offset_horizontal":"","mm_shadow_shadow_offset_vertical":"","mm_shadow_shadow_spread":"","mm_shadow_shadow_color":"","mm_subcats_border_color":"","mm_elem_color":"","mm_elem_color_a":"","mm_elem_bg":"","mm_elem_bg_a":"","mm_elem_border_color":"","mm_elem_border_color_a":"","mm_elem_shadow_shadow_header":"","mm_elem_shadow_shadow_title":"Elements shadow","mm_elem_shadow_shadow_size":"","mm_elem_shadow_shadow_offset_horizontal":"","mm_elem_shadow_shadow_offset_vertical":"","mm_elem_shadow_shadow_spread":"","mm_elem_shadow_shadow_color":"","f_mm_sub_font_header":"","f_mm_sub_font_title":"Sub categories elements","f_mm_sub_font_settings":"","f_mm_sub_font_family":"","f_mm_sub_font_line_height":"","f_mm_sub_font_style":"","f_mm_sub_font_weight":"","f_mm_sub_font_transform":"","f_mm_sub_font_spacing":"","f_mm_sub_":"","m_bg":"","color_overlay":"","shadow_shadow_header":"","shadow_shadow_title":"Module Shadow","shadow_shadow_size":"","shadow_shadow_offset_horizontal":"","shadow_shadow_offset_vertical":"","shadow_shadow_spread":"","shadow_shadow_color":"","title_txt":"","title_txt_hover":"","all_underline_height":"","all_underline_color":"#000","cat_bg":"","cat_bg_hover":"","cat_txt":"","cat_txt_hover":"","cat_border":"","cat_border_hover":"","meta_bg":"","author_txt":"","author_txt_hover":"","date_txt":"","ex_txt":"","com_bg":"","com_txt":"","rev_txt":"","shadow_m_shadow_header":"","shadow_m_shadow_title":"Meta info shadow","shadow_m_shadow_size":"","shadow_m_shadow_offset_horizontal":"","shadow_m_shadow_offset_vertical":"","shadow_m_shadow_spread":"","shadow_m_shadow_color":"","audio_btn_color":"","audio_time_color":"","audio_bar_color":"","audio_bar_curr_color":"","pag_text":"","pag_h_text":"","pag_bg":"","pag_h_bg":"","pag_border":"","pag_h_border":"","f_title_font_header":"","f_title_font_title":"Article title","f_title_font_settings":"","f_title_font_family":"","f_title_font_style":"","f_title_font_weight":"","f_title_font_transform":"","f_title_font_spacing":"","f_title_":"","f_cat_font_title":"Article category tag","f_cat_font_settings":"","f_cat_font_family":"","f_cat_font_size":"","f_cat_font_line_height":"","f_cat_font_style":"","f_cat_font_weight":"","f_cat_font_transform":"","f_cat_font_spacing":"","f_cat_":"","f_meta_font_title":"Article meta info","f_meta_font_settings":"","f_meta_font_family":"","f_meta_font_size":"","f_meta_font_line_height":"","f_meta_font_style":"","f_meta_font_weight":"","f_meta_font_transform":"","f_meta_font_spacing":"","f_meta_":"","f_ex_font_title":"Article excerpt","f_ex_font_settings":"","f_ex_font_family":"","f_ex_font_size":"","f_ex_font_line_height":"","f_ex_font_style":"","f_ex_font_weight":"","f_ex_font_transform":"","f_ex_font_spacing":"","f_ex_":"","mix_color":"","mix_type":"","fe_brightness":"1","fe_contrast":"1","fe_saturate":"1","mix_color_h":"","mix_type_h":"","fe_brightness_h":"1","fe_contrast_h":"1","fe_saturate_h":"1","el_class":"","block_template_id":"","td_column_number":3,"header_color":"","ajax_pagination_infinite_stop":"","offset":"","limit":"4","td_ajax_preloading":"","td_ajax_filter_type":"td_category_ids_filter","td_filter_default_txt":"","td_ajax_filter_ids":"","color_preset":"","ajax_pagination":"next_prev","border_top":"","css":"","tdc_css_class":"tdi_51","tdc_css_class_style":"tdi_51_rand_style","category_id":"2","subcats_posts_limit":"4","child_cats_limit":"10","hide_all":"","tdc_css":"","class":"tdi_51"}'
                                                                                  block_tdi_51.td_column_number = '3'
                                                                                  block_tdi_51.block_type = 'tdb_header_mega_menu'
                                                                                  block_tdi_51.post_count = '4'
                                                                                  block_tdi_51.found_posts = '33'
                                                                                  block_tdi_51.header_color = ''
                                                                                  block_tdi_51.ajax_pagination_infinite_stop = ''
                                                                                  block_tdi_51.max_num_pages = '9'
                                                                                  tdBlocksArray.push(block_tdi_51)
                                                                                </script>
                                                                                <div class="block-mega-child-cats">
                                                                                    <a class="cur-sub-cat mega-menu-sub-cat-tdi_51"
                                                                                       id="tdi_52"
                                                                                       data-td_block_id="tdi_51"
                                                                                       data-td_filter_value=""
                                                                                       href="/category/tagdiv-fashion/">All</a><a
                                                                                            class="mega-menu-sub-cat-tdi_51"
                                                                                            id="tdi_53"
                                                                                            data-td_block_id="tdi_51"
                                                                                            data-td_filter_value="4"
                                                                                            href="/category/tagdiv-fashion/tagdiv-new-look/">New
                                                                                        Look</a><a
                                                                                            class="mega-menu-sub-cat-tdi_51"
                                                                                            id="tdi_54"
                                                                                            data-td_block_id="tdi_51"
                                                                                            data-td_filter_value="3"
                                                                                            href="/category/tagdiv-fashion/tagdiv-street-fashion/">Street
                                                                                        Fashion</a><a
                                                                                            class="mega-menu-sub-cat-tdi_51"
                                                                                            id="tdi_55"
                                                                                            data-td_block_id="tdi_51"
                                                                                            data-td_filter_value="5"
                                                                                            href="/category/tagdiv-fashion/tagdiv-style-hunter/">Style
                                                                                        Hunter</a><a
                                                                                            class="mega-menu-sub-cat-tdi_51"
                                                                                            id="tdi_56"
                                                                                            data-td_block_id="tdi_51"
                                                                                            data-td_filter_value="6"
                                                                                            href="/category/tagdiv-fashion/tagdiv-vogue/">Vogue</a>
                                                                                </div>
                                                                                <div class="tdb-mega-modules-wrap">
                                                                                    <div id=tdi_51
                                                                                         class="td_block_inner">
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-fashion/tagdiv-vogue/"
                                                                                                       class="td-post-category">Vogue</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/td-post-fashion-outfit-ideas-from-the-biggest-instagram-influencers/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="Fashion Outfit Ideas From the Biggest Instagram Influencers"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/23-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/td-post-fashion-outfit-ideas-from-the-biggest-instagram-influencers/"
                                                                                                           rel="bookmark"
                                                                                                           title="Fashion Outfit Ideas From the Biggest Instagram Influencers">Fashion
                                                                                                            Outfit
                                                                                                            Ideas
                                                                                                            From the
                                                                                                            Biggest
                                                                                                            Instagram
                                                                                                            Influencers</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:37+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-fashion/tagdiv-vogue/"
                                                                                                       class="td-post-category">Vogue</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/td-post-style-spy-fashion-model-goes-casual-in-faux-furr-and-plaid/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="Style Spy: Fashion Model Goes Casual in Faux Furr and Plaid"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/22-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/td-post-style-spy-fashion-model-goes-casual-in-faux-furr-and-plaid/"
                                                                                                           rel="bookmark"
                                                                                                           title="Style Spy: Fashion Model Goes Casual in Faux Furr and Plaid">Style
                                                                                                            Spy:
                                                                                                            Fashion
                                                                                                            Model
                                                                                                            Goes
                                                                                                            Casual
                                                                                                            in Faux
                                                                                                            Furr and
                                                                                                            Plaid</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:36+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-fashion/tagdiv-vogue/"
                                                                                                       class="td-post-category">Vogue</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/td-post-10-fabulous-over-the-ankle-shoes-to-wear-this-cold-season/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="10 Fabulous Over-the-ankle Shoes to Wear This Cold Season"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/21-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/td-post-10-fabulous-over-the-ankle-shoes-to-wear-this-cold-season/"
                                                                                                           rel="bookmark"
                                                                                                           title="10 Fabulous Over-the-ankle Shoes to Wear This Cold Season">10
                                                                                                            Fabulous
                                                                                                            Over-the-ankle
                                                                                                            Shoes to
                                                                                                            Wear
                                                                                                            This
                                                                                                            Cold
                                                                                                            Season</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:34+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-fashion/tagdiv-vogue/"
                                                                                                       class="td-post-category">Vogue</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/td-post-what-to-wear-on-gala-night-we-asked-the-biggest-names/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="What to Wear on Gala Night? We Asked the Biggest Names!"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/20-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/td-post-what-to-wear-on-gala-night-we-asked-the-biggest-names/"
                                                                                                           rel="bookmark"
                                                                                                           title="What to Wear on Gala Night? We Asked the Biggest Names!">What
                                                                                                            to Wear
                                                                                                            on Gala
                                                                                                            Night?
                                                                                                            We Asked
                                                                                                            the
                                                                                                            Biggest
                                                                                                            Names!</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:33+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="td-next-prev-wrap">
                                                                                        <a href="#"
                                                                                           class="td-ajax-prev-page ajax-page-disabled"
                                                                                           aria-label="prev-page"
                                                                                           id="prev-page-tdi_51"
                                                                                           data-td_block_id="tdi_51"><i
                                                                                                    class="td-next-prev-icon td-icon-font td-icon-menu-left"></i></a><a
                                                                                                href="#"
                                                                                                class="td-ajax-next-page"
                                                                                                aria-label="next-page"
                                                                                                id="next-page-tdi_51"
                                                                                                data-td_block_id="tdi_51"><i
                                                                                                    class="td-next-prev-icon td-icon-font td-icon-menu-right"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category tdb-menu-item-button tdb-menu-item tdb-mega-menu tdb-mega-menu-inactive tdb-mega-menu-first menu-item-856">
                                                                <a href="/category/tagdiv-technology/tagdiv-gadgets/">
                                                                    <div class="tdb-menu-item-text">Gadgets</div>
                                                                    <i class="tdb-sub-menu-icon td-icon-down"></i></a>
                                                                <ul class="sub-menu">
                                                                    <li class="menu-item-0">
                                                                        <div class="tdb-menu-item-text">
                                                                            <div class="tdb_header_mega_menu tdi_57 td-no-subcats td_with_ajax_pagination td-pb-border-top td_block_template_1"
                                                                                 data-td-block-uid="tdi_57">
                                                                                <script>var block_tdi_57 = new tdBlock()
                                                                                  block_tdi_57.id = 'tdi_57'
                                                                                  block_tdi_57.atts = '{"main_sub_tdicon":"td-icon-down","sub_tdicon":"td-icon-right-arrow","mm_align_horiz":"content-horiz-center","modules_on_row_regular":"20%","modules_on_row_cats":"25%","image_size":"td_324x400","modules_category":"image","show_excerpt":"none","show_com":"none","show_date":"","show_author":"none","mm_sub_align_horiz":"content-horiz-right","mm_elem_align_horiz":"content-horiz-right","inline":"yes","menu_id":"26","mm_align_screen":"yes","f_elem_font_family":"","f_elem_font_size":"eyJwb3J0cmFpdCI6IjExIn0=","mm_width":"1300","mm_subcats_bg":"#ffffff","mm_elem_border_a":"0 1px 0 0","mm_elem_padd":"eyJhbGwiOiIycHggMjJweCIsInBvcnRyYWl0IjoiMCAxNHB4In0=","mm_sub_padd":"eyJhbGwiOiIxNnB4IDAiLCJwb3J0cmFpdCI6IjE0cHggMCJ9","f_title_font_size":"eyJhbGwiOiIxNSIsImxhbmRzY2FwZSI6IjE0IiwicG9ydHJhaXQiOiIxMyJ9","f_title_font_line_height":"1.2","art_title":"3px 0","f_mm_sub_font_size":"eyJhbGwiOiIxMyIsInBvcnRyYWl0IjoiMTEifQ==","mm_child_cats":"10","mm_elem_border":"0 1px 0 0","mm_height":"eyJhbGwiOiIzNDUiLCJsYW5kc2NhcGUiOiIzMDAiLCJwb3J0cmFpdCI6IjI0MCJ9","mm_sub_width":"eyJsYW5kc2NhcGUiOiIxNjAiLCJwb3J0cmFpdCI6IjE0MCJ9","mm_padd":"eyJwb3J0cmFpdCI6IjE0In0=","modules_gap":"eyJwb3J0cmFpdCI6IjE0In0=","elem_padd":"eyJwb3J0cmFpdCI6IjAgMTJweCJ9","f_elem_font_line_height":"eyJwb3J0cmFpdCI6IjQ4cHgifQ==","video_icon":"eyJwb3J0cmFpdCI6IjI0In0=","all_modules_space":"26","tds_menu_sub_active":"tds_menu_sub_active1","tds_menu_sub_active2-line_color":"","mc1_title_tag":"p","block_type":"tdb_header_mega_menu","show_subcat":"","show_mega":"","show_mega_cats":"","separator":"","width":"","more":"","float_right":"","align_horiz":"content-horiz-left","elem_space":"","main_sub_icon_size":"","main_sub_icon_space":"","main_sub_icon_align":"-1","sep_tdicon":"","sep_icon_size":"","sep_icon_space":"","sep_icon_align":"-1","more_txt":"","more_tdicon":"","more_icon_size":"","more_icon_align":"0","sub_width":"","sub_first_left":"","sub_rest_top":"","sub_padd":"","sub_align_horiz":"content-horiz-left","sub_elem_inline":"","sub_elem_space":"","sub_elem_padd":"","sub_elem_radius":"0","sub_icon_size":"","sub_icon_space":"","sub_icon_pos":"","sub_icon_align":"1","mm_content_width":"","mm_offset":"","mm_posts_limit":"5","mm_subcats_posts_limit":"4","mm_ajax_preloading":"","mm_hide_all_item":"","mm_sub_border":"","mm_sub_inline":"","mm_elem_order":"name","mm_elem_space":"","mm_elem_border_rad":"","mc1_tl":"","mc1_el":"","m_padding":"","modules_border_size":"","modules_border_style":"","modules_border_color":"#eaeaea","modules_divider":"","modules_divider_color":"#eaeaea","h_effect":"","image_alignment":"50","image_height":"","image_width":"","image_floated":"no_float","image_radius":"","hide_image":"","show_vid_t":"block","vid_t_margin":"","vid_t_padding":"","vid_t_color":"","vid_t_bg_color":"","f_vid_time_font_header":"","f_vid_time_font_title":"Video duration text","f_vid_time_font_settings":"","f_vid_time_font_family":"","f_vid_time_font_size":"","f_vid_time_font_line_height":"","f_vid_time_font_style":"","f_vid_time_font_weight":"","f_vid_time_font_transform":"","f_vid_time_font_spacing":"","f_vid_time_":"","show_audio":"block","hide_audio":"","art_audio":"","art_audio_size":"1","meta_info_align":"","meta_info_horiz":"content-horiz-left","meta_width":"","meta_margin":"","meta_padding":"","meta_info_border_size":"","meta_info_border_style":"","meta_info_border_color":"#eaeaea","modules_category_margin":"","modules_category_padding":"","modules_cat_border":"","modules_category_radius":"0","show_cat":"inline-block","author_photo":"","author_photo_size":"","author_photo_space":"","author_photo_radius":"","show_modified_date":"","time_ago":"","time_ago_add_txt":"ago","art_excerpt":"","excerpt_col":"1","excerpt_gap":"","excerpt_middle":"","show_review":"inline-block","review_space":"","review_size":"2.5","review_distance":"","show_pagination":"","pag_space":"","pag_padding":"","pag_border_width":"","pag_border_radius":"","prev_tdicon":"","next_tdicon":"","pag_icons_size":"","text_color":"","main_sub_color":"","sep_color":"","more_icon_color":"","tds_menu_active":"tds_menu_active1","hover_opacity":"","f_elem_font_header":"","f_elem_font_title":"Elements text","f_elem_font_settings":"","f_elem_font_style":"","f_elem_font_weight":"","f_elem_font_transform":"","f_elem_font_spacing":"","f_elem_":"","sub_bg_color":"","sub_border_size":"","sub_border_color":"","sub_text_color":"","sub_elem_bg_color":"","sub_color":"","sub_shadow_shadow_header":"","sub_shadow_shadow_title":"Shadow","sub_shadow_shadow_size":"","sub_shadow_shadow_offset_horizontal":"","sub_shadow_shadow_offset_vertical":"","sub_shadow_shadow_spread":"","sub_shadow_shadow_color":"","f_sub_elem_font_header":"","f_sub_elem_font_title":"Elements text","f_sub_elem_font_settings":"","f_sub_elem_font_family":"","f_sub_elem_font_size":"","f_sub_elem_font_line_height":"","f_sub_elem_font_style":"","f_sub_elem_font_weight":"","f_sub_elem_font_transform":"","f_sub_elem_font_spacing":"","f_sub_elem_":"","mm_bg":"","mm_border_size":"","mm_border_color":"","mm_shadow_shadow_header":"","mm_shadow_shadow_title":"Shadow","mm_shadow_shadow_size":"","mm_shadow_shadow_offset_horizontal":"","mm_shadow_shadow_offset_vertical":"","mm_shadow_shadow_spread":"","mm_shadow_shadow_color":"","mm_subcats_border_color":"","mm_elem_color":"","mm_elem_color_a":"","mm_elem_bg":"","mm_elem_bg_a":"","mm_elem_border_color":"","mm_elem_border_color_a":"","mm_elem_shadow_shadow_header":"","mm_elem_shadow_shadow_title":"Elements shadow","mm_elem_shadow_shadow_size":"","mm_elem_shadow_shadow_offset_horizontal":"","mm_elem_shadow_shadow_offset_vertical":"","mm_elem_shadow_shadow_spread":"","mm_elem_shadow_shadow_color":"","f_mm_sub_font_header":"","f_mm_sub_font_title":"Sub categories elements","f_mm_sub_font_settings":"","f_mm_sub_font_family":"","f_mm_sub_font_line_height":"","f_mm_sub_font_style":"","f_mm_sub_font_weight":"","f_mm_sub_font_transform":"","f_mm_sub_font_spacing":"","f_mm_sub_":"","m_bg":"","color_overlay":"","shadow_shadow_header":"","shadow_shadow_title":"Module Shadow","shadow_shadow_size":"","shadow_shadow_offset_horizontal":"","shadow_shadow_offset_vertical":"","shadow_shadow_spread":"","shadow_shadow_color":"","title_txt":"","title_txt_hover":"","all_underline_height":"","all_underline_color":"#000","cat_bg":"","cat_bg_hover":"","cat_txt":"","cat_txt_hover":"","cat_border":"","cat_border_hover":"","meta_bg":"","author_txt":"","author_txt_hover":"","date_txt":"","ex_txt":"","com_bg":"","com_txt":"","rev_txt":"","shadow_m_shadow_header":"","shadow_m_shadow_title":"Meta info shadow","shadow_m_shadow_size":"","shadow_m_shadow_offset_horizontal":"","shadow_m_shadow_offset_vertical":"","shadow_m_shadow_spread":"","shadow_m_shadow_color":"","audio_btn_color":"","audio_time_color":"","audio_bar_color":"","audio_bar_curr_color":"","pag_text":"","pag_h_text":"","pag_bg":"","pag_h_bg":"","pag_border":"","pag_h_border":"","f_title_font_header":"","f_title_font_title":"Article title","f_title_font_settings":"","f_title_font_family":"","f_title_font_style":"","f_title_font_weight":"","f_title_font_transform":"","f_title_font_spacing":"","f_title_":"","f_cat_font_title":"Article category tag","f_cat_font_settings":"","f_cat_font_family":"","f_cat_font_size":"","f_cat_font_line_height":"","f_cat_font_style":"","f_cat_font_weight":"","f_cat_font_transform":"","f_cat_font_spacing":"","f_cat_":"","f_meta_font_title":"Article meta info","f_meta_font_settings":"","f_meta_font_family":"","f_meta_font_size":"","f_meta_font_line_height":"","f_meta_font_style":"","f_meta_font_weight":"","f_meta_font_transform":"","f_meta_font_spacing":"","f_meta_":"","f_ex_font_title":"Article excerpt","f_ex_font_settings":"","f_ex_font_family":"","f_ex_font_size":"","f_ex_font_line_height":"","f_ex_font_style":"","f_ex_font_weight":"","f_ex_font_transform":"","f_ex_font_spacing":"","f_ex_":"","mix_color":"","mix_type":"","fe_brightness":"1","fe_contrast":"1","fe_saturate":"1","mix_color_h":"","mix_type_h":"","fe_brightness_h":"1","fe_contrast_h":"1","fe_saturate_h":"1","el_class":"","block_template_id":"","td_column_number":3,"header_color":"","ajax_pagination_infinite_stop":"","offset":"","limit":"5","td_ajax_preloading":"","td_ajax_filter_type":"td_category_ids_filter","td_filter_default_txt":"","td_ajax_filter_ids":"","color_preset":"","ajax_pagination":"next_prev","border_top":"","css":"","tdc_css_class":"tdi_57","tdc_css_class_style":"tdi_57_rand_style","category_id":"8","subcats_posts_limit":"4","child_cats_limit":"10","hide_all":"","tdc_css":"","class":"tdi_57"}'
                                                                                  block_tdi_57.td_column_number = '3'
                                                                                  block_tdi_57.block_type = 'tdb_header_mega_menu'
                                                                                  block_tdi_57.post_count = '5'
                                                                                  block_tdi_57.found_posts = '15'
                                                                                  block_tdi_57.header_color = ''
                                                                                  block_tdi_57.ajax_pagination_infinite_stop = ''
                                                                                  block_tdi_57.max_num_pages = '3'
                                                                                  tdBlocksArray.push(block_tdi_57)
                                                                                </script>
                                                                                <div class="tdb-mega-modules-wrap">
                                                                                    <div id=tdi_57
                                                                                         class="td_block_inner">
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                                       class="td-post-category">Gadgets</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/td-post-sneak-peak-best-smart-home-gadgets-features-of-2020/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="Sneak Peak: Best Smart Home Gadgets &#038; Features of 2020"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/31-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/td-post-sneak-peak-best-smart-home-gadgets-features-of-2020/"
                                                                                                           rel="bookmark"
                                                                                                           title="Sneak Peak: Best Smart Home Gadgets &#038; Features of 2020">Sneak
                                                                                                            Peak:
                                                                                                            Best
                                                                                                            Smart
                                                                                                            Home
                                                                                                            Gadgets
                                                                                                            &#038;
                                                                                                            Features
                                                                                                            of
                                                                                                            2020</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:47+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                                       class="td-post-category">Gadgets</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/td-post-new-action-game-refreshed-with-a-premium-hi-fi-sound/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="New Action Game Refreshed With a Premium Hi-Fi Sound"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/30-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/td-post-new-action-game-refreshed-with-a-premium-hi-fi-sound/"
                                                                                                           rel="bookmark"
                                                                                                           title="New Action Game Refreshed With a Premium Hi-Fi Sound">New
                                                                                                            Action
                                                                                                            Game
                                                                                                            Refreshed
                                                                                                            With a
                                                                                                            Premium
                                                                                                            Hi-Fi
                                                                                                            Sound</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:46+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                                       class="td-post-category">Gadgets</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/td-post-snapdragon-super-chip-mounted-on-the-latest-photo-cameras/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="Snapdragon Super Chip Mounted on the Latest Photo Cameras"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/29-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/td-post-snapdragon-super-chip-mounted-on-the-latest-photo-cameras/"
                                                                                                           rel="bookmark"
                                                                                                           title="Snapdragon Super Chip Mounted on the Latest Photo Cameras">Snapdragon
                                                                                                            Super
                                                                                                            Chip
                                                                                                            Mounted
                                                                                                            on the
                                                                                                            Latest
                                                                                                            Photo
                                                                                                            Cameras</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:45+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                                       class="td-post-category">Gadgets</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/game-changing-virtual-reality-console-hits-the-market/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="Game Changing Virtual Reality Console Hits the Market"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/28-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/game-changing-virtual-reality-console-hits-the-market/"
                                                                                                           rel="bookmark"
                                                                                                           title="Game Changing Virtual Reality Console Hits the Market">Game
                                                                                                            Changing
                                                                                                            Virtual
                                                                                                            Reality
                                                                                                            Console
                                                                                                            Hits the
                                                                                                            Market</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:43+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tdb_module_header tdb_module_mm td_module_wrap td-animation-stack ">
                                                                                            <div class="td-module-container td-category-pos-image">
                                                                                                <div class="td-image-container">
                                                                                                    <a href="/category/tagdiv-technology/tagdiv-gadgets/"
                                                                                                       class="td-post-category">Gadgets</a>
                                                                                                    <div class="td-module-thumb">
                                                                                                        <a href="/td-post-discover-a-better-camera-for-your-youtube-account/"
                                                                                                           rel="bookmark"
                                                                                                           class="td-image-wrap "
                                                                                                           title="Discover a Better Camera for Your YouTube Account"><span
                                                                                                                    class="entry-thumb td-thumb-css"
                                                                                                                    data-type="css_image"
                                                                                                                    data-img-url="<?= $bundlePath;?>/wp-content/uploads/2019/08/27-324x400.jpg"></span></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="td-module-meta-info">
                                                                                                    <p class="entry-title td-module-title">
                                                                                                        <a href="/td-post-discover-a-better-camera-for-your-youtube-account/"
                                                                                                           rel="bookmark"
                                                                                                           title="Discover a Better Camera for Your YouTube Account">Discover
                                                                                                            a Better
                                                                                                            Camera
                                                                                                            for Your
                                                                                                            YouTube
                                                                                                            Account</a>
                                                                                                    </p>
                                                                                                    <div class="td-editor-date">
        <span class="td-author-date">
        <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2019-08-07T07:31:42+00:00">August 7, 2019</time></span> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="td-next-prev-wrap">
                                                                                        <a href="#"
                                                                                           class="td-ajax-prev-page ajax-page-disabled"
                                                                                           aria-label="prev-page"
                                                                                           id="prev-page-tdi_57"
                                                                                           data-td_block_id="tdi_57"><i
                                                                                                    class="td-next-prev-icon td-icon-font td-icon-menu-left"></i></a><a
                                                                                                href="#"
                                                                                                class="td-ajax-next-page"
                                                                                                aria-label="next-page"
                                                                                                id="next-page-tdi_57"
                                                                                                data-td_block_id="tdi_57"><i
                                                                                                    class="td-next-prev-icon td-icon-font td-icon-menu-right"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category tdb-menu-item-button tdb-menu-item tdb-normal-menu menu-item-261">
                                                                <a href="/category/tagdiv-lifestyle/">
                                                                    <div class="tdb-menu-item-text">Lifestyle</div>
                                                                </a></li>
                                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category tdb-menu-item-button tdb-menu-item tdb-normal-menu menu-item-262">
                                                                <a href="/category/tagdiv-video/">
                                                                    <div class="tdb-menu-item-text">Video</div>
                                                                </a></li>
                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item-button tdb-menu-item tdb-normal-menu menu-item-372 tdb-menu-item-inactive">
                                                                <a href="#">
                                                                    <div class="tdb-menu-item-text">Features</div>
                                                                    <i class="tdb-sub-menu-icon td-icon-down"></i></a>
                                                                <ul class="sub-menu">
                                                                    <li class="td-menu-badge-width menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item tdb-normal-menu menu-item-385 tdb-menu-item-inactive">
                                                                        <a target="_blank" rel="noreferrer"
                                                                           href="https://cloud.tagdiv.com/#/load/All">
                                                                            <div class="tdb-menu-item-text">Cloud
                                                                                Library<span class="td-menu-badge">1024+ Elements</span><span
                                                                                        class="td-menu-subtitle">One click Pre-made, fully customizable templates, sections, and elements</span><span
                                                                                        class="td-menu-border"></span>
                                                                            </div>
                                                                            <i class="tdb-sub-menu-icon td-icon-right-arrow"></i></a>
                                                                        <ul class="sub-menu">
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-386">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Headers">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Headers<span
                                                                                                class="td-menu-badge td-menu-badge-right">69</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-387">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Sections">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Sections<span
                                                                                                class="td-menu-badge td-menu-badge-right">195</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-388">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Blocks">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Blocks<span
                                                                                                class="td-menu-badge td-menu-badge-right">313</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-389">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Homepages">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Homepages<span
                                                                                                class="td-menu-badge td-menu-badge-right">58</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-390">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Single">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Single Templates<span
                                                                                                class="td-menu-badge td-menu-badge-right">80</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-391">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Category">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Category Templates<span
                                                                                                class="td-menu-badge td-menu-badge-right">49</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-392">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Author">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Author templates<span
                                                                                                class="td-menu-badge td-menu-badge-right">43</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-393">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/404">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        404 templates<span
                                                                                                class="td-menu-badge td-menu-badge-right">44</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-394">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Search">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Search templates<span
                                                                                                class="td-menu-badge td-menu-badge-right">41</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-395">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Pages">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Pages<span
                                                                                                class="td-menu-badge td-menu-badge-right">34</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-396">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/Footers">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Footers<span
                                                                                                class="td-menu-badge td-menu-badge-right">52</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2074">
                                                                                <a target="_blank"
                                                                                   href="https://cloud.tagdiv.com/#/load/Woo%20Shop%20Base">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Woo Shop Base<span
                                                                                                class="td-menu-badge td-menu-badge-right">7</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2075">
                                                                                <a target="_blank"
                                                                                   href="https://cloud.tagdiv.com/#/load/Woo%20Product">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Woo Product<span
                                                                                                class="td-menu-badge td-menu-badge-right">9</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2076">
                                                                                <a target="_blank"
                                                                                   href="https://cloud.tagdiv.com/#/load/Woo%20Archive">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Woo Archive<span
                                                                                                class="td-menu-badge td-menu-badge-right">8</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2077">
                                                                                <a target="_blank"
                                                                                   href="https://cloud.tagdiv.com/#/load/Woo%20Search">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Woo Search<span
                                                                                                class="td-menu-badge td-menu-badge-right">8</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-1098">
                                                                                <a rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/All">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Other<span
                                                                                                class="td-menu-badge td-menu-badge-right">50+</span>
                                                                                    </div>
                                                                                </a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item tdb-normal-menu menu-item-397 tdb-menu-item-inactive">
                                                                        <a href="#">
                                                                            <div class="tdb-menu-item-text">Premium
                                                                                Features
                                                                            </div>
                                                                            <i class="tdb-sub-menu-icon td-icon-right-arrow"></i></a>
                                                                        <ul class="sub-menu">
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-1816">
                                                                                <a href="/covid-19-shortcodes/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Covid-19 Shortcodes <span
                                                                                                class="td-menu-badge">New</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-1670">
                                                                                <a href="/modal-video-popup/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Modal Video Popup <span
                                                                                                class="td-menu-badge">New</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-1668">
                                                                                <a href="/td-post-major-deep-new-release-feelings-power-deep-house-mix/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Sticky Video Player <span
                                                                                                class="td-menu-badge">New</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item tdb-normal-menu menu-item-1419 tdb-menu-item-inactive">
                                                                                <a href="#">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        SoundCloud / Self-hosted
                                                                                        Audio
                                                                                    </div>
                                                                                    <i class="tdb-sub-menu-icon td-icon-right-arrow"></i></a>
                                                                                <ul class="sub-menu">
                                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-1421">
                                                                                        <a href="/dj-dark-chill-vibes/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                SoundCloud Single
                                                                                                Template
                                                                                            </div>
                                                                                        </a></li>
                                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-1474">
                                                                                        <a href="/td-post-the-quiet-city-winter-in-paris-by-andrew-julian/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                Self-hosted Single
                                                                                                Template
                                                                                            </div>
                                                                                        </a></li>
                                                                                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category tdb-menu-item tdb-normal-menu menu-item-1420">
                                                                                        <a href="/category/tagdiv-music/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                Music Category
                                                                                            </div>
                                                                                        </a></li>
                                                                                </ul>
                                                                            </li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-1152">
                                                                                <a href="/td-post-another-big-apartment-project-slated-for-broad-ripple-company/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Auto Loading Articles
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-449">
                                                                                <a href="/video-playlist/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Video Playlist <span
                                                                                                class="td-menu-badge">Updated</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-1097">
                                                                                <a href="/td-post-study-2020-fake-engagement-is-only-half-the-problem/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Gallery
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-1493">
                                                                                <a href="/block-header-1/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        18 Block Header Templates
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-430">
                                                                                <a href="/instagram-widget/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Instagram Block
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-434">
                                                                                <a href="/weather-widget/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Weather Block
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-442">
                                                                                <a href="/exchange-widget/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Exchange Block
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-438">
                                                                                <a href="/pinterest-widget/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Pinterest Block
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-1465">
                                                                                <a href="/row-dividers/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Row Dividers
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-401">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://tagdiv.com/newspaper-theme-typography-font-styles-blocks-shortcodes/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Responsive Typography
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-399">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://tagdiv.com/amp-newspaper-theme/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Google AMP
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item tdb-normal-menu menu-item-467 tdb-menu-item-inactive">
                                                                                <a href="#">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        More
                                                                                    </div>
                                                                                    <i class="tdb-sub-menu-icon td-icon-right-arrow"></i></a>
                                                                                <ul class="sub-menu">
                                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-418">
                                                                                        <a href="/mobile-menu/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                Mobile Menu
                                                                                            </div>
                                                                                        </a></li>
                                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-463">
                                                                                        <a href="/author-box/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                Author Box
                                                                                            </div>
                                                                                        </a></li>
                                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-470">
                                                                                        <a href="/image-box/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                Image Box
                                                                                            </div>
                                                                                        </a></li>
                                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-1466">
                                                                                        <a href="/fixed-image-background/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                Fixed Image
                                                                                                Background
                                                                                            </div>
                                                                                        </a></li>
                                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-1467">
                                                                                        <a href="/background-parallax/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                Background Parallax
                                                                                            </div>
                                                                                        </a></li>
                                                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-1468">
                                                                                        <a href="/video-background/">
                                                                                            <div class="tdb-menu-item-text">
                                                                                                Video Background
                                                                                            </div>
                                                                                        </a></li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-400">
                                                                        <a target="_blank" rel="noreferrer"
                                                                           href="https://demo.tagdiv.com/newspaper_crypto/buttons/">
                                                                            <div class="tdb-menu-item-text">
                                                                                Multipurpose Elements
                                                                            </div>
                                                                        </a></li>
                                                                    <li class="td-menu-badge-width menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item tdb-normal-menu menu-item-1487 tdb-menu-item-inactive">
                                                                        <a href="#">
                                                                            <div class="tdb-menu-item-text">Premium
                                                                                Plugins <span class="td-menu-badge">Included</span>
                                                                            </div>
                                                                            <i class="tdb-sub-menu-icon td-icon-right-arrow"></i></a>
                                                                        <ul class="sub-menu">
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-1491">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://tagdiv.com/category/documentation/tagdiv-composer/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Composer
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-1488">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://cloud.tagdiv.com/#/load/All">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Cloud Library
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-413">
                                                                                <a target="_blank"
                                                                                   href="/mobile-theme/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Mobile Theme<span
                                                                                                class="td-menu-badge">AMP Support</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2087">
                                                                                <a target="_blank"
                                                                                   href="https://tagdiv.com/how-to-build-an-ecommerce-website-with-newspaper-theme/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Shop
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2086">
                                                                                <a target="_blank"
                                                                                   href="https://tagdiv.com/newspaper-11-2/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Opt-in Builder
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page tdb-menu-item tdb-normal-menu menu-item-424">
                                                                                <a href="/social-counter-widget/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Social Counter
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-402">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_crypto/newsletter/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Newsletter
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-1489">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://tagdiv.com/newspaper-theme-update-standard-pack-or-tagdiv-cloud-templates/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        tagDiv Standard Pack
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-1492">
                                                                                <a target="_blank" rel="noreferrer"
                                                                                   href="https://demo.tagdiv.com/newspaper_politics/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Revolution Slider
                                                                                    </div>
                                                                                </a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item tdb-normal-menu menu-item-600 tdb-menu-item-inactive">
                                                                        <a href="#">
                                                                            <div class="tdb-menu-item-text">Smart
                                                                                Lists
                                                                            </div>
                                                                            <i class="tdb-sub-menu-icon td-icon-right-arrow"></i></a>
                                                                        <ul class="sub-menu">
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-836">
                                                                                <a href="/top-interior-design-in-2020-new-york-business/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        One page Smart List 1
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-837">
                                                                                <a href="/most-popular-recipes-you-need-to-try-in-2020/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        One page Smart List 2
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-838">
                                                                                <a href="/top-shared-images-and-videos-in-your-instagram/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        One page Smart List 3
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-839">
                                                                                <a href="/td-post-china-helps-the-smartphone-production-reach-record-levels/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Smart List 4 with Pagination
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-840">
                                                                                <a href="/td-post-10-fabulous-over-the-ankle-shoes-to-wear-this-cold-season/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Smart List 5 with Pagination
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-841">
                                                                                <a href="/td-post-kim-selfie-book-available-for-pre-order-walks-her-last-runway/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Dropdown Smart List 6
                                                                                    </div>
                                                                                </a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item tdb-normal-menu menu-item-1117 tdb-menu-item-inactive">
                                                                        <a href="#">
                                                                            <div class="tdb-menu-item-text">
                                                                                Reviews
                                                                            </div>
                                                                            <i class="tdb-sub-menu-icon td-icon-right-arrow"></i></a>
                                                                        <ul class="sub-menu">
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-1116">
                                                                                <a href="/td-post-cisco-knows-its-routers-are-the-fastest-ever-for-desktop-pcs/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Sidebar Stars Review
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-1114">
                                                                                <a href="/td-post-this-new-headphone-from-sony-cancel-out-almost-every-background/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Points Review
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-post_type menu-item-object-post tdb-menu-item tdb-normal-menu menu-item-1115">
                                                                                <a href="/td-post-laptop-with-128-bit-processor-32gb-of-ram-and-24mp-front-camera/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Stars Review
                                                                                    </div>
                                                                                </a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children tdb-menu-item tdb-normal-menu menu-item-1642 tdb-menu-item-inactive">
                                                                        <a target="_blank" rel="noreferrer"
                                                                           href="https://demo.tagdiv.com/newspaper_shop_kids_store/">
                                                                            <div class="tdb-menu-item-text">
                                                                                WooCommerce <span
                                                                                        class="td-menu-badge">Shop</span>
                                                                            </div>
                                                                            <i class="tdb-sub-menu-icon td-icon-right-arrow"></i></a>
                                                                        <ul class="sub-menu">
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2078">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_shop_kids_store/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Kids Store<span
                                                                                                class="td-menu-badge">Demo</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2079">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_shop_blog_gadgets/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Gadgets Blog &#038;
                                                                                        Shop<span
                                                                                                class="td-menu-badge">Demo</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2080">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_shop_audio/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Audio Shop<span
                                                                                                class="td-menu-badge">Demo</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2081">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_shop_vintage_choppers_store/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Vintage Choppers Store<span
                                                                                                class="td-menu-badge">Demo</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2082">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_shop_apocryph/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Apocryph Shop<span
                                                                                                class="td-menu-badge">Demo</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2083">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_shop_watches_store/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Watches Shop<span
                                                                                                class="td-menu-badge">Demo</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2084">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_shop_vaness/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Vaness Shop<span
                                                                                                class="td-menu-badge">Demo</span>
                                                                                    </div>
                                                                                </a></li>
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom tdb-menu-item tdb-normal-menu menu-item-2085">
                                                                                <a target="_blank"
                                                                                   href="https://demo.tagdiv.com/newspaper_shop_makeup/">
                                                                                    <div class="tdb-menu-item-text">
                                                                                        Makeup Shop<span
                                                                                                class="td-menu-badge">Demo</span>
                                                                                    </div>
                                                                                </a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="td_block_wrap tdb_header_search tdi_58 td-pb-border-top td_block_template_1 tdb-header-align"
                                                     data-td-block-uid="tdi_58">
                                                    <div class="tdb-block-inner td-fix-index">
                                                        <div class="tdb-drop-down-search"
                                                             aria-labelledby="td-header-search-button">
                                                            <div class="tdb-drop-down-search-inner">
                                                                <form method="get" class="tdb-search-form"
                                                                      action="/">
                                                                    <div class="tdb-search-form-inner"><input
                                                                                class="tdb-head-search-form-input"
                                                                                type="text" value="" name="s"
                                                                                autocomplete="off"/>
                                                                        <button class="wpb_button wpb_btn-inverse btn tdb-head-search-form-btn"
                                                                                type="submit"><span>Search</span><i
                                                                                    class="tdb-head-search-form-btn-icon td-icon-menu-right"></i>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                                <div class="tdb-aj-search"></div>
                                                            </div>
                                                        </div>
                                                        <a href="#" role="button" aria-label="Search"
                                                           class="tdb-head-search-btn dropdown-toggle"
                                                           data-toggle="dropdown"><span
                                                                    class="tdb-search-icon tdb-search-icon-svg"><svg
                                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 1024 1024"><path
                                                                            d="M946.371 843.601l-125.379-125.44c43.643-65.925 65.495-142.1 65.475-218.040 0.051-101.069-38.676-202.588-115.835-279.706-77.117-77.148-178.606-115.948-279.644-115.886-101.079-0.061-202.557 38.738-279.665 115.876-77.169 77.128-115.937 178.627-115.907 279.716-0.031 101.069 38.728 202.588 115.907 279.665 77.117 77.117 178.616 115.825 279.665 115.804 75.94 0.020 152.136-21.862 218.061-65.495l125.348 125.46c30.915 30.904 81.029 30.904 111.954 0.020 30.915-30.935 30.915-81.029 0.020-111.974zM705.772 714.925c-59.443 59.341-136.899 88.842-214.784 88.924-77.896-0.082-155.341-29.583-214.784-88.924-59.443-59.484-88.975-136.919-89.037-214.804 0.061-77.885 29.604-155.372 89.037-214.825 59.464-59.443 136.878-88.945 214.784-89.016 77.865 0.082 155.3 29.583 214.784 89.016 59.361 59.464 88.914 136.919 88.945 214.825-0.041 77.885-29.583 155.361-88.945 214.804z"></path></svg></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="td-header-desktop-sticky-wrap tdc-zone-sticky-invisible tdc-zone-sticky-inactive"
         style="display: none">
        <div id="tdi_59" class="tdc-zone">
            <div class="tdc_zone tdi_60  wpb_row td-pb-row" data-sticky-offset="0">
                <div id="tdi_61" class="tdc-row">
                    <div class="vc_row tdi_62  wpb_row td-pb-row">
                        <div class="vc_column tdi_64  wpb_column vc_column_container tdc-column td-pb-span12">
                            <div class="wpb_wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<!-- HEADER -->
<!---->
<!--<div id="divHeaderWrapper">-->
<!--    <header class="header-standard-2">-->
<!--        <!-- MAIN NAV -->
<!--        <div class="navbar navbar-wp navbar-arrow mega-nav" role="navigation">-->
<!--            <div class="container">-->
<!--                <div class="navbar-header">-->
<!--                    <!--<button type="button" class="navbar-toggle navbar-toggle-aside-menu">-->
<!--                        <i class="fa fa-outdent icon-custom"></i>-->
<!--                    </button>-->
<!--                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">-->
<!--                        <i class="fa fa-bars icon-custom"></i>-->
<!--                    </button>-->
<!---->
<!--                    <a class="navbar-brand" href="-->
<?php //echo \yii\helpers\Url::home(); ?><!--" title="Стоматологическая клиника АДРИА">-->
<!---->
<!--                        --><?php //echo \common\modules\cms\cmsWidgets\text\TextCmsWidget::widget([
//                        'namespace'         => 'header-logo',
//                        'text'              => <<<HTML
//                        <img src="/img/logo.png" style="float: left;" />
//
//                        <span style="float: left; margin-top: 12px; margin-left: 10px;">
//                            <span style="color: #006EEB; font-weight: bold;">SkeekS</span>.com
//                        </span>
//HTML
//        ,
//                    ]); ?>
<!---->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                --><?php //echo \common\modules\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
//                    'namespace'      => 'menu-top',
//                    'viewFile'       => '@template/widgets/TreeMenuCmsWidget/menu-top.php',
//                    'label'          => '',
//                    'level'          => '1',
//                    'enabledRunCache'=> \common\modules\cms\components\Cms::BOOL_N,
//                ]); ?>
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </header>-->
<!---->
<!--</div>-->



