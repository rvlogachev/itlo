<?php
namespace common\modules\cms\modules\config;

interface IConfigStorage
{
    /**
     * @param ConfigBehavior $configBehavior
     * @param bool           $runValidation
     * @param null           $attributeNames
     * @return bool
     */
    public function save(ConfigBehavior $configBehavior, $runValidation = true, $attributeNames = null);

    /**
     * @param ConfigBehavior $configBehavior
     * @return array
     */
    public function fetch(ConfigBehavior $configBehavior);

    /**
     * @param ConfigBehavior $configBehavior
     * @return bool
     */
    public function exists(ConfigBehavior $configBehavior);

    /**
     * @return bool
     */
    public function delete(ConfigBehavior $configBehavior);
}

