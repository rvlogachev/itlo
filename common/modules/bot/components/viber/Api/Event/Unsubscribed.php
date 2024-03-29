<?php

namespace common\modules\bot\components\viber\Api\Event;

use common\modules\bot\components\viber\Api\Event;

/**
 * Triggers when user unsubscribe from the PA
 *
 * @author Novikov Bogdan <hcbogdan@gmail.com>
 */
class Unsubscribed extends Event
{
    /**
     * Viber user id
     *
     * @var string
     */
    protected $user_id;

    /**
     * Get the value of Viber user id
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
