<?php
/* @var $this yii\web\View */
/* @var $widget \common\modules\cms\widgets\tree\CmsTreeWidget */
/* @var $model \common\modules\cms\models\CmsTree */
$widget = $this->context;
?>
<div class="sx-label-node level-<?= $model->level; ?> status-<?= $model->active; ?>">
    <a href="<?= $widget->getOpenCloseLink($model); ?>">
        <?= $model->name; ?>
    </a>
</div>

