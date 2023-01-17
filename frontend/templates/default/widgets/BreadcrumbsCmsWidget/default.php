<?php
/* @var $this   yii\web\View */
/* @var $widget \common\modules\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget */

?>
<?php if (\Yii::$app->breadcrumbs->parts) : ?>
    <?php $count = count(\Yii::$app->breadcrumbs->parts); ?>
    <?php $counter = 0; ?>
    <ol class="breadcrumb pull-right">
        <?php foreach (\Yii::$app->breadcrumbs->parts as $data) : ?>
            <?php $counter ++; ?>
            <?php if ($counter == $count): ?>
                <li class="active"><?= $data['name']; ?></li>
            <?php else : ?>
                <li><a href="<?= $data['url']; ?>" title="<?= $data['name']; ?>"><?= $data['name']; ?></a></li>
            <?php endif;?>
        <?php endforeach; ?>
    </ol>
<?php endif;?>
