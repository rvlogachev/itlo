<?php
namespace common\modules\backend;
use yii\base\Action;

/**
 * @property BackendAction[] $actions;
 * @property BackendAction[] $allActions;
 *
 * Interface IHasInfoActions
 * @package common\modules\backend
 */
interface IHasInfoActions
{
    /**
     * @return Action[]
     */
    public function getActions();

    /**
     * @return Action[]
     */
    public function getAllActions();
}