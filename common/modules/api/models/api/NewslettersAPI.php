<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\newsletters\models\Newsletters;

class NewslettersAPI extends Newsletters
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['unique_token'], $fields['workflow'], $fields['params']);
        return $fields;
    }
}
