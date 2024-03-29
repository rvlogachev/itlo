<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\stats\models\Visitors;

class StatsAPI extends Visitors
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['session'], $fields['params']);
        return $fields;
    }
}
