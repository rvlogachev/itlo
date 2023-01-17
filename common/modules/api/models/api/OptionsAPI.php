<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\options\models\Options;

class OptionsAPI extends Options
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['autoload'], $fields['protected']);
        return $fields;
    }
}
