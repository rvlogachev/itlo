<?php
namespace common\modules\cms\modules\config\storages;

use common\modules\cms\modules\config\ConfigBehavior;
use common\modules\cms\modules\config\ConfigStorage;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class ConfigSessionStorage extends ConfigStorage
{

    public $model;

    public function save(ConfigBehavior $configBehavior, $runValidation = true, $attributeNames = null)
    {
        $model = $configBehavior->configModel;
        $configClassName = $configBehavior->configClassName;

        if ($runValidation && !$model->validate($attributeNames)) {
            \Yii::info('Model not inserted due to validation error.', $configClassName);
            return false;
        }

        $data = \Yii::$app->session->get($configClassName, []);
        $data[$configBehavior->configKey] = $configBehavior->configModel->toArray();
        \Yii::$app->session->set($configClassName, $data);

        return true;
    }

    /**
     * @return array
     */
    public function fetch(ConfigBehavior $configBehavior)
    {
        $configClassName = $configBehavior->configClassName;

        if (!$data = \Yii::$app->session->get($configClassName)) {
            return [];
        }

        return (array)ArrayHelper::getValue($data, $configBehavior->configKey);
    }

    /**
     * @return array
     */
    public function delete(ConfigBehavior $configBehavior)
    {
        $configClassName = $configBehavior->configClassName;

        if (!$data = \Yii::$app->session->get($configClassName)) {
            return true;
        }

        ArrayHelper::remove($data, $configBehavior->configKey);
        \Yii::$app->session->set($configClassName, $data);
    }

}