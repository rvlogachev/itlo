<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\modules\cms\helpers\UrlHelper;

/* @var $this \yii\web\View */
/* @var $content string */

 \common\modules\cms\modules\backend\assets\AdminAsset::register($this);
\Yii::$app->backendAdmin->initJs($this);
 \common\modules\cms\modules\admin\widgets\UserLastActivityWidget::widget();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="icon" href="https://skeeks.com/favicon.ico"  type="image/x-icon" />
        <?php $this->head() ?>
    </head>
    <body class="<?= \Yii::$app->user->isGuest ? "sidebar-hidden" : ""?> <?= \Yii::$app->admin->isEmptyLayout() ? "empty" : ""?>">
<?php $this->beginBody() ?>
    <?= $this->render('_header'); ?>
    <?php if (!\Yii::$app->user->isGuest): ?>
        <?= $this->render('_admin-menu'); ?>
    <?php endif; ?>
        <div class="main">

            <?= $this->render('_main-head'); ?>

            <div class="col-lg-12 sx-main-body">
                <?php $openClose = \Yii::t('skeeks/cms', 'Expand/Collapse')?>
                <?php  \common\modules\cms\modules\backend\widgets\AdminPanelWidget::begin([
                    'name'      => \Yii::$app->controller instanceof \common\modules\cms\IHasName ? \Yii::$app->controller->name : "",
                    'actions'   => <<<HTML
                        <a href="#" class="sx-btn-trigger-full">
                            <i class="fa fa-expand" data-sx-widget="tooltip-b" data-original-title="{$openClose}" style="color: white;"></i>
                        </a>
HTML
,

                    'options' =>
                    [
                        'class' => 'sx-main-content-widget sx-panel-content',
                    ],
                ]); ?>
                   <div class="panel-content-before">
                        <?php if (!\common\modules\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isNoActions) : ?>
                            <?php if (\Yii::$app->controller && \Yii::$app->controller instanceof \common\modules\backend\IHasInfoActions
                                && \Yii::$app->controller->actions && count(\Yii::$app->controller->actions) > 1) : ?>
                                <?
                                    echo  \common\modules\backend\widgets\ControllerActionsWidget::currentWidget();
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="panel-content-before panel-content-before-second">
                        <?php if (\Yii::$app->controller && \Yii::$app->controller instanceof \skeeks\cms\backend\controllers\IBackendModelController
                            && \Yii::$app->controller->modelActions && count(\Yii::$app->controller->modelActions)) : ?>

                            <div class="row">
                                <div class="col-md-12">
                            <div class="col-md-12 sx-model-title" title="<?= \Yii::$app->controller->modelShowName; ?>">
                                <h2 style="margin-top: 0px;"><?= \Yii::$app->controller->modelShowName; ?></h2>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <?
                                echo \skeeks\cms\backend\widgets\ControllerActionsWidget::widget([
                                        'actions' => \Yii::$app->controller->modelActions,
                                        'activeId' => \Yii::$app->controller->action->id
                                ]);
                            ?>
                            </div>
                                </div>
                        <?php endif; ?>
                    </div>
                    <div class="panel-content">
                        <?= \skeeks\cms\modules\admin\widgets\Alert::widget(); ?>
                        <?= $content ?>
                    </div>
                <?php \skeeks\cms\admin\widgets\AdminPanelWidget::end(); ?>
            </div>

        </div>
        <?php echo $this->render('_footer'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
