<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\modules\system\models\SystemLog;
use common\modules\widget\src\MainSidebarMenu;
use common\modules\system\models\TimelineEvent;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\log\Logger;
use yii\helpers\Url;
use \yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var string $content
 */
//$bundleUnifyPath = \common\modules\cms\modules\themeunify\admin\assets\UnifyAdminAppAsset::register($this);
$bundlePath = \backend\assets\AdminlteAsset::register($this);
$bundle = Yii::$app->getAssetManager()->getBundle('backend\assets\AdminlteAsset')->baseUrl;
//$bundleUnify = Yii::$app->getAssetManager()->getBundle('common\modules\cms\modules\themeunify\admin\assets\UnifyAdminAppAsset')->baseUrl;


\common\modules\cms\widgets\user\UserOnlineTriggerWidget::widget();


Yii::info(Yii::$app->components["i18n"]["translations"]['*']['class'], 'test');

$keyStorage = Yii::$app->keyStorage;

$logEntries = [
    [
        'label' => Yii::t('backend', 'You have {num} log items', ['num' => SystemLog::find()->count()]),
        'linkOptions' => ['class' => ['dropdown-item', 'dropdown-header']]
    ],
    '<div class="dropdown-divider"></div>',
];
foreach (SystemLog::find()->orderBy(['log_time' => SORT_DESC])->limit(5)->all() as $logEntry) {
    $logEntries[] = [
        'label' => FAS::icon('exclamation-triangle', ['class' => [$logEntry->level === Logger::LEVEL_ERROR ? 'text-red' : 'text-yellow']]) . ' ' . $logEntry->category,
        'url' => ['/system/log/view', 'id' => $logEntry->id]
    ];
    $logEntries[] = '<div class="dropdown-divider"></div>';
}

$logEntries[] = [
    'label' => Yii::t('backend', 'View all'),
    'url' => ['/admin/system/log'],
    'linkOptions' => ['class' => ['dropdown-item', 'dropdown-footer']]
];

$companyEntries = [
    [
        'label' => "Доступные компании ",
        'linkOptions' => ['class' => ['dropdown-item', 'dropdown-header']]
    ],
    '<div class="dropdown-divider"></div>',
];


$this->params['body-class'] = $this->params['body-class'] ?? null;
$keyStorage = Yii::$app->keyStorage;
$this->registerLinkTag(['rel' => 'shortcut icon', 'type' => 'image/x-icon', 'href' => Url::to($bundlePath->baseUrl . '/favicon.ico')]);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Url::to($bundlePath->baseUrl . '/favicon.png')]);
$this->registerJs(<<< JS
    $(function () {
        $("[data-toggle='tooltip']").tooltip();
       // $("[data-toggle='modal']").modal();
        $("[data-toggle='popover']").popover(); 
        $('.dropdown-toggle').dropdown();
    });
    $(document).on('pjax:success', function() {
        $("[data-toggle='tooltip']").tooltip();
       // $("[data-toggle='modal']").modal();
        $("[data-toggle='popover']").popover(); 
        $('.dropdown-toggle').dropdown();
    });
    
    $('.table').addClass('table-hover');
    $(document).on('pjax:success', function() {
        $('.table').addClass('table-hover');
    });
JS
);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <?php $this->registerCsrfMetaTags() ?>

    <title><?= Html::encode($this->title . ' — ITLO.CMS') ?></title>

    <?php $this->head() ?>

</head>
<?php echo Html::beginTag('body', [
    'class' => implode(' ', [
        ArrayHelper::getValue($this->params, 'body-class'),
        'dashboard',
        (YII_ENV_DEV) ? 'env-dev' : '',
        'layout-navbar-fixed layout-fixed',
        \common\modules\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isEmptyLayout ? "sx-empty" : "",
        $keyStorage->get('adminlte.sidebar-fixed') ? 'layout-fixed' : null,
        $keyStorage->get('adminlte.sidebar-mini') ? 'sidebar-mini' : null,
        $keyStorage->get('adminlte.sidebar-collapsed') ? 'sidebar-collapse' : null,
        $keyStorage->get('adminlte.navbar-fixed') ? 'layout-navbar-fixed' : null,
        $keyStorage->get('adminlte.body-small-text') ? 'text-sm' : null,
        $keyStorage->get('adminlte.footer-fixed') ? 'layout-footer-fixed' : null,
    ]),
])?>

    <?php $this->beginBody() ?>

        <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= $bundle;?>/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>


    <!-- navbar -->
    <?php NavBar::begin([
        'renderInnerContainer' => false,

        'options' => [
            'class' => [
                'main-header',
                'navbar-inverse',
                'navbar-fixed-top',
                'navbar',
                'navbar-expand',
                'navbar-white',
                'navbar-light',
                $keyStorage->get('adminlte.navbar-no-border') ? 'border-bottom-0' : null,
                $keyStorage->get('adminlte.navbar-small-text') ? 'text-sm' : null,
            ],
        ],
    ]);


    if (!is_null(Yii::$app->dashboard->search))
        $str = $this->render('_search');
    else $str = '';

    $str1 = '<li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                  <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                  <form class="form-inline">
                    <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>';

    $items = [
            $str,

        '<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="'.$bundle.'/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="'.$bundle.'/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="'.$bundle.'/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>',
        '<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>',
//        [
//            // log events
//            'label' => FAS::icon('building') . " <span id='currentCompany'>".Yii::$app->user->identity->userProfile->getCurrentCompanyName() ."</span>" ,
//            'url' => '#',
//            'linkOptions' => ['class' => ['no-caret']],
//            'dropdownOptions' => [
//                'class' => ['dropdown-menu', 'dropdown-menu-lg', 'dropdown-menu-right'],
//            ],
//            'items' => $companyEntries,
//            'visible' => !Yii::$app->user->can('doctor')?  true : false
//        ],

        [
            // timeline events
            'label' => FAR::icon('bell') . ' <span class="badge badge-success navbar-badge">' . TimelineEvent::find()->today()->count() . '</span>',
            'url' => ['/admin/system/timeline-event']
        ],
        [
            // log events
            'label' => FAS::icon('clipboard-list') . ' <span class="badge badge-warning navbar-badge">' . SystemLog::find()->count() . '</span>',
            'url' => '#',
            'linkOptions' => ['class' => ['no-caret']],
            'dropdownOptions' => [
                'class' => ['dropdown-menu', 'dropdown-menu-lg', 'dropdown-menu-right'],
            ],
            'items' => $logEntries,
        ],
        '<li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        ' .
         //Html::img(Yii::$app->user->identity->userProfile->getAvatar('/backend/web/img/anonymous.png'), ['class' => ['img-circle', 'elevation-2', 'bg-white', 'user-image'], 'alt' => 'User image'])
          '
                        ' .
        '<i class="fas fa-user"></i>' //Html::tag('span', Yii::$app->user->identity->getPublicIdentity(), ['class' => ['d-none', 'd-md-inline']])
        . '
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            '
        //Html::img(Yii::$app->user->identity->userProfile->getAvatar('/backend/web/img/anonymous.png'), ['class' => ['img-circle', 'elevation-2', 'bg-white'], 'alt' => 'User image'])
        . '
                            <p>
                                ' .
       // Yii::$app->user->identity->publicIdentity .
        '
                                
                                <small>' . Yii::t('app/modules/admin', 'Member since {date}', ['date'=> '2021-12-01'
        //    Yii::$app->user->identity->created_at
        ]) . '</small>
                               
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="float-left">
                                ' . Html::a(Yii::t('app/modules/admin', 'Profile'), ['/user/profile','id'=>Yii::$app->user->getId()], ['class' => 'btn btn-default btn-flat']) . '
                            </div>
                            <div class="float-left">
                                ' . Html::a(Yii::t('app/modules/admin', 'Account'), ['/user/update', 'id'=>Yii::$app->user->getId()], ['class' => 'btn btn-default btn-flat']) . '
                            </div>
                            <div class="float-right">
                                ' . Html::a(Yii::t('app/modules/admin', 'CMS Profile'), ['/cms/admin-profile'], ['class' => 'btn btn-default btn-flat', 'data-method' => 'post']) . '
                            </div>
                        </li>
                    </ul>
                </li>',
        '<li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a>
              </li>',
        [
            // control sidebar button
            'label' => FAS::icon('th-large'),
            'url' => '#',
            'linkOptions' => [
                'data' => ['widget' => 'control-sidebar', 'slide' => 'true'],
                'role' => 'button'
            ],
            // 'visible' => Yii::$app->user->can('admin'),
        ],

    ];

    $items[] = [
        'label' => FAS::icon('external-link-alt'),
        'url' => '/',
        'options'=>[
            'id'=>'messagesInvoker',
           // 'class'=> 'd-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20',
        ],
        'linkOptions' => [
            'target' => '_blank',
            'title'=> \Yii::t('skeeks/cms', 'To main page of site')
        ]


    ];?>



            <?php if (\Yii::$app->user->can('cms/admin-clear')) : ?>

                <?php
                $clearCacheOptions = \yii\helpers\Json::encode([
                    'backend' => \common\modules\cms\helpers\UrlHelper::construct(['/cms/admin-clear/index'])->enableAdmin()->toString(),
                ]);

                $this->registerJs(<<<JS
(function(sx, $, _)
{
  
    sx.classes.ClearCache = sx.classes.Component.extend({

        execute: function(code)
        {
            this.ajaxQuery = sx.ajax.preparePostQuery(this.get('backend'), {
                'code' : code
            });

            var Handler = new sx.classes.AjaxHandlerStandartRespose(this.ajaxQuery, {
                'enableBlocker'                      : true,
                'blockerSelector'                    : 'body',
            });

            this.ajaxQuery.execute();
        }
    });

    sx.ClearCache = new sx.classes.ClearCache({$clearCacheOptions});

})(sx, sx.$, sx._);
JS
                );
                $items[] = [
                    'label' => FAS::icon('sync'), // \Yii::t('skeeks/cms', 'Clear cache and temporary files')
                    'url' => '#',
                    // id="messagesInvoker" class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20"                 href="#" onclick="sx.ClearCache.execute(); return false;"
                ];
                ?>

            <?php endif; ?>

    <?php if (\Yii::$app->user->can('cms/admin-settings')) :
          $items[] = [
              'label' => FAS::icon('cog'),
              'url' => \yii\helpers\Url::to(['/cms/admin-settings']),
              //alt title="<?= \Yii::t('skeeks/cms', 'Project settings')
          ];



     endif;



    if ($createMenuItems = Yii::$app->dashboard->getCreateMenuItems()) {
        $items[] = [
            'label' => '<span class="fa fa-fw fa-plus"></span> ' . Yii::t('app/modules/admin', 'Add new'),
            'items' => $createMenuItems
        ];
    }

    if (Yii::$app->getModule('admin/terminal', false))
        $items[] = [
            'label' => '<span class="fa fa-fw fa-terminal"></span> ' . Yii::t('app/modules/admin', 'Terminal'),
            'url' => '#terminal'
        ];


    if (isset($this->params['langs'])) {
        $items[] = [
            'label' => '<span class="fa fa-fw fa-language"></span> ' . Yii::t('app/modules/admin', 'Language'),
            'items' => $this->params['langs']
        ];
    }

    if (Yii::$app->user->isGuest)
        $items[] = [
            'label' => '<span class="fa fa-fw fa-sign-in-alt"></span> ' . Yii::t('app/modules/admin', 'Login'),
            'url' => ['/admin/admin/login']
        ];
    else
        $items[] = [
            'label' => '<span class="fa fa-fw fa-user-circle"></span> ' . Yii::t('app/modules/admin', 'User') . ' (' . Yii::$app->user->identity->username . ')',
            'items' => [
                [
                    'label' => '<span class="fa fa-fw fa-user"></span> ' . Yii::t('app/modules/admin', 'Profile') ,
                    'url' =>  \common\modules\cms\helpers\UrlHelper::construct('cms/admin-profile/update')->setCurrentRef() ,
                   // 'linkOptions' => ['data-method' => 'post']
                ],
                    [
                        'label' => '<span class="fa fa-fw fa-lock"></span> ' . Yii::t('app/modules/admin', 'Lock') ,
                        'url' =>  \common\modules\cms\helpers\UrlHelper::construct('adm/admin-auth/lock')->setCurrentRef() ,
                        'linkOptions' => ['data-method' => 'post']
                    ],
                    [
                        'label' => '<span class="fa fa-fw fa-exchange-alt"></span> ' . Yii::t('app/modules/admin', 'Logout') ,
                        'url' => ['/admin/admin/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],

            ],

        ];


    ?>


    <!-- left navbar links -->
    <?php echo Nav::widget([
        'options' => ['class' => ['navbar-nav']],
        'encodeLabels' => false,
        'items' => [
            [
                // sidebar menu toggler
                'label' => FAS::icon('bars'),
                'url' => '#',
                'options' => [
                    'data' => ['widget' => 'pushmenu'],
                    'role' => 'button',
                ]
            ],
            ' <li class="nav-item d-none d-sm-inline-block">
            <a href="/backend/web/site/adminlte" class="nav-link">AdminLTE</a>
          </li>',
            '<li class="nav-item d-none d-sm-inline-block">
            <a href="/backend/web/site/butterfly" class="nav-link">ButterFly</a>
          </li>'
        ]
    ]); ?>
    <!-- /left navbar links -->

    <!-- right navbar links -->
    <?php echo Nav::widget([
        'options' => ['class' => ['navbar-nav', 'ml-auto']],
        'encodeLabels' => false,
        'items' => $items
    ]); ?>
    <!-- /right navbar links -->

    <?php NavBar::end();
    //    echo \yii\bootstrap4\Progress::widget([
    //        'id' => 'requestProgress',
    //        'percent' => 0,
    //        'options' => ['style' => 'display: none;'],
    //        'barOptions' => ['class' => 'progress-bar-info']
    //    ]);?>
    <!-- /navbar -->



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/backend/web/admin/admin/modules" class="brand-link">
            <img src="<?= $bundle;?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">&nbsp;&nbsp;ITLO CMS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo $bundle;?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?php echo  \yii\helpers\Url::to(['/user/profile','id'=>Yii::$app->user->getId()]);?>" class="d-block">
                        <?php echo Yii::$app->user->getIdentity();?>
                    </a>
                </div>
            </div>

            <!-- SidebarSearch Form -->

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">

<!--                --><?php //echo Nav::widget([
//                    'id' => 'sidebarNav',
//                    'options' => [
//                        'class' => [
//                            'nav',
//                            'nav-pills',
//                            'nav-sidebar',
//                            'flex-column',
//                            $keyStorage->get('adminlte.sidebar-small-text') ? 'text-sm' : null,
//                            $keyStorage->get('adminlte.sidebar-flat') ? 'nav-flat' : null,
//                            $keyStorage->get('adminlte.sidebar-legacy') ? 'nav-legacy' : null,
//                            $keyStorage->get('adminlte.sidebar-compact') ? 'nav-compact' : null,
//                            $keyStorage->get('adminlte.sidebar-child-indent') ? 'nav-child-indent' : null,
//                        ],
//                        'data' => [
//                            'widget' => 'treeview',
//                            'accordion' => 'false'
//                        ],
//                        'role' => 'menu',
//                    ],
//                    'items' => Yii::$app->dashboard->getSidebarMenuItems(),
//                    'activateParents' => true,
////                    'dropDownCaret' => '<span class="fa fa-fw fa-angle-down"></span>',
//                    'encodeLabels' => false
//                ]); ?>
                <?php echo MainSidebarMenu::widget([
                    'id' => 'sidebarNav',
                    'options' => [
                        'class' => [
                            'nav',
                            'nav-pills',
                            'nav-sidebar',
                            'flex-column',
                            $keyStorage->get('adminlte.sidebar-small-text') ? 'text-sm' : null,
                            $keyStorage->get('adminlte.sidebar-flat') ? 'nav-flat' : null,
                            $keyStorage->get('adminlte.sidebar-legacy') ? 'nav-legacy' : null,
                            $keyStorage->get('adminlte.sidebar-compact') ? 'nav-compact' : null,
                            $keyStorage->get('adminlte.sidebar-child-indent') ? 'nav-child-indent' : null,
                        ],
                        'data' => [
                            'widget' => 'treeview',
                            'accordion' => 'false'
                        ],
                        'role' => 'menu',
                    ],
                    'activateParents' => true,
                    'encodeLabels' => false,
                    'items' => Yii::$app->dashboard->getSidebarMenuItems2()
 ,

                ]) ?>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
            <?php $clas = isset($this->context->action)?$this->context->action->id:'';?>
    <div class="content-wrapper <?= 'module-' . isset($this->context->module)?$this->context->module->id:''; ?> <?= 'action-' . $clas ?>">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?php echo Html::encode($this->title) ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <?php echo Breadcrumbs::widget([
                            'tag' => 'ol',
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => ['class' => ['breadcrumb', 'float-sm-right']]
                        ]) ?>

                        <!--                        <ol class="breadcrumb float-sm-right">-->
                        <!--                            <li class="breadcrumb-item"><a href="#">Home</a></li>-->
                        <!--                            <li class="breadcrumb-item active">Dashboard v2</li>-->
                        <!--                        </ol>-->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">

                <?= \common\modules\widget\src\Alert::widget(['options' => [ 'style'=>'opacity:1;' ] ]);?>


                <div class="g-pa-20">
                    <div class="sx-empty-layout-hidden-no">
                        <?php if (!\common\modules\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isNoActions) : ?>
                            <?php if (\Yii::$app->controller && \Yii::$app->controller instanceof \common\modules\backend\IHasInfoActions
                                && \Yii::$app->controller->actions) : ?>
                                <?php echo \common\modules\backend\widgets\ControllerActionsWidget::currentWidget([
                                    'options'            => [
                                        //'class' => 'nav justify-content-center u-nav-v4-1 u-nav-primary sx-main-page-nav',
                                        'class' => 'nav u-nav-v7-1 u-nav-primary sx-main-page-nav',
                                        'style' => 'font-size: 16px;',
                                    ],
                                    'itemWrapperOptions' => [
                                        'class' => 'nav-item',
                                    ],
                                    'itemOptions'        => [
                                        'class' => 'nav-link',
                                    ],
                                ]);
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <?php if (\Yii::$app->controller && \Yii::$app->controller instanceof \common\modules\backend\controllers\IBackendModelController
                        && \Yii::$app->controller->modelActions && count(\Yii::$app->controller->modelActions) > 1) : ?>
                        <div class="">
                            <div class="panel-content-before panel-content-before-second">
<!--                                --><?php //if (\Yii::$app->controller && \Yii::$app->controller instanceof \common\modules\backend\controllers\IBackendModelController
//                                    && \Yii::$app->controller->modelActions && count(\Yii::$app->controller->modelActions) > 1) : ?>


                                    <div class="sx-model-title" title="<?= \Yii::$app->controller->modelShowName; ?>">
                                        <?= \Yii::$app->controller->modelHeader; ?>
                                    </div>

                                    <?php
                                    echo \common\modules\backend\widgets\ControllerActionsWidget::widget([
                                        'actions'            => \Yii::$app->controller->modelActions,
                                        'activeId'           => \Yii::$app->controller->action->id,
                                        'options'            => [
                                            'class' => 'nav nav-tabs sx-nav-with-bg sx-mgr-6 sx-nav-model',
                                        ],
                                        'itemWrapperOptions' => [
                                            'class' => 'nav-item',
                                        ],
                                        'itemOptions'        => [
                                            'class' => 'nav-link',
                                        ],
                                    ]);
                                    ?>


<!--                                --><?php //endif; ?>
                            </div>
                        </div>
                        <div class="tab-content">
                            <section>
                                <?= $content; ?>
                            </section>
                        </div>
                    <?php else : ?>
                        <section>
                            <?= $content; ?>
                        </section>
                    <?php endif; ?>


                    <!--</div>-->
                    <!-- End Statistic Card -->
                </div>




                <?php
                // Register dashboard search assets
                if (!is_null(Yii::$app->dashboard->search)) {
                    $searchUrl = Url::to(['/admin/search']);
                    $this->registerJs(<<< JS
                $(document).ready(function() {
                    
                    if ($("#adminSearchForm").length) {
                    
                        var timeout = 0;
                        var query = "";
                        var searchForm = $("#adminSearchForm");
                        
                        searchForm.find("input").on("keyup", function(event) {
                            query = $(event.target).val();
                            if (query.length >= 3) {
                                clearTimeout(timeout);
                                timeout = setTimeout(function() {
                                    searchForm.submit();
                                }, 1000);
                            }
                        });
                        
                        searchForm.on("submit", function(event) {
                            event.preventDefault();
                        
                            $.ajax({
                                type: "POST",
                                url: "$searchUrl",
                                data: {
                                    query: query
                                },
                                dataType: "json",
                                beforeSend: function () {
                                    searchForm.find(".search-box").addClass("show").addClass("loading");
                                },
                                complete: function(data) {
                                    
                                    searchForm.find(".search-box > ul").empty();
                                    searchForm.find(".search-box").removeClass("loading");
                                    
                                    if (data.status == 200 && data.responseJSON.results) {
                                        
                                        if (data.responseJSON.results.length) {
                                            $.each(data.responseJSON.results, function(index, result) {
                                                var item = $("<li class=\"list-item\" />");
                                                var header = $("<h5 class=\"item-header\" />");
                                                var buttons = $("<div class=\"btn-group btn-group-xs\" role=\"group\" />");
                                                
                                                if (result.title) {
                                                    header.html(result.title);
                                                }
                                                
                                                if (!(typeof result.status == "undefined")) {
                                                    if (result.status == "1") {
                                                        $("<span class=\"label label-primary\">Published</span>").prependTo(header);
                                                    } else {
                                                        $("<span class=\"label label-default\">Draft</span>").prependTo(header);
                                                    }
                                                }
                                                
                                                item.append(header);
                                                
                                                if (result.snippet) {
                                                    $("<div class=\"item-snippet\">" + result.snippet + "</div>").appendTo(item);
                                                }
                                                
                                                if (result.url.view) {
                                                    $("<a href=\"" + result.url.view + "\" class=\"btn btn-link\" data-pajax=\"0\"><span class=\"glyphicon glyphicon-eye-open\"></span> View</a>").appendTo(buttons);
                                                }
                                                
                                                if (result.url.update) {
                                                    $("<a href=\"" + result.url.update + "\" class=\"btn btn-link\" data-pajax=\"0\"><span class=\"glyphicon glyphicon-pencil\"></span> Update</a>").appendTo(buttons);
                                                }
                                                
                                                if (result.url.public && !(typeof result.status == "undefined")) {
                                                    if (result.status == "1") {
                                                        $("<a href=\"" + result.url.public + "\" class=\"btn btn-link\" target=\"_blank\"><span class=\"glyphicon glyphicon-globe\"></span> Public</a>").appendTo(buttons);
                                                    }
                                                }
                                                
                                                item.append(buttons);
                                                searchForm.find(".search-box > ul").append(item);
                                            });
                                            searchForm.find(".search-box > ul").fadeIn();
                                            searchForm.find(".search-box .no-search-results").fadeOut();
                                            
                                            searchForm.find(".search-box").on("mouseover", function () {
                                                $(this).find(".search-box").fadeOut();
                                            });
                                        } else {
                                            searchForm.find(".search-box .no-search-results strong > span.query").text(query);
                                            searchForm.find(".search-box .no-search-results").fadeIn();
                                        }
                                    } else {
                                        searchForm.find(".search-box").removeClass("show");
                                    }
                                    
                                }
                            }).fail(function() {
                                searchForm.find("input").val();
                                searchForm.find(".search-box > ul").empty();
                                searchForm.find(".search-box").removeClass("show").removeClass("loading");
                                searchForm.find(".search-box .no-search-results").fadeOut();
                            });
                            
                        });
                        
                        searchForm.find(".search-box").click(function() {
                            searchForm.find("input").val();
                            searchForm.find(".search-box > ul").empty();
                            searchForm.find(".search-box").removeClass("show").removeClass("loading");
                            searchForm.find(".search-box .no-search-results").fadeOut();
                        });
                        
                        searchForm.find(".search-box").hover(function() {
                            searchForm.find("input").blur();
                        }, function() {
                            searchForm.find("input").val();
                            searchForm.find(".search-box > ul").empty();
                            searchForm.find(".search-box").removeClass("show").removeClass("loading");
                            searchForm.find(".search-box .no-search-results").fadeOut();
                        });
                        
                    }
                    
                });
JS
                    );
                }
                ?>


                <?php
                // Register dashboard terminal assets
                if (Yii::$app->getModule('admin/terminal', false)) {
                    $url = Url::to(['/admin/terminal']);
                    $this->registerJs(<<< JS
                $(function() {
                    $('body').delegate('a[href="#terminal"]', 'click', function(event) {
                        event.preventDefault();
                        $.get(
                            '$url',
                            function (data) {
                                $('#terminalModal .modal-body').html($(data).remove('.modal-footer'));
                                if ($(data).find('.modal-footer').length > 0) {
                                    $('#terminalModal').find('.modal-footer').remove();
                                    $('#terminalModal .modal-content').append($(data).find('.modal-footer'));
                                }
                                $('#terminalModal').modal();
                            }
                        );
                    });
                });
JS
                    );
                }
                ?>

                <?php  \yii\bootstrap4\Modal::begin([
                    'id' => 'terminalModal',
                    'size' => 'modal-lg',
                    'options' => [
                        'class' => 'modal terminal-modal',
                    ],
                   // 'headerOptions' => '<h4 class="modal-title">'.Yii::t('app/modules/admin', 'Terminal').'</h4>',
                ]); ?>
                <?php  \yii\bootstrap4\Modal::end(); ?>


                <?php
                $url = Url::to(['admin/bugreport']);
                $this->registerJs(<<< JS
            $('body').delegate('a[href="#bugreport"]', 'click', function(event) {
                event.preventDefault();
                $.get(
                    '$url',
                    function (data) {
                        $('#bugreportModal .modal-body').html($(data).remove('.modal-footer'));
                        if ($(data).find('.modal-footer').length > 0) {
                            $('#bugreportModal').find('.modal-footer').remove();
                            $('#bugreportModal .modal-content').append($(data).find('.modal-footer'));
                        }
                        $('#bugreportModal').modal();
                    }
                );
            });
JS
                ); ?>

                <?php yii\bootstrap4\Modal::begin([
                    'id' => 'bugreportModal',
                   // 'header' => '<h4 class="modal-title">'.Yii::t('app/modules/admin', 'Bug Report').'</h4>',
                ]); ?>
                <?php yii\bootstrap4\Modal::end(); ?>

            </div>
        </section>
    </div>



    <footer class="main-footer <?php echo $keyStorage->get('adminlte.footer-small-text') ? 'text-sm' : null ?>">

        <div class="row">
            <div class="col-md-2">
                <?= Html::a(
                    Html::tag('span', '', ['class' => 'fa fa-fw fa-bug']) .
                    Yii::t('app/modules/admin', 'Report a bug'),
                    '#bugreport',
                    ['class' => 'text-danger']
                ) ?>
            </div>
            <div class="col-md-4">
                <strong> &copy;</strong>
                <?= date('Y') ?>, <?= Html::a('ITLO.CMS', 'https://cms.itlo.ru/', ['target' => "_blank"]) ?>
                <?=Yii::t('app/modules/admin','All rights reserved');?>.
            </div>
            <div class="col-md-4">
                <?php if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof   \common\modules\cms\IHasPermissions) : ?>
                    <a class="text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#sx-permisson-modal" data-toggle="modal">
                        <i class="fas fa-exclamation-circle"></i>
                        <!--<i class="hs-admin-align-right g-absolute-centered"></i>-->
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-md-2">
                <div class="float-right d-none d-sm-inline-block">
                    <?= Yii::$app->dashboard->getAppVersion(); ?>
                </div>
            </div>
        </div>
    </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>

</div>

    <?php $this->endBody() ?>
<?php echo Html::endTag('body') ?>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

</html>
<?php $this->endPage() ?>
