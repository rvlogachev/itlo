<?php
namespace common\modules\cms\actions;

use common\modules\cms\helpers\UrlHelper;
use Yii;
use yii\base\Action;

/**
 * Class ErrorAction
 * @package skeeks\cms\actions
 */
class LogoutAction extends Action
{
    /**
     * @return static
     */
    public function run()
    {
        Yii::$app->user->logout();
        if ($ref = UrlHelper::getCurrent()->getRef()) {
            return Yii::$app->getResponse()->redirect($ref);
        } else {
            return Yii::$app->getResponse()->redirect(Yii::$app->getUser()->getReturnUrl());
        }
    }
}
