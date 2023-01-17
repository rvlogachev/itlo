<?php
/* @var $this yii\web\View */
?>
<div id="<?= $widget->id; ?>" class="form-group">
    <?php if ($widget->label): ?>
        <label><?= $widget->label; ?></label>
    <?php endif; ?>

    <?php /*= \yii\helpers\Html::checkboxList(
        'sx-permission-' . $widget->permissionName,
        $widget->permissionRoles,
        \yii\helpers\ArrayHelper::map(\Yii::$app->authManager->getRoles(), 'name', 'description')
    ); */ ?>
    <?= \common\modules\cms\modules\chosen\Chosen::widget([
        'multiple' => true,
        'name' => 'sx-permission-' . $widget->permissionName,
        'value' => $widget->permissionRoles,
        'items' => $widget->items
    ]); ?>

    <?php if ($widget->permissionDescription) : ?>
        <div style="font-size: 12px;"><?= $widget->permissionDescription; ?></div>
    <?php endif; ?>

    <?php $this->registerJs(<<<JS
    (function(sx, $, _)
    {
        new sx.classes.PermissionForRoles({$widget->getClientOptionsJson()});
    })(sx, sx.$, sx._);
JS
    ) ?>
</div>
