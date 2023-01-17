<?php
/**
 */

namespace common\modules\cms\relatedProperties\propertyTypes;

use common\modules\cms\relatedProperties\PropertyType;

/**
 * Class PropertyTypeFile
 * @package skeeks\cms\relatedProperties\propertyTypes
 */
class PropertyTypeFile extends PropertyType
{
    public $code = self::CODE_FILE;

    public function init()
    {
        parent::init();

        if (!$this->name) {
            $this->name = \Yii::t('skeeks/cms', 'File');
        }
    }
}