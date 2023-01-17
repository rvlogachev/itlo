<?php
/**
 * @var \common\modules\cms\models\CmsContentElement $model
 *
 */
?>

<div class="row margin-bottom-20">
    <div class="col-sm-4 sm-margin-bottom-20">
        <?php if ($model->image) : ?>
            <img src="<?= \Yii::$app->imaging->getImagingUrl($model->image->src,
            new \common\modules\cms\components\imaging\filters\Thumbnail([
                'w'    => 409,
                'h'    => 258,
            ])
        ) ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive" />
        <?php else: ?>
            <img src="<?= \common\modules\cms\helpers\Image::getCapSrc(); ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive" />
        <?php endif; ?>

    </div>
    <div class="col-sm-8 news-v3">
        <div class="news-v3-in-sm no-padding">
            <h2>
                <a href="<?= $model->url; ?>" title="<?= $model->name; ?>"><?= $model->name; ?></a>
            </h2>

            <ul class="list-inline posted-info">
                <?php if ($model->createdBy) : ?>
                    <li>Добавил: <a href="<?= $model->createdBy->getPageUrl(); ?>" title="<?= $model->createdBy->name; ?>"><?= $model->createdBy->name; ?></a></li>
                <?php endif; ?>
                <?php if ($model->cmsTree) : ?>
                    <li>Категория: <a href="<?= $model->cmsTree->url; ?>" title="<?= $model->cmsTree->name; ?>"><?= $model->cmsTree->name; ?></a></li>
                <?php endif; ?>
                <li>Время публикации: <?= \Yii::$app->formatter->asDate($model->published_at, 'full')?></li>
                <?php if ($testValue = $model->relatedPropertiesModel->getAttribute('test')) : ?>
                    <li><?= $model->relatedPropertiesModel->getAttributeLabel('test'); ?>: <?= $testValue; ?></li>
                <?php endif; ?>
            </ul>

            <p><?= $model->description_short; ?></p>
            <p><a href="<?= $model->url; ?>">Читать полностью</a></p>

        </div>
    </div>
</div>

<div class="clearfix margin-bottom-20"><hr></div>