<?php
/**
 */

namespace common\modules\cms;

/**
 * @property string $name;
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
interface IHasName
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string|array $name
     * @return mixed
     */
    public function setName($name);
}