<?php

use common\modules\cms\helpers\CatalogTreeHelper;
/* @var $this \yii\web\View */
/* @var \common\modules\cms\models\Tree $model */

$catalogHelper =   CatalogTreeHelper::instance($model);
?>

<?= $this->render('@template/include/breadcrumbs', [
    'model' => $model
])?>


<!-- Product page -->
<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">

                <div class="row">
                    <?= $model->description_full; ?>

                    <?php if ($catalogHelper->viewType ==  CatalogTreeHelper::VIEW_TREE) : ?>
                        <?= trim(\common\modules\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                            'namespace'         => 'TreeMenuCmsWidget-sub-catalog',
                            'viewFile'          => '@template/widgets/TreeMenuCmsWidget/sub-catalog',
                            'treePid'           => $model->id,
                            'enabledRunCache'   => \common\modules\cms\components\Cms::BOOL_N,
                        ])); ?>
                    <?php else : ?>
                        <?= \common\modules\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                            'namespace' => 'ContentElementsCmsWidget-second',
                            'viewFile' 	=> '@app/views/widgets/ContentElementsCmsWidget/products',
                        ]); ?>
                    <?php endif; ?>
                </div>

            </div>

            <!-- LEFT -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-lg-pull-9 col-md-pull-9 col-sm-pull-9">

                <!-- CATEGORIES -->
                <div class="side-nav margin-bottom-60">


                    <?= trim(\common\modules\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                        'namespace'         => 'TreeMenuCmsWidget-leftmenu',
                        'viewFile'          => '@template/widgets/TreeMenuCmsWidget/left-menu',
                        'treePid'           => $model->id,
                        'enabledRunCache'   => \common\modules\cms\components\Cms::BOOL_N,
                        'label'             => '�������',
                    ])); ?>

                </div>
                <!-- /CATEGORIES -->
            </div>

        </div>
    </div>
</section>

