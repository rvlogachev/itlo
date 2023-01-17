<?php
/* @var $this \yii\web\View */
/* @var $model \common\modules\cms\models\CmsContentElement */
?>
<?= $this->render('@frontend/templates/default/include/breadcrumbs', [
    'model' => $model
])?>
<!-- Product page -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?= $model->description_full; ?>
            </div>
        </div>
    </div>
</section>
