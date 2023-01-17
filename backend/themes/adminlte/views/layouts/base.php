<?php
use backend\assets\BackendAsset;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\modules\system\models\SystemLog;
use common\modules\widget\src\MainSidebarMenu;
use common\models\TimelineEvent;
use common\models\User;
use rmrevin\yii\fontawesome\FAR;
use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap4\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\log\Logger;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var string $content
 */

$bundlePath =  \common\modules\admin\assets\AdminlteAsset::register($this);
$bundle = Yii::$app->getAssetManager()->getBundle('\common\modules\admin\assets\AdminlteAsset')->baseUrl;


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

foreach (\common\models\UserCompany::find()->andFilterWhere([  'user_id'=> Yii::$app->user->getId()])->all() as $companyEntrie) {

    $medCompany = \common\models\MedCompany::findOne($companyEntrie->company_id);


    $companyEntries[] = [
        'label' => FAS::icon('building', ['class' =>  'text-red'  ]) . ' ' . "<span data-id='" . $medCompany->id . "' class='company'><button  class='btn'>".$medCompany->name ."</button></span>",
//		'url' => ['/company/log/view', 'id' => $companyEntrie->id]
    ];
    $companyEntries[] = '<div class="dropdown-divider"></div>';
}

$companyEntries[] = [
    'label' => Yii::t('backend', 'View all'),
    'url' => ['/system/log/index'],
    'linkOptions' => ['class' => ['dropdown-item', 'dropdown-footer']]
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

    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>
<?php echo Html::beginTag('body', [
    'class' => implode(' ', [
        ArrayHelper::getValue($this->params, 'body-class'),
        'layout-navbar-fixed layout-fixed',
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






    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">

                <?= \common\modules\widget\src\Alert::widget(['options' => [ 'style'=>'opacity:1;' ] ]);?>

                <?php echo $content ?>



            </div>
        </section>
    </div>



</div>

    <?php $this->endBody() ?>
<?php echo Html::endTag('body') ?>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

</html>
<?php $this->endPage() ?>
