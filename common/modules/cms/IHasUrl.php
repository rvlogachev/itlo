<?php
/**
 */

namespace common\modules\cms;

/**
 * @property $url;
 *
 * Interface IHasUrl
 * @package common\modules\cms
 */
interface IHasUrl
{
    /**
     * @return string
     */
    public function getUrl();
}