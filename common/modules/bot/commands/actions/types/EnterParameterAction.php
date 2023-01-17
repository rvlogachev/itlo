<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 10.09.2018
 * Time: 21:06
 */

namespace common\modules\bot\commands\actions\types;


use common\modules\bot\commands\Command;
use common\modules\bot\components\telegram\Entities\ReplyKeyboardMarkup;
use common\modules\bot\Request;
use phpDocumentor\Reflection\Types\This;

class EnterParameterAction extends BackAction
{
    public $name;
    public $message;

    public function __construct(string $id,
                                Command $command,
                                string $name,
                                string $message,
                                bool $use = true,
                                string $backText = 'Назад')
    {
        parent::__construct($id, $command, $use, $backText);

        $this->name = $name;
        $this->message = $message;
    }

    public function body()
    {
        parent::body();

        if (!empty($this->owner->getMessageText()))
        {
            Request::sendMessage($this->getDataForRequest());
        }
        else
        {
            $this->owner->state->set($this->name, $this->owner->getMessageText());
            $this->owner->goNext();
        }
    }

    protected function getDataForRequest(): array
    {
        $data = [];
        $data['chat_id'] = $this->owner->getChatId();
        $data['text'] = $this->message;
        if ($this->useBack) {
            $data['reply_markup'] = new ReplyKeyboardMarkup([
                'keyboard' => [$this->backText],
                'resize_keyboard' => true,
                'one_time_keyboard' => false,
                'selective' => false
            ]);
        }

        return $data;
    }


}