<?php
/**
 */

namespace common\modules\cms\traits;

/**
 * @property $icon;
 *
 */
trait THasIcon
{
    /**
     * @var string
     */
    protected $_icon = '';

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->_icon;
    }

    /**
     * @param $icon
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->_icon = $icon;
        return $this;
    }
}