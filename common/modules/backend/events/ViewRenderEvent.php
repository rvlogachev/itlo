<?php
/**
 */
namespace common\modules\backend\events;

use yii\base\Event;

class ViewRenderEvent extends Event {

    /**
     * @var string 
     */
    public $content = '';
}