<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\geo\models\GeoTranslations */

$this->title = Yii::t('app/modules/geo', 'Add new translation');
$this->params['breadcrumbs'][] = ['label' => $this->context->module->name, 'url' => ['geo/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/geo', 'Translations'), 'url' => ['translations/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1><?= Html::encode($this->title) ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small></h1>
</div>
<div class="geo-translations-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
