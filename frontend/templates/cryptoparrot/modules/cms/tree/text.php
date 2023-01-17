<?php
/* @var $this \yii\web\View */
/* @var \common\modules\cms\models\Tree $model */

?>

<?= $this->render('@template/include/breadcrumbs', [
    'model' => $model
])?>

<!--=== Content Part ===-->
<section class="slice bg-white bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?= $model->description_full; ?>

                        <?= \common\modules\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                            'namespace' => 'ContentElementsCmsWidget-second',
                            'viewFile' 	=> '@frontend/templates/default/widgets/ContentElementsCmsWidget/publications',
                        ]); ?>

                    </div>
                </div>
            </div>
        </div>
</section>