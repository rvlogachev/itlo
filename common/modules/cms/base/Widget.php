<?php
/**
 */

namespace common\modules\cms\base;

use common\modules\cms\traits\TWidget;
use yii\base\ViewContextInterface;
use yii\helpers\ArrayHelper;

/**
 * Class Widget
 * @package skeeks\cms\base
 */
abstract class Widget extends Component implements ViewContextInterface
{
    //Умеет все что умеет \yii\base\Widget
    use TWidget;

    /**
     * @var array
     */
    public $contextData = [];

    /**
     * @param string $namespace Unique code, which is attached to the settings in the database
     * @param array  $config Standard widget settings
     *
     * @return static
     */
    public static function beginWidget($namespace, $config = [])
    {
        $config = ArrayHelper::merge(['namespace' => $namespace], $config);
        return static::begin($config);
    }
}