<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 10.09.2018
 * Time: 19:44
 */

namespace common\modules\bot\commands\actions;


class ActionCollection
{
    private $actions = [];
    private $length;
    
    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function add(Action $action)
    {
        if(count($this->actions) < $this->length)
            $this->actions[] = $action;
    }

    public function remove(string $actionId)
    {
        //
    }

    public function get(string $actionId) : Action
    {
        $index = $this->getIndex($actionId);
        if($index === -1)
            return null;

        return $this->actions[$index];
    }

    public function getAfter(string $actionId) : Action
    {
        $index = $this->getIndex($actionId);
        if($index === -1 || $this->isLast($actionId))
            return null;

        return $this->actions[$index + 1];
    }

    public function getBefor(string $actionId) : Action
    {
        $index = $this->getIndex($actionId);
        if($index === -1 || $this->isFirst($actionId))
            return null;

        return $this->actions[$index - 1];
    }

    public function isFirst(string $actionId) : bool
    {
        return ($this->getIndex($actionId) === 0);
    }

    public function isLast(string $actionId) : bool
    {
        return ($this->getIndex($actionId) === ($this->length - 1));
    }

    private function getIndex(string $actionId) : int
    {
        for ($i = 0; $i < $this->length; $i++)
        {
            if ($this->actions[$i]->actionId === $actionId)
                return $i;
        }

        return -1;
    }
}