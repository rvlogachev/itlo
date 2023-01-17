<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\redirects\models\Redirects;

class RedirectsAPI extends Redirects
{
    public function fields()
    {
        $fields = parent::fields();
        return $fields;
    }
}
