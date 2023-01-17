<?php
/* @var $this \yii\web\View */
?>

<ul class="top-links list-inline pull-right">
<?php if (\Yii::$app->user->isGuest) : ?>
    <li><a href="<?= \common\modules\cms\helpers\UrlHelper::construct('cms/auth/login')->setCurrentRef(); ?>"><i class="fa fa-user"></i> Авторизация / Регистрация</a></li>
<?php else : ?>
    <li class="text-welcome hidden-xs">
        Добро пожаловать, <strong><?= \Yii::$app->user->identity->displayName; ?></strong>
    </li>
    <li>
        <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><i class="fa fa-user hidden-xs"></i> Мой аккаунт</a>
        <ul class="dropdown-menu pull-right">
            <li><a tabindex="-1" href="#"><i class="fa fa-history"></i> ORDER HISTORY</a></li>
            <li class="divider"></li>
            <li><a tabindex="-1" href="#"><i class="fa fa-bookmark"></i> MY WISHLIST</a></li>
            <li><a tabindex="-1" href="#"><i class="fa fa-edit"></i> MY REVIEWS</a></li>
            <li><a tabindex="-1" href="<?= \Yii::$app->user->identity->getPageUrl('edit'); ?>"><i class="fa fa-cog"></i> Настройки</a></li>
            <li class="divider"></li>
            <li><a href="<?= \common\modules\cms\helpers\UrlHelper::construct('cms/auth/logout')->setCurrentRef(); ?>" data-method="post"><span class="glyphicon glyphicon-off"></span> Выход</a></li>
        </ul>
    </li>
<?php endif; ?>
</ul>
