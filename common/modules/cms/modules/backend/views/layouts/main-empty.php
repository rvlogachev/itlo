<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use skeeks\cms\helpers\UrlHelper;

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
        <link rel="icon" href="https://itlo.ru/favicon.ico"  type="image/x-icon" />
        <?php $this->head() ?>
    </head>
    <body class="<?= \Yii::$app->user->isGuest ? "sidebar-hidden" : ""?> <?= \Yii::$app->admin->isEmptyLayout() ? "empty" : ""?>">
<?php $this->beginBody() ?>
    <?= $this->render('_header'); ?>
    <?php if (!\Yii::$app->user->isGuest): ?>
        <?= $this->render('_admin-menu'); ?>
    <?php endif; ?>
        <div class="main">
            <?= $content ?>
        </div>
        <?php echo $this->render('_footer'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
