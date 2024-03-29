<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $module common\modules\sitemap\Module */
/* @var $model common\modules\sitemap\models\Sitemap */

$this->title = Yii::t('app/modules/sitemap', 'Add new URL');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/sitemap', 'Sitemap'), 'url' => ['list/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitemap-header">
    <h1><?= Html::encode($this->title) ?> <small class="text-muted pull-right">[v.<?= $module->version ?>]</small></h1>
</div>
<div class="sitemap-create">
    <?= $this->render('_form', [
        'model' => $model
    ]); ?>
</div>