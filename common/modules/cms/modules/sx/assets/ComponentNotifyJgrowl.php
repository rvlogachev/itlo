<?php
namespace common\modules\cms\modules\sx\assets;
use yii\helpers\Json;

/**
 * Class ComponentNotify
 * @package skeeks\sx\assets
 */
class ComponentNotifyJgrowl extends ComponentNotify
{
    public $css = [];
    public $js = [
        'js/components/notify/NotifyJgrowl.js',
    ];
    public $depends = [
        'common\modules\cms\modules\sx\assets\JqueryJgrowl',
        'common\modules\cms\modules\sx\assets\ComponentNotify'
    ];
}