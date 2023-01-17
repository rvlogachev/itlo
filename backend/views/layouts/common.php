<?php
/**
 * @author Eugine Terentev <eugine@terentev.net>
 * @author Victor Gonzalez <victor@vgr.cl>
 * @var yii\web\View $this
 * @var string $content
 */

use common\modules\system\models\SystemLog;
use common\modules\widget\src\MainSidebarMenu;
use common\models\TimelineEvent;
use common\models\User;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap4\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\ArrayHelper;
use yii\log\Logger;


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
	'url' => ['/system/log/index'],
	'linkOptions' => ['class' => ['dropdown-item', 'dropdown-footer']]
];





$companyEntries = [
	[
		'label' => "Доступные компании ",
		'linkOptions' => ['class' => ['dropdown-item', 'dropdown-header']]
	],
	'<div class="dropdown-divider"></div>',
];




//$companyEntries[] = [
//	'label' => Yii::t('backend', 'View all'),
//	'url' => ['/system/log/index'],
//	'linkOptions' => ['class' => ['dropdown-item', 'dropdown-footer']]
//];


?>

<?php $this->beginContent('@backend/views/layouts/base.php'); ?>
<div class="wrapper">
	<!-- navbar -->
	<?php NavBar::begin([
		'renderInnerContainer' => false,
		'options' => [
			'class' => [
				'main-header',
				'navbar',
				'navbar-expand',
				'navbar-dark',
				$keyStorage->get('adminlte.navbar-no-border') ? 'border-bottom-0' : null,
				$keyStorage->get('adminlte.navbar-small-text') ? 'text-sm' : null,
			],
		],
	]); ?>

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
		]
	]); ?>
	<!-- /left navbar links -->

	<!-- right navbar links -->
	<?php echo Nav::widget([
		'options' => ['class' => ['navbar-nav', 'ml-auto']],
		'encodeLabels' => false,
		'items' => [


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


			[
				// control sidebar button
				'label' => FAS::icon('th-large'),
				'url' => '#',
				'linkOptions' => [
					'data' => ['widget' => 'control-sidebar', 'slide' => 'true'],
					'role' => 'button'
				],
				'visible' => Yii::$app->user->can('admin'),
			],
		]
	]); ?>
	<!-- /right navbar links -->

	<?php NavBar::end(); ?>
	<!-- /navbar -->

	<!-- main sidebar -->
	<aside
		class="main-sidebar sidebar-dark-primary elevation-4 <?php echo $keyStorage->get('adminlte.sidebar-no-expand') ? 'sidebar-no-expand' : null ?>">
		<!-- brand logo -->
		<a href="/"
			 class="brand-link text-center <?php echo $keyStorage->get('adminlte.brand-text-small') ? 'text-sm' : null ?>">
			<!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		  style="opacity: .8"> -->
			<span class="brand-text font-weight-bold"><?php echo Yii::$app->name ?></span>
		</a>
		<!-- /brand logo -->

		<!-- sidebar -->
		<div class="sidebar">
			<!-- sidebar user panel -->

			<!-- /sidebar user panel -->

			<!-- sidebar menu -->
			<nav class="mt-2">
		  <?php echo MainSidebarMenu::widget([
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
			  'items' => [
                  [
                      'label' => Yii::t('backend', 'Менеджер модулей'),
                      'options' => ['class' => 'nav-header'],
                  ],

                  [
                      'label' => Yii::t('backend', 'Роли и разрешения'),
                      'url' => ['/rbac/rbac-auth-item/index'],
                      'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
                  ],
                  [
                      'label' => Yii::t('backend', 'Разрешения ролей'),
                      'url' => ['/rbac/rbac-auth-item-child/index'],
                      'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
                  ],
                  [
                      'label' => Yii::t('backend', 'Назначение ролей'),
                      'url' => ['/rbac/rbac-auth-assignment/index'],
                      'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
                  ],
                  [
                      'label' => Yii::t('backend', 'Правила доступа'),
                      'url' => ['/rbac/rbac-auth-rule/index'],
                      'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
                  ],

				  [
					  'label' => Yii::t('backend', 'Главное меню'),
					  'options' => ['class' => 'nav-header'],
				  ],

                  [
                      'label' => Yii::t('backend', 'Позиции'),
                      'url' => ['/position/index'],
                      'icon' => FAR::icon('user', ['class' => ['nav-icon']]),
                  ],

                  [
                      'label' => Yii::t('backend', 'Файлы'),
                      'options' => ['class' => 'nav-header'],
                  ],
                  [
                      'label' => Yii::t('backend', 'Storage'),
                      'url' => ['/file/storage/index'],
                      'icon' => FAS::icon('database', ['class' => ['nav-icon']]),
                      'active' => (Yii::$app->controller->id == 'storage'),
                  ],
                  [
                      'label' => Yii::t('backend', 'Manager'),
                      'url' => ['/file/manager/index'],
                      'icon' => FAS::icon('archive', ['class' => ['nav-icon']]),
                      'active' => (Yii::$app->controller->id == 'manager'),
                  ],
//                        [
//                            'label' => Yii::t('backend', 'Content'),
//                            'options' => ['class' => 'nav-header'],
//                        ],
//                        [
//                            'label' => Yii::t('backend', 'Static pages'),
//                            'url' => ['/content/page/index'],
//                            'icon' => FAS::icon('thumbtack', ['class' => ['nav-icon']]),
//                            'active' => Yii::$app->controller->id === 'page',
//                        ],
//                        [
//                            'label' => Yii::t('backend', 'Articles'),
//                            'url' => '#',
//                            'icon' => FAS::icon('newspaper', ['class' => ['nav-icon']]),
//                            'options' => ['class' => 'nav-item has-treeview'],
//                            'active' => 'content' === Yii::$app->controller->module->id &&
//                                ('article' === Yii::$app->controller->id || 'category' === Yii::$app->controller->id),
//                            'items' => [
//                                [
//                                    'label' => Yii::t('backend', 'Articles'),
//                                    'url' => ['/content/article/index'],
//                                    'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
//                                    'active' => Yii::$app->controller->id === 'article',
//                                ],
//                                [
//                                    'label' => Yii::t('backend', 'Categories'),
//                                    'url' => ['/content/category/index'],
//                                    'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
//                                    'active' => Yii::$app->controller->id === 'category',
//                                ],
//                            ],
//                        ],
//                        [
//                            'label' => Yii::t('backend', 'Widgets'),
//                            'url' => '#',
//                            'icon' => FAS::icon('puzzle-piece', ['class' => ['nav-icon']]),
//                            'options' => ['class' => 'nav-item has-treeview'],
//                            'active' => Yii::$app->controller->module->id === 'widget',
//                            'items' => [
//                                [
//                                    'label' => Yii::t('backend', 'Text Blocks'),
//                                    'url' => ['/widget/text/index'],
//                                    'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
//                                    'active' => Yii::$app->controller->id === 'text',
//                                ],
//                                [
//                                    'label' => Yii::t('backend', 'Menu'),
//                                    'url' => ['/widget/menu/index'],
//                                    'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
//                                    'active' => Yii::$app->controller->id === 'menu',
//                                ],
//                                [
//                                    'label' => Yii::t('backend', 'Carousel'),
//                                    'url' => ['/widget/carousel/index'],
//                                    'icon' => FAR::icon('circle', ['class' => ['nav-icon']]),
//                                    'active' => in_array(Yii::$app->controller->id, ['carousel', 'carousel-item']),
//                                ],
//                            ],
//                        ],
				  [
					  'label' => Yii::t('backend', 'Системное меню'),
					  'options' => ['class' => 'nav-header'],
					  'visible' => Yii::$app->user->can('admin'),
				  ],
                  [
                      'label' => Yii::t('backend', 'Информация'),
                      'url' => ['/system/information/index'],
                      'icon' => FAS::icon('tachometer-alt', ['class' => ['nav-icon']]),
                      'visible' => Yii::$app->user->can('admin'),
                  ],
                  [
                      'label' => Yii::t('backend', 'Настройки'),
                      'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                      'url' => ['/settings/view?id=1'],
                      'visible' => Yii::$app->user->can('settings/view'),
                  ],
                  [
                      'label' => Yii::t('backend', 'Ключ/значение'),
                      'url' => ['/system/key-storage/index'],
                      'icon' => FAS::icon('exchange-alt', ['class' => ['nav-icon']]),
                      'active' => (Yii::$app->controller->id == 'key-storage'),
                      'visible' => Yii::$app->user->can('admin'),
                  ],
				  [
					  'label' => 'Переводы',
					  'url' => ['/translation/default/index'],
					  'icon' => FAS::icon('language', ['class' => ['nav-icon']]),
					  'active' => (Yii::$app->controller->module->id == 'translation'),
					  'visible' => Yii::$app->user->can('admin'),
				  ],
				  [
					  'label' => Yii::t('backend', 'Логи системы'),
					  'url' => ['/system/log/index'],
					  'icon' => FAS::icon('clipboard-list', ['class' => ['nav-icon']]),
					  'badge' => SystemLog::find()->count(),
					  'badgeBgClass' => 'badge-danger',
					  'visible' => Yii::$app->user->can('admin'),
				  ],
                  [
                      'label' => Yii::t('backend', 'Кеш'),
                      'url' => ['/system/cache/index'],
                      'icon' => FAS::icon('sync', ['class' => ['nav-icon']]),
                      'visible' => Yii::$app->user->can('admin'),
                  ],
			  ],
		  ]) ?>
			</nav>
			<!-- /sidebar menu -->
		</div>
		<!-- /sidebar -->
	</aside>
	<!-- /main sidebar -->

	<!-- content wrapper -->
	<div class="content-wrapper" style="min-height: 402px;">
		<!-- content header -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"><?php echo Html::encode($this->title) ?></h1>
					</div>
					<div class="col-sm-6">
			  <?php echo Breadcrumbs::widget([
				  'tag' => 'ol',
				  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				  'options' => ['class' => ['breadcrumb', 'float-sm-right']]
			  ]) ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /content header -->

		<!-- main content -->
		<section class="content">
			<div class="container-fluid">
		  <?php if (Yii::$app->session->hasFlash('alert')) : ?>
			  <?php echo Alert::widget([
				  'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
				  'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
			  ]) ?>
		  <?php endif; ?>
		  <?php echo $content ?>
			</div>
		</section>
		<!-- /main content -->

	  <?php echo Html::a(FAS::icon('chevron-up'), '#', [
		  'class' => ['btn', 'btn-primary', 'back-to-top'],
		  'role' => 'button',
		  'aria-label' => 'Scroll to top',
	  ]) ?>
	</div>
	<!-- /content wrapper -->

	<!-- footer -->
	<footer class="main-footer <?php echo $keyStorage->get('adminlte.footer-small-text') ? 'text-sm' : null ?>">
		<strong>&copy; Телемедицина v 0.1 <?php echo date('Y') ?></strong>

	</footer>
	<!-- /footer -->


</div>
<?php $this->endContent(); ?>
