<?php
/** @var \common\modules\cms\modules\ajaxfileupload\widgets\AjaxFileUploadWidget $widget */
/** @var string $input the code for the input */
/* @var $this yii\web\View */
$widget = $this->context;
?>
<div class="sx-ajax-file-uploader-wrapper dropzone" id="<?= $widget->id; ?>">
    <div class="row">

        <div style="display: none;">
            <div class="sx-item-template">
                <?= $widget->renderItemTemplate(); ?>
            </div>
        </div>
        <div class="sx-files">
        </div>


        <div class="col-sm-12 sx-tools">
          <?php if (count($widget->tools) > 1) : ?>
              <?php foreach ($widget->tools as $tool) : ?>
                  <a href="#" class="btn btn-default fileinput-button sx-run-tool sx-run-tool" data-tool-id="<?= $tool->id; ?>"><i class="<?= $tool->icon; ?>"></i> <?= $tool->name; ?></a>
              <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <div style="display: none;">
            <?= $element ?>
        </div>
<?
\common\modules\cms\modules\ajaxfileupload\widgets\assets\AjaxFileUploadWidgetAsset::register($this);
$js = \yii\helpers\Json::encode($widget->clientOptions);

$this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.{$widget->id} = new sx.classes.fileupload.AjaxFileUpload({$js});
})(sx, sx.$, sx._);
JS
);
?>

        <div style="display: none;">
            <?php foreach ($widget->tools as $tool) : ?>
                  <?= $tool->run(); ?>
              <?php endforeach; ?>
        </div>

    </div>
</div>
