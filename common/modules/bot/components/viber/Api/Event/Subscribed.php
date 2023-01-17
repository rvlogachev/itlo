<?php

namespace common\modules\bot\components\viber\Api\Event;

use common\modules\bot\components\viber\Api\Event;
use common\modules\bot\components\viber\Api\User;

/**
 * Triggers when user clicks a subscribe button
 *
 * @author Novikov Bogdan <hcbogdan@gmail.com>
 */
class Subscribed extends Event
{
    /**
     * Viber user
     * @var User
     */
    protected $user;

    /**
     * Get the value of Viber user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
