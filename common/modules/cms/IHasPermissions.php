<?php
/**
 */

namespace common\modules\cms;

/**
 * @property $permissionNames;
 * @property $permissionName;
 * @property bool $isAllow;
 *
 * Interface IHasPermissions
 * @package common\modules\cms
 */
interface IHasPermissions
{
    /**
     * @return string
     */
    public function getPermissionName();

    /**
     * @return array
     */
    public function getPermissionNames();

    /**
     * @return bool
     */
    public function getIsAllow();
}