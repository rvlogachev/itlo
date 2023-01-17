<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace common\modules\cms\modules\queryfilters\filters\modes;

use common\modules\cms\IHasImage;
use common\modules\cms\IHasName;
use common\modules\cms\modules\queryfilters\filters\FilterField;
use common\modules\cms\traits\THasName;
use yii\base\Component;
use yii\db\ActiveQuery;

class FilterModeGte extends FilterMode
{
    const ID = 'gte';

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
            $this->name = ' >= ';
        }
    }

    /**
     * @param ActiveQuery $activeQuery
     * @param FilterField $field
     * @return $this
     */
    public function applyQuery(ActiveQuery $activeQuery)
    {
        if (is_string($this->value) && $this->value == '') {
            return;
        }
        
        $activeQuery->andWhere([">=", $this->attributeName, $this->value]);
    }


}