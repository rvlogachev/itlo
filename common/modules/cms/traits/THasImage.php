<?php
/**
 */

namespace common\modules\cms\traits;

/**
 * @property $image;
 *
 */
trait THasImage
{
    /**
     * @var string
     */
    protected $_image = '';

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->_image = $image;
        return $this;
    }
}