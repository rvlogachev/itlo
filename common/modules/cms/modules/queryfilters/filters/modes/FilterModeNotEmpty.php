<?php
namespace common\modules\cms\modules\queryfilters\filters\modes;

use common\modules\cms\IHasImage;
use common\modules\cms\IHasName;
use common\modules\cms\modules\queryfilters\filters\FilterField;
use common\modules\cms\traits\THasName;
use yii\base\Component;
use yii\db\ActiveQuery;

class FilterModeNotEmpty extends FilterMode
{
    const ID = 'not_empty';

    public function init()
    {
        if (!$this->name) {
            $this->name = 'Значение заполнено';
        }
    }

    /**
     * @param ActiveQuery $activeQuery
     * @param FilterField $field
     * @return $this
     */
    public function applyQuery(ActiveQuery $activeQuery)
    {
        $activeQuery->andWhere([
            'or',
            ['!=', $this->attributeName, ''],
            ['is not', $this->attributeName, null],
        ]);

        return $this;
    }


}