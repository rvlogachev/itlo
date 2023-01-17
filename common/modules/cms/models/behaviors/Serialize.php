<?php
/**
 * Serialize
 *
 * @author Roman Logachev
 * @link http://itlo.ru/
 * @copyright 2018-2021 ITLO (CMS)
 * @date 15.11.2021
 * @since 0.0.1
 */

namespace common\modules\cms\models\behaviors;

use yii\db\BaseActiveRecord;
use \yii\base\Behavior;
use yii\base\Event;

/**
 * Class Serialize
 * @package skeeks\cms\models\behaviors
 */
class Serialize extends Behavior
{
    /**
     * @var array
     */
    public $fields = [];

    /**
     * @return array
     */
    public function events()
    {
        return [
            BaseActiveRecord::EVENT_BEFORE_INSERT => "serializeFields",
            BaseActiveRecord::EVENT_BEFORE_UPDATE => "serializeFields",
            BaseActiveRecord::EVENT_AFTER_FIND => "unserializeFields",
            BaseActiveRecord::EVENT_AFTER_UPDATE => "unserializeFields",
            BaseActiveRecord::EVENT_AFTER_INSERT => "unserializeFields",
        ];
    }

    /**
     * @param Event $event
     */
    public function serializeFields($event)
    {
        foreach ($this->fields as $fielName) {
            if ($this->owner->{$fielName}) {
                if (is_array($this->owner->{$fielName})) {
                    $this->owner->{$fielName} = serialize($this->owner->{$fielName});
                }
            } else {
                $this->owner->{$fielName} = "";
            }
        }
    }


    /**
     * @param Event $event
     */
    public function unserializeFields($event)
    {
        foreach ($this->fields as $fielName) {
            if ($this->owner->{$fielName}) {
                if (is_string($this->owner->{$fielName})) {
                    $this->owner->{$fielName} = @unserialize($this->owner->{$fielName});
                }
            } else {
                $this->owner->{$fielName} = [];
            }
        }
    }
}
