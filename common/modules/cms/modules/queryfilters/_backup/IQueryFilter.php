<?php
namespace common\modules\cms\modules\queryfilters;

use yii\db\ActiveQueryInterface;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
interface IQueryFilter
{
    /**
     * @param ActiveQueryInterface $activeQuery
     * @return $this
     */
    public function apply(ActiveQueryInterface $activeQuery);
}