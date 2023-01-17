<?php
/* @var $this   yii\web\View */
/* @var $widget \common\modules\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */


?>

<!-- OWL SLIDER -->

<?php if ($widget->dataProvider->query->count()) : ?>

<?php


if ($widget->dataProvider->query->count() >= 1)
{

    $timestamp = \Yii::$app->assetManager->appendTimestamp;
    \Yii::$app->assetManager->appendTimestamp = false;
    $skinsPath = \common\assets\BoomerangThemeAsset::getAssetUrl("assets/layerslider/skins/");

    \Yii::$app->assetManager->appendTimestamp = $timestamp;
    $this->registerJs(<<<JS
        jQuery("#layerslider").layerSlider({
            pauseOnHover: true,
            autoPlayVideos: false,
            skinsPath: '{$skinsPath}',
            responsive: false,
            responsiveUnder: 1280,
            layersContainer: 1280,
            skin: 'borderlessdark3d',
            hoverPrevNext: true,
        });
JS
    );
}


?>
    <section id="slider-wrapper" class="layer-slider-wrapper layer-slider-static">
        <?php echo \yii\widgets\ListView::widget([
            'dataProvider'      => $widget->dataProvider,
            'itemView'          => 'slide-item',
            'emptyText'          => '',
            'options'           =>
            [
                'tag'       => 'div',
                'style' => "width: 100%; height: 500px",
                'id' => "layerslider"
            ],
            'itemOptions' => [
                'tag' => false,
            ],
            'layout'            => "{items}"
        ])?>
    </section>


<?php endif; ?>

<!-- /OWL SLIDER -->
