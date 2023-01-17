<?php
namespace common\modules\cms\modules\queryfilters\filters\modes;

use common\modules\cms\modules\queryfilters\filters\FilterField;
use yii\db\ActiveQuery;

class FilterModeRange extends FilterMode
{
    const ID = 'range';

    /**
     * @var bool
     */
    public $isValue = true;
    public $isValue2 = true;

    /**
     *
     */
    public function init()
    {
        if (!$this->name) {
            $this->name = 'Диапазон';
        }
    }

    /**
     * @param ActiveQuery $activeQuery
     * @param FilterField $field
     * @return $this
     */
    public function applyQuery(ActiveQuery $activeQuery)
    {
        if ($this->value) {
            $activeQuery->andWhere([">=", $this->attributeName, $this->value]);
        }
        if ($this->value2) {
            $activeQuery->andWhere(["<=", $this->attributeName, $this->value2]);
        }
    }


}