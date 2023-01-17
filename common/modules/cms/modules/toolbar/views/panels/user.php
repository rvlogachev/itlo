<?php
/* @var $this yii\web\View */
/* @var $panel \common\modules\cms\modules\toolbar\panels\UserPanel */
$urlUserEdit = \common\modules\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-profile/update'])
    ->enableEmptyLayout()
    ->url;
?>
<div class="sx-cms-toolbar__block sx-profile">
    <a href="<?= $urlUserEdit; ?>"
       onclick="new sx.classes.toolbar.Dialog('<?= $urlUserEdit; ?>'); return false;"
       title="<?= \Yii::t('skeeks/toolbar', 'Go to edit your data', [],
           \Yii::$app->admin->languageCode) ?>">

        <div class="sx-cms-toolbar__label sx-cms-toolbar__label_info">
            <img src="<?= \common\modules\cms\helpers\Image::getSrc(\Yii::$app->user->identity->avatarSrc); ?>"
                 style="border: 1px solid silver; height: 16px;"/>
            <?= \Yii::$app->user->identity->displayName; ?>
        </div>
    </a>
    <!--<a href="<?php /*= $urlEditModel; */ ?>" onclick="new sx.classes.toolbar.Dialog('<?php /*= $urlEditModel; */ ?>'); return false;" title="Выход">
     <span class="label">Выход</span>
</a>-->
    <?= \yii\helpers\Html::a('<span class="sx-cms-toolbar__label">' . \Yii::t('skeeks/toolbar', 'Exit', [],
            \Yii::$app->admin->languageCode) . '</span>',
        \common\modules\backend\helpers\BackendUrlHelper::createByParams(["/admin/admin-auth/logout"])->url, ["data-method" => "post"]) ?>

</div>