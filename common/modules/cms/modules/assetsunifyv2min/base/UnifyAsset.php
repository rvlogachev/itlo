<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

use common\modules\admin\assets\AdminlteAsset;
use yii\web\AssetBundle;
class UnifyAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/assetsunifyv2min/template/html/';

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