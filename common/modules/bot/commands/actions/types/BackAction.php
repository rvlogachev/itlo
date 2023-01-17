<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 10.09.2018
 * Time: 20:58
 */

namespace common\modules\bot\commands\actions\types;


use common\modules\bot\commands\actions\Action;
use common\modules\bot\commands\Command;

abstract class BackAction extends Action
{
    public $useBack;
    public $backText;

    public function __construct(string $id, Command $command, bool $use = true, string $backText = 'Назад')
    {
        parent::__construct($id, $command);

        $this->useBack = $use;
        $this->backText = $backText;
    }

    public function body()
    {
        if ($this->useBack &&
            $this->owner->getMessageText() === $this->backText)
            $this->owner->goBack();
    }
}