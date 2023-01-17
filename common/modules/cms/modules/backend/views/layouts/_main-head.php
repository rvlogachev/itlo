<?php
?>

<div class="col-md-12 sx-empty-hide">

    <div class="row sx-main-head sx-bg-glass sx-bg-glass-hover">
        <div class="col-md-11 pull-left">
            <?php $controller = \Yii::$app->controller; ?>
            <?php if ($controller && $controller instanceof \common\modules\backend\IHasBreadcrumbs) : ?>
                <?= \yii\widgets\Breadcrumbs::widget([
                    'homeLink' => ['label' => \Yii::t("yii", "Home"), 'url' =>
                        \yii\helpers\Url::to(['/admin/admin-index'])
                    ],
                    'links' => $controller->breadcrumbsData,
                ]) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-1">
            <div class="pull-right">

                <?php if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof \common\modules\cms\IHasPermissions) : ?>
                    <?= \common\modules\backend\widgets\ModalPermissionWidget::widget([
                        'controller' => \Yii::$app->controller
                    ]); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
