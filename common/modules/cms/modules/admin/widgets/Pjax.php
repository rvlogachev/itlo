<?php
namespace common\modules\cms\modules\admin\widgets;

/**
 * Class Pjax
 *
 * @package skeeks\cms\modules\admin\widgets
 */
class Pjax extends \common\modules\cms\widgets\Pjax
{
    /**
     * Block container Pjax
     * @var bool
     */
    public $blockPjaxContainer = true;

    public function init()
    {
        $this->isBlock = $this->blockPjaxContainer;
        parent::init();
    }
}