<?php

if (!@$title)
{
    if ($model)
    {
        $title = $model->name;
    }
}


?>

<div class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><?= @$title; ?></h2>
            </div>
            <div class="col-md-6">
                <?= \common\modules\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget::widget([
                    'viewFile'       => '@app/views/widgets/BreadcrumbsCmsWidget/default',
                ]); ?>
            </div>
        </div>
    </div>
</div>


