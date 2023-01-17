<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 10.09.2018
 * Time: 19:35
 */

namespace common\modules\bot\commands\actions;


use common\modules\bot\commands\Command;

abstract class Action
{
    public $id;
    public $owner;

    public function __construct(string $id, Command $command)
    {
        $this->id = $id;
        $this->owner = $command;
    }

    public function run()
    {
        if($this->owner->state->actionId === $this->id)
        {
            $this->body();
        }
    }

    abstract protected function body();
}