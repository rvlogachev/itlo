<?php
namespace common\modules\cms\modules\authclient;
use yii\helpers\ArrayHelper;
/**
 * Class CmsAuthClientCollection
 * @package skeeks\cms\authclient
 */
class CmsAuthClientCollection extends \yii\authclient\Collection
{
    public function init()
    {
        parent::init();

        if (\Yii::$app->authClientSettings && \Yii::$app->authClientSettings->enabled === false)
        {
            return;
        }

        $this->clients = ArrayHelper::merge((array) $this->clients, (array) \Yii::$app->authClientSettings->clients);
    }
}