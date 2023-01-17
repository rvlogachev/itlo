<?php

namespace common\modules\bot\components\viber\Api\Message;

use common\modules\bot\components\viber\Api\Message;

/**
 * Text-only message
 *
 * @author Novikov Bogdan <hcbogdan@gmail.com>
 */
class Text extends Message
{
    /**
     * The text of the message
     *
     * @var string
     */
    protected $text;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return Type::TEXT;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'text' => $this->getText()
        ]);
    }

    /**
     * Get the value of The text of the message
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of The text of the message
     *
     * @param string text
     *
     * @return static
     */
    public function setText($text)
    {

        \Yii::info("setText ", 'viberbot');

        $this->text = $text;

        return $this;
    }
}
