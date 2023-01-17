<?php
namespace common\modules\backend;

/**
 * Presence of data for building a breadcrumbs
 *
 * @property array $breadcrumbsData;
 *
 * Interface IHasBreadcrumbs
 * @package skeeks\cms\backend
 */
interface IHasBreadcrumbs
{
    /**
     * @return array
     */
    public function getBreadcrumbsData();
}