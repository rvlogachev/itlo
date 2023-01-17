<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 10.09.2018
 * Time: 21:46
 */

namespace common\modules\bot\commands\actions\types;


use common\modules\bot\commands\actions\Action;
use common\modules\bot\commands\Command;
use common\modules\bot\Request;

class SendMessageAction extends Action
{
    public $getMessage;

    public function __construct(string $id, Command $command, callable $getMessage)
    {
        parent::__construct($id, $command);

        $this->getMessage = $getMessage;
    }

    protected function body()
    {
        $data = [];
        $data['chat_id'] = $this->owner->getChatId();
        $data['text'] = call_user_func($this->getMessage);
        $data['reply_markup'] = new ReplyKeyboardMarkup([
            'selective' => true,
        ]);

        Request::sendMessage($data);
        $this->owner->goNext();
    }
}