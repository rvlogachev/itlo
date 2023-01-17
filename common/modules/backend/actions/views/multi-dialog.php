<?php
/* @var $this yii\web\View */
/* @var $context \common\modules\backend\actions\BackendModelMultiDialogEditAction */
$context = $this->context;
?>
<?php $modal = \yii\bootstrap4\Modal::begin([
//    'header' => '<b>' . $context->name . '</b>',
    'size' => \yii\bootstrap4\Modal::SIZE_LARGE,
    'id' => $dialogId,
]); ?>
    <?= $content; ?>
<?php $modal::end(); ?>
