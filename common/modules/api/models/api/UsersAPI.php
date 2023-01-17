<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\users\models\Users;

class UsersAPI extends Users
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['auth_key'], $fields['password_hash'], $fields['email_confirm_token'], $fields['password_reset_token']);
        return $fields;
    }
}
