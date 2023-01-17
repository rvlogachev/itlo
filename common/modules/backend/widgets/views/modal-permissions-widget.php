<?php
/* @var $this yii\web\View */
/* @var $widget \common\modules\cms\backend\widgets\ModalPermissionWidget */
$widget = $this->context;
$controller = $widget->controller;
?>

<?php if ($controller instanceof \common\modules\cms\IHasPermissions && $controller->permissionNames) : ?>
    <?php foreach ($controller->permissionNames as $parmissionName => $permissionLabel) : ?>
        <?= \common\modules\cms\rbac\widgets\adminPermissionForRoles\AdminPermissionForRolesWidget::widget([
            'permissionName'        => $parmissionName,
            'permissionDescription' => $permissionLabel . " — " . $parmissionName,
            'label'                 => $permissionLabel,
        ]); ?>
        <!--<p><?/*= $parmissionName; */?></p>-->
    <?php endforeach; ?>

    <?php if ($controller->allActions) : ?>
        <hr />
        <?php foreach ($controller->allActions as $actionObj) : ?>
            <div class="row sx-action-permission">
                <div class="col-md-10 col-md-offset-1">
                    <?php if ($actionObj instanceof \common\modules\cms\IHasPermissions && $actionObj->permissionNames) : ?>
                        <?php foreach ($actionObj->permissionNames as $parmissionName => $permissionLabel) : ?>
                            <?= \common\modules\cms\rbac\widgets\adminPermissionForRoles\AdminPermissionForRolesWidget::widget([
                                'permissionName'        => $parmissionName,
                                'permissionDescription' => $permissionLabel . " — " . $parmissionName,
                                'label'                 => $actionObj->name,
                            ]); ?>
                            <!--<small><?/*= $parmissionName; */?> (<?/*= $permissionLabel; */?>)</small>-->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>
