<?php
namespace common\modules\cms\modules\config;

use yii\base\Component;

class ConfigStorage extends Component implements IConfigStorage
{
    /**
     * @param ConfigBehavior $configBehavior
     * @param bool           $runValidation
     * @param null           $attributeNames
     * @return bool
     */
    public function save(ConfigBehavior $configBehavior, $runValidation = true, $attributeNames = null)
    {
        return true;
    }

    /**
     * @param ConfigBehavior $configBehavior
     * @return bool
     */
    public function exists(ConfigBehavior $configBehavior)
    {
        return (bool)$this->fetch($configBehavior);
    }

    /**
     * @return array
     */
    public function fetch(ConfigBehavior $configBehavior)
    {
        return [];
    }

    /**
     * @return bool
     */
    public function delete(ConfigBehavior $configBehavior)
    {
        return true;
    }
}

