<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\mailer\models\Mails;

class MailerAPI extends Mails
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['email_source'], $fields['tracking_key']);
        return $fields;
    }
}
