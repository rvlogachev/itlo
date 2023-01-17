<?php
/* @var $this yii\web\View */
/* @var $panel \common\modules\cms\modules\toolbar\panels\ConfigPanel */
?>
<div class="sx-cms-toolbar__block">
    <a href="<?= \Yii::$app->cms->homePage; ?>"
       title="<?= \Yii::t('skeeks/toolbar', 'The current version {cms} ', ['cms' => 'SkeekS SMS'],
           \Yii::$app->admin->languageCode) ?> <?= \Yii::$app->cms->version; ?>" target="_blank">
        <span class="yii-debug-toolbar__label"><?= \Yii::$app->cms->version; ?></span>
    </a>
</div>
