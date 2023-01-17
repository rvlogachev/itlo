<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\modules\pages\models\Pages */

$this->title = Yii::t('app/modules/pages', 'Updating page: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/pages', 'All pages'), 'url' => ['pages/index']];
$this->params['breadcrumbs'][] = Yii::t('app/modules/pages', 'Updating');

$flag = '';
if ($model->locale && isset(Yii::$app->translations) && class_exists('\common\modules\translations\FlagsAsset')) {
    $bundle = \common\modules\translations\FlagsAsset::register(Yii::$app->view);
    $locale = Yii::$app->translations->parseLocale($model->locale, Yii::$app->language);
    if ($model->locale === $locale['locale']) { // Fixing default locale from PECL intl
        if (!($country = $locale['domain']))
            $country = '_unknown';

        $flag = '<sup>' . \yii\helpers\Html::img($bundle->baseUrl . '/flags-iso/flat/24/' . $country . '.png', [
                'title' => $locale['name']
            ]) . '</sup>';
    }
} else {
    if (extension_loaded('intl'))
        $language = mb_convert_case(trim(\Locale::getDisplayLanguage($model->locale, Yii::$app->language)), MB_CASE_TITLE, "UTF-8");
    else
        $language = $model->locale;

    $flag = '<sup><small class="text-muted">[' . $language . ']</small></sup>';
}

?>
<?php if (Yii::$app->authManager && $this->context->module->moduleExist('rbac') && Yii::$app->user->can('updatePosts', [
        'created_by' => $model->created_by,
        'updated_by' => $model->updated_by
    ])) : ?>
    <div class="page-header">
        <h1><?= Html::encode($this->title) . $flag ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small></h1>
    </div>
    <div class="pages-update">
        <?= $this->render('_form', [
            'model' => $model,
            'statusModes' => $model->getStatusesList(),
            'languagesList' => $model->getLanguagesList(false),
            'parentsList' => $model->getParentsList(false, true)
        ]) ?>
    </div>
<?php else: ?>
    <div class="page-header">
        <h1 class="text-danger"><?= Yii::t('app/modules/pages', 'Error {code}. Access Denied', [
                'code' => 403
            ]) ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small></h1>
    </div>
    <div class="pages-update-error">
        <blockquote>
            <?= Yii::t('app/modules/pages', 'You are not allowed to view this page.'); ?>
        </blockquote>
    </div>
<?php endif; ?>