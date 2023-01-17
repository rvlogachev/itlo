<?php 
namespace common\modules\cms\modules\queryfilters\filters\modes;

use common\modules\cms\IHasImage;
use common\modules\cms\IHasName;
use common\modules\cms\modules\queryfilters\filters\FilterField;
use common\modules\cms\traits\THasName;
use yii\base\Component;
use yii\db\ActiveQuery;

class FilterModeLike extends FilterMode
{
    const ID = 'like';

    public function init()
    {
        if (!$this->name) {
            $this->name = 'Содержит';
        }
    }

    /**
     * @var bool
     */
    public $isValue = true;

    public function applyQuery(ActiveQuery $activeQuery)
    {
        if (is_string($this->value) && $this->value == '') {
            return;
        }
        
        $activeQuery->andWhere(['like', $this->attributeName, $this->value]);
    }


}