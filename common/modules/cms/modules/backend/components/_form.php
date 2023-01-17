<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\WidgetConfig */
?>


<?= $form->fieldSet(\Yii::t('skeeks/cms', 'Main')); ?>
    <?= $form->field($model, 'logoSrc')->widget(
        \common\modules\cms\modules\admin\widgets\formInputs\OneImage::class
    ); ?>
    <?= $form->field($model, 'logoTitle'); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet(\Yii::t('skeeks/admin', 'Language settings')); ?>
    <?= $form->fieldSelect($model, 'languageCode', \yii\helpers\ArrayHelper::map(
        \common\modules\cms\models\CmsLang::find()->active()->all(),
        'code',
        'name'
    )); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet(\Yii::t('skeeks/admin','Setting tables')); ?>
    <?= $form->fieldRadioListBoolean($model, 'enabledPjaxPagination', \Yii::$app->cms->booleanFormat()); ?>
    <?= $form->fieldInputInt($model, 'pageSize'); ?>
    <?= $form->fieldInputInt($model, 'pageSizeLimitMin'); ?>
    <?= $form->fieldInputInt($model, 'pageSizeLimitMax'); ?>
    <?= $form->field($model, 'pageParamName')->textInput(); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet(\Yii::t('skeeks/admin','Setting the visual editor')); ?>
    <?= $form->fieldSelect($model, 'ckeditorPreset', \common\modules\cms\modules\ckeditor\CKEditorPresets::allowPresets()); ?>
    <?= $form->fieldSelect($model, 'ckeditorSkin', \common\modules\cms\modules\ckeditor\CKEditorPresets::skins()); ?>
    <?= $form->fieldInputInt($model, 'ckeditorHeight'); ?>
    <?= $form->fieldRadioListBoolean($model, 'ckeditorCodeSnippetGeshi')->hint(\Yii::t('skeeks/admin','It will be activated this plugin') . ' http://ckeditor.com/addon/codesnippetgeshi'); ?>
    <?= $form->fieldSelect($model, 'ckeditorCodeSnippetTheme', [
        'monokai_sublime' => 'monokai_sublime',
        'default' => 'default',
        'arta' => 'arta',
        'ascetic' => 'ascetic',
        'atelier-dune.dark' => 'atelier-dune.dark',
        'atelier-dune.light' => 'atelier-dune.light',
        'atelier-forest.dark' => 'atelier-forest.dark',
        'atelier-forest.light' => 'atelier-forest.light',
        'atelier-heath.dark' => 'atelier-heath.dark',
        'atelier-heath.light' => 'atelier-heath.light',
        'atelier-lakeside.dark' => 'atelier-lakeside.dark',
        'atelier-lakeside.light' => 'atelier-lakeside.light',
    ])->hint('https://highlightjs.org/static/demo/ - ' . \Yii::t('skeeks/admin','topics')); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet(\Yii::t('skeeks/admin','Security')); ?>
    <?= $form->fieldInputInt($model, 'blockedTime')->hint(\Yii::t('skeeks/admin','If a user, for a specified time, not active in the admin panel, it will be prompted for a password.')); ?>
<?= $form->fieldSetEnd(); ?>


<?= $form->fieldSet(\Yii::t('skeeks/admin', 'Access')); ?>

    <?= \common\modules\cms\modules\admin\widgets\BlockTitleWidget::widget(['content' => 'Основное']); ?>

    <?= \common\modules\cms\rbac\widgets\adminPermissionForRoles\AdminPermissionForRolesWidget::widget([
        'permissionName'        => \common\modules\cms\rbac\CmsManager::PERMISSION_ADMIN_ACCESS,
        'label'                 => \Yii::t('skeeks/admin','Access to the administrate area'),
    ]); ?>

    <?= \common\modules\cms\rbac\widgets\adminPermissionForRoles\AdminPermissionForRolesWidget::widget([
        'permissionName'        => \common\modules\cms\rbac\CmsManager::PERMISSION_EDIT_VIEW_FILES,
        'label'                 => \Yii::t('skeeks/admin','The ability to edit view files'),
    ]); ?>

    <?= \common\modules\cms\rbac\widgets\adminPermissionForRoles\AdminPermissionForRolesWidget::widget([
        'permissionName'        => "cms/admin-settings",
        'label'                 => \Yii::t('skeeks/admin','The ability to edit settings'),
    ]); ?>

    <?= \common\modules\cms\rbac\widgets\adminPermissionForRoles\AdminPermissionForRolesWidget::widget([
        'permissionName'        => \common\modules\cms\rbac\CmsManager::PERMISSION_ADMIN_DASHBOARDS_EDIT,
        'label'                 => \Yii::t('skeeks/admin','Access to edit dashboards'),
    ]); ?>



<?= $form->fieldSetEnd(); ?>




