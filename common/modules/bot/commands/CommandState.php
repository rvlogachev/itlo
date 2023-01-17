<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 10.09.2018
 * Time: 19:01
 */

namespace common\modules\bot\commands;


use common\modules\bot\Conversation;
use phpDocumentor\Reflection\Types\This;

class CommandState
{
    public $run;
    public $actionId;

    private $conversation;

    public function __construct(Conversation $conversation, string $beginActionId)
    {
        $this->conversation = $conversation;

        $this->run = $this->conversation->notes['run'];
        if (!isset($this->run))
            $this->run = true;

        $this->actionId = $this->conversation->notes['actionId'];
        if (!isset($this->actionId))
            $this->actionId = $beginActionId;
    }

    public function exist(string $name) : bool
    {
        return array_key_exists($name, $this->conversation->notes);
    }

    public function get(string $name) : string
    {
        if($this->exist($name))
            return null;
        return $this->conversation->notes[$name];
    }

    public function set(string $name, string $value) : void
    {
        $this->conversation->notes[$name] = $value;
    }

    public function update() : void
    {
        $this->conversation->update();
    }

    public function stop() : void
    {
        unset($this->conversation->notes['run']);
        unset($this->conversation->notes['actionId']);

        $this->conversation->stop();
    }
}