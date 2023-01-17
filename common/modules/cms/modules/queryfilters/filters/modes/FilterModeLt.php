<?php
namespace common\modules\cms\modules\queryfilters\filters\modes;

use common\modules\cms\IHasImage;
use common\modules\cms\IHasName;
use common\modules\cms\modules\queryfilters\filters\FilterField;
use common\modules\cms\traits\THasName;
use yii\base\Component;
use yii\db\ActiveQuery;

class FilterModeLt extends FilterMode
{
    const ID = 'lt';

    /**
     * @var bool
     */
    public $isValue = true;

    /**
     * 
     */
    public function init()
    {
        if (!$this->name) {
            $this->name = ' < ';
        }
    }

    /**
     * @param ActiveQuery $activeQuery
     * @param FilterField $field
     * @return $this
     */
    public function applyQuery(ActiveQuery $activeQuery)
    {
        if (!$this->value) {
            return;
        }
        
        $activeQuery->andWhere(["<", $this->attributeName, $this->value]);
    }


}