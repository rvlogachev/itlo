<?
/* @var $this \yii\web\View */
/* @var \common\modules\cms\models\CmsContentElement $model */
?>

<?= $this->render('@frontend/templates/default/include/breadcrumbs', [
    'model' => $model
])?>

<!--=== Content Part ===-->
<section class="slice bg-white bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?= $model->description_full; ?>

                        <?/*= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                            'namespace'         => 'TreeMenuCmsWidget-sub-catalog',
                            'viewFile'          => '@template/widgets/TreeMenuCmsWidget/sub-catalog',
                            'treePid'           => $model->id,
                            'enabledRunCache'   => \skeeks\cms\components\Cms::BOOL_N,
                        ]); */?>

                    </div>
                </div>
            </div>
        </div>
</section>