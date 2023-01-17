<?php
?>

<div class="row margin-bottom-20">

        <?php if ($model->image->src) : ?>
    <div class="col-sm-4 sm-margin-bottom-20">
            <img src="<?= \common\modules\cms\helpers\Image::getSrc($model->image->src); ?><?/*= \Yii::$app->imaging->getImagingUrl($model->getMainImageSrc(),
            new \skeeks\cms\components\imaging\filters\Thumbnail([
                'w'    => 409,
                'h'    => 258,
            ])
        ) */?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive" />
    </div>
    <div class="col-sm-8 news-v3">
        <?php else :?>
        <div class="col-sm-12 news-v3">
        <?php endif; ?>



        <div class="news-v3-in-sm no-padding">
            <h2>
                <a href="<?= $model->url; ?>" title="<?= $model->name; ?>"><?= $model->name; ?></a>
            </h2>

            <!--<ul class="list-inline posted-info">
                <?php/* if ($model->createdBy) : */?>
                    <li>Добавил: <a href="<?/*= $model->createdBy->getPageUrl(); */?>" title="<?/*= $model->createdBy->name; */?>"><?/*= $model->createdBy->name; */?></a></li>
                <?php/* endif; */?>
                <?php/* if ($model->cmsTree) : */?>
                    <li>Категория: <a href="<?/*= $model->cmsTree->url; */?>" title="<?/*= $model->cmsTree->name; */?>"><?/*= $model->cmsTree->name; */?></a></li>
                <?php/* endif; */?>
                <li>Время публикации: <?/*= \Yii::$app->formatter->asDate($model->published_at, 'full')*/?></li>
                <?php/* if ($testValue = $model->relatedPropertiesModel->getAttribute('test')) : */?>
                    <li><?/*= $model->relatedPropertiesModel->getAttributeLabel('test'); */?>: <?/*= $testValue; */?></li>
                <?php/* endif; */?>
            </ul>-->

            <div class="news-v3-in-sm-p" ><?= $model->description_short; ?></div>
            <p><a href="<?= $model->url; ?>" data-pjax="0" class="btn btn-color">Подробнее</a></p>

        </div>
    </div>
</div>

<div class="clearfix margin-bottom-20"><hr></div>