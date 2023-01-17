<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\tasks\models\Tasks;

class TasksAPI extends Tasks
{
    public function fields()
    {
        $fields = parent::fields();
        return $fields;
    }
}
