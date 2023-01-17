<?php

namespace common\modules\cms\grid;
use  common\modules\cms\grid\UserColumnData;

/**
 * Class CreatedAtColumn
 * @package common\modules\cms\grid
 */
class CreatedByColumn extends UserColumnData
{
    public $attribute = "created_by";
}