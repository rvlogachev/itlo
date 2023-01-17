<?php


namespace common\modules\bot;





use common\modules\bot\components\telegram\Entities\CallbackQuery;
use common\modules\bot\components\telegram\Entities\ChosenInlineResult;
use common\modules\bot\components\telegram\Entities\Entity;
use common\modules\bot\components\telegram\Entities\InlineQuery;
use common\modules\bot\components\telegram\Entities\Message;
use common\modules\bot\components\telegram\Entities\PreCheckoutQuery;

class Update extends Entity
{

    protected $update_id;
    protected $message;
    protected $edited_message;
    protected $inline_query;
    protected $chosen_inline_result;
    protected $callback_query;
    protected $pre_checkout_query;

    private $update_type;

    /**
     * Update constructor.
     *
     * @param array $data
     * @param $bot_name
     */
    public function __construct(array $data, $bot_name, $client = 'telegram')
    {


        \Yii::info("Конструктор Update  ", 'chat');

        switch ($client) {

            case 'facebook':


                break;
            case 'telegram':

                   \Yii::info("__construct UPDATE telegram", 'chat');

                $this->bot_name = $bot_name;

                $update_id = isset($data['update_id']) ? $data['update_id'] : null;
                $this->update_id = $update_id;

                $this->message = isset($data['message']) ? $data['message'] : null;
                if (!empty($this->message)) {
                    $this->message = new Message($this->message, $bot_name);
                    $this->update_type = 'message';
                }

                $this->edited_message = isset($data['edited_message']) ? $data['edited_message'] : null;
                if (!empty($this->edited_message)) {
                    $this->edited_message = new Message($this->edited_message, $bot_name);
                    $this->update_type = 'edited_message';
                }


                $this->inline_query = isset($data['inline_query']) ? $data['inline_query'] : null;
                if (!empty($this->inline_query)) {
                    $this->inline_query = new InlineQuery($this->inline_query);
                    $this->update_type = 'inline_query';
                }

                $this->chosen_inline_result = isset($data['chosen_inline_result']) ? $data['chosen_inline_result'] : null;
                if (!empty($this->chosen_inline_result)) {
                    $this->chosen_inline_result = new ChosenInlineResult($this->chosen_inline_result);
                    $this->update_type = 'chosen_inline_result';
                }


                $this->callback_query = isset($data['callback_query']) ? $data['callback_query'] : null;
                if (!empty($this->callback_query)) {
                    $this->callback_query = new CallbackQuery($this->callback_query);
                    $this->update_type = 'callback_query';
                }


                $this->pre_checkout_query = isset($data['pre_checkout_query']) ? $data['pre_checkout_query'] : null;
                if (!empty($this->pre_checkout_query)) {
                    $this->pre_checkout_query = new PreCheckoutQuery($this->pre_checkout_query);
                    $this->update_type = 'pre_checkout_query';
                }


                break;


            case 'vk':
                \Yii::info("__construct UPDATE vk ", 'chat');

                break;

            case 'viber':


                break;


        }


         //  \Yii::info("   __construct end  this ".print_r($this,true), 'chat');

    }

    public function getUpdateId()
    {
        return $this->update_id;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getEditedMessage()
    {
        return $this->edited_message;
    }

    public function getInlineQuery()
    {
        return $this->inline_query;
    }

    public function getCallbackQuery()
    {
        return $this->callback_query;
    }

    public function getChosenInlineResult()
    {
        return $this->chosen_inline_result;
    }

    public function getUpdateType()
    {
        return $this->update_type;
    }

    public function getPreCheckoutQuery()
    {
        return $this->pre_checkout_query;
    }

    public function getSuccessfulPayment()
    {
        return $this->successful_payment;
    }


    public function getUpdateContent()
    {
        if ($this->update_type == 'message') {
            return $this->getMessage();
        } elseif ($this->update_type == 'inline_query') {
            return $this->getInlineQuery();
        } elseif ($this->update_type == 'chosen_inline_result') {
            return $this->getChosenInlineResult();
        } elseif ($this->update_type == 'callback_query') {
            return $this->getCallbackQuery();
        }
    }
}
