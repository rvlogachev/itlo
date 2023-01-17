<?php
namespace common\modules\backend;

/**
 * Presence of data for building a menu
 *
 * @property array $menuData;
 *
 * Interface IHasMenu
 * @package common\modules\backend
 */
interface IHasMenu
{
    /**
     * @return array
     */
    public function getMenuData();
}