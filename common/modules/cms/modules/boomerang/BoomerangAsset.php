<?php
namespace common\modules\cms\modules\boomerang;

use yii\web\AssetBundle;

class BoomerangAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/boomerang/src/';

    /**
     * @param string $asset
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    static public function getAssetUrl($asset)
    {
        return \Yii::$app->assetManager->getAssetUrl(\Yii::$app->assetManager->getBundle(static::className()), $asset);
    }
}
