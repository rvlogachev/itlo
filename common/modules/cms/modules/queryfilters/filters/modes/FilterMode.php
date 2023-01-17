<?php
namespace common\modules\cms\modules\queryfilters\filters\modes;

use common\modules\cms\IHasImage;
use common\modules\cms\IHasName;
use common\modules\cms\modules\queryfilters\filters\FilterField;
use common\modules\cms\traits\THasName;
use yii\base\Component;
use yii\db\ActiveQuery;

class FilterMode extends Component implements IHasName
{
    use THasName;

    const ID = '';

    /**
     * @var
     */
    public $value;

    /**
     * @var
     */
    public $value2;

    /**
     * @var bool
     */
    public $isValue = false;

    /**
     * @var bool
     */
    public $isValue2 = false;

    /**
     * @var string
     */
    public $attributeName;

    public function applyQuery(ActiveQuery $activeQuery)
    {}

    public function getId()
    {
        return static::ID;
    }
}