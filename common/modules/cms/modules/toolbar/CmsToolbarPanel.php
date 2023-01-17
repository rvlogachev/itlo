<?php
namespace common\modules\cms\modules\toolbar;

use yii\base\Component;

/**
 * @property string $name;
 * @property string $summary;
 * @property CmsToolbar $toolbar;
 *
 * Class CmsToolbarPanel
 * @package skeeks\cms\toolbar
 */
class CmsToolbarPanel extends Component
{
    /**
     * @var string panel unique identifier.
     * It is set automatically by the container module.
     */
    public $id;

    /**
     * @return mixed|\common\modules\backend\BackendComponent
     */
    public function getToolbar()
    {
        return \Yii::$app->cmsToolbar;
    }


    /**
     * @return string name of the panel
     */
    public function getName()
    {
        return '';
    }

    /**
     * @return string content that is displayed at debug toolbar
     */
    public function getSummary()
    {
        return '';
    }

    /**
     * @return string content that is displayed in debugger detail view
     */
    public function getDetail()
    {
        return '';
    }

    /**
     * Is the panel enabled?
     * @return bool
     * @since 2.0.10
     */
    public function isEnabled()
    {
        return true;
    }
}