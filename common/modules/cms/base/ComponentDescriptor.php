<?php
namespace common\modules\cms\base;

use common\modules\cms\IHasImage;
use common\modules\cms\IHasName;
use common\modules\cms\traits\THasImage;
use common\modules\cms\traits\THasName;

class ComponentDescriptor extends \yii\base\Component implements IHasName, IHasImage
{
    use THasName;
    use THasImage;

    public $description = "";
    public $keywords = [];
    public $homepage;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->name;
    }

}