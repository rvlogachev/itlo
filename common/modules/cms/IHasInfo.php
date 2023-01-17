<?php
/**
 */

namespace common\modules\cms;

/**
 * @deprecated
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
interface IHasInfo
{
    /**
     * Name
     * @return string
     */
    public function getName();

    /**
     * Icon name
     * @return array
     */
    public function getIcon();

    /**
     * Image url
     * @return string
     */
    public function getImage();
}