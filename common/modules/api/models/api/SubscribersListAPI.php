<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\subscribers\models\SubscribersList;

class SubscribersListAPI extends SubscribersList
{
    public function fields()
    {
        $fields = parent::fields();
        return $fields;
    }
}
