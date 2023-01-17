<?
?>
<!-- HEADER -->
<div id="divHeaderWrapper">
    <header class="header-standard-2">
        <!-- MAIN NAV -->
        <div class="navbar navbar-wp navbar-arrow mega-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!--<button type="button" class="navbar-toggle navbar-toggle-aside-menu">
                        <i class="fa fa-outdent icon-custom"></i>
                    </button>-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars icon-custom"></i>
                    </button>

                    <a class="navbar-brand" href="<?= \yii\helpers\Url::home(); ?>" title="Стоматологическая клиника АДРИА">

                        <?= \common\modules\cms\cmsWidgets\text\TextCmsWidget::widget([
                        'namespace'         => 'header-logo',
                        'text'              => <<<HTML
                        <img src="/img/logo.png" style="float: left;" />

                        <span style="float: left; margin-top: 12px; margin-left: 10px;">
                            <span style="color: #006EEB; font-weight: bold;">SkeekS</span>.com
                        </span>
HTML
        ,
                    ]); ?>

                    </a>
                </div>

                <?= \common\modules\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                    'namespace'      => 'menu-top',
                    'viewFile'       => '@template/widgets/TreeMenuCmsWidget/menu-top.php',
                    'label'          => '',
                    'level'          => '1',
                    'enabledRunCache'=> \common\modules\cms\components\Cms::BOOL_N,
                ]); ?>

            </div>
        </div>
    </header>

</div>



