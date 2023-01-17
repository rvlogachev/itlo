<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 10.09.2018
 * Time: 21:02
 */

namespace common\modules\bot\commands\actions\types;


use common\modules\bot\commands\Command;

class ExitAction extends BackAction
{
    public function __construct(string $id, Command $command)
    {
        parent::__construct($id, $command, true, 'Главное меню');
    }

    public function body()
    {
        $this->owner->exit();
    }
}