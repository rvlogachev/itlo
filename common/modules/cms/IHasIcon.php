<?php
namespace common\modules\cms;

interface IHasIcon
{
    /**
     * @return string
     */
    public function getIcon();

    /**
     * @param string $icon
     * @return mixed
     */
    public function setIcon($icon);
}