<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model wdmg\media\models\Categories */

$this->title = Yii::t('app/modules/media', 'Updating category: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/media', 'Media library'), 'url' => ['list/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/media', 'All categories'), 'url' => ['cats/index']];
$this->params['breadcrumbs'][] = Yii::t('app/modules/media', 'Edit');

?>
<?php if (Yii::$app->authManager && $this->context->module->moduleExist('rbac') && Yii::$app->user->can('updatePosts', [
        'created_by' => $model->created_by,
        'updated_by' => $model->updated_by
    ])) : ?>
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?><?= ($model->id === 1) ? " <span class=\"text-muted\">(" . Yii::t('app/modules/media', 'default') . ")</span>" : ""?><small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small></h1>
    </div>
    <div class="media-cats-update">
        <?= $this->render('_form', [
            'module' => $module,
            'model' => $model,
            'parentsList' => $model->getParentsList(false, true)
        ]); ?>
    </div>
<?php else : ?>
    <div class="page-header">
        <h1 class="text-danger"><?= Yii::t('app/modules/media', 'Error {code}. Access Denied', [
                'code' => 403
            ]) ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small></h1>
    </div>
    <div class="media-cats-update-error">
        <blockquote>
            <?= Yii::t('app/modules/media', 'You are not allowed to view this page.'); ?>
        </blockquote>
    </div>
<?php endif; ?>