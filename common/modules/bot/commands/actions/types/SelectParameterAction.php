<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 10.09.2018
 * Time: 21:23
 */

namespace common\modules\bot\commands\actions\types;


use common\modules\bot\commands\Command;
use common\modules\bot\components\telegram\Entities\InlineKeyboardMarkup;

class SelectParameterAction extends EnterParameterAction
{
    public $getValues;

    public function __construct(string $id,
                                Command $command,
                                string $name,
                                string $message,
                                callable $getValues,
                                bool $use = true,
                                string $backText = 'Назад')
    {
        parent::__construct($id, $command, $name, $message, $use, $backText);

        $this->getValues = $getValues;
    }

    protected function getDataForRequest(): array
    {
        $data = parent::getDataForRequest();

        $buttons = [];
        $values = call_user_func($this->getValues);
        foreach ($values as $key => $value)
        {
            $buttons[] = ['text' => $value, 'callback_data' => $key];
        }
        $data['reply_markup']['inline_keyboard'] = $buttons;
        return $data;
    }
}