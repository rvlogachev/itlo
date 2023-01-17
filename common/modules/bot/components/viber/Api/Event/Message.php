<?php

namespace common\modules\bot\components\viber\Api\Event;

use common\modules\bot\components\viber\Api\Event;
use common\modules\bot\components\viber\Api\Message\Text;
use common\modules\bot\components\viber\Api\Sender;

/**
 * Triggers when user send message
 *
 * @author Novikov Bogdan <hcbogdan@gmail.com>
 */
class Message extends Event
{
    /**
     * Who send message
     *
     * @var Sender
     */
    protected $sender;

    /**
     * Message data
     *
     * @var \common\modules\bot\components\viber\Api\Message
     */
    protected $message;

    /**
     * Get the value of Who send message
     *
     * @return Sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Get the value of Message data
     *
     * @return Text
     */
    public function getMessage()
    {
        return $this->message;
    }
}
