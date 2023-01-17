<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\tickets\models\Tickets;

class TicketsAPI extends Tickets
{
    public function fields()
    {
        $fields = parent::fields();
        return $fields;
    }
}
