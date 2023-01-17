<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\search\models\LiveSearch;

class LiveSearchAPI extends LiveSearch
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['snippets'], $fields['created_at'], $fields['updated_at'], $fields['status']);
        $fields = array_merge($fields, ["snippet"]);
        return $fields;
    }
}
