<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\subscribers\models\Subscribers;

class SubscribersAPI extends Subscribers
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['unique_token']);
        return $fields;
    }
}
