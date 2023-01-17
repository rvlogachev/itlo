<?php
namespace common\modules\cms\modules\admin\filters;

use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\helpers\UrlHelper;
use yii\web\ForbiddenHttpException;
use yii\web\User;

/**
 * Class AdminLastActivityAccessControl
 * @package skeeks\cms\modules\admin\filters
 */
class AdminLastActivityAccessControl extends \yii\filters\AccessControl
{
    /**
     * Denies the access of the user.
     * The default implementation will redirect the user to the login page if he is a guest;
     * if the user is already logged, a 403 HTTP exception will be thrown.
     * @param User $user the current user
     * @throws ForbiddenHttpException if the user is already logged in.
     */
    protected function denyAccess($user)
    {
        $rr = new RequestResponse();

        if (!$user->getIsGuest()) {
            $authUrl = UrlHelper::construct(["/admin/admin-auth/blocked"])->setCurrentRef()->enableAdmin()->createUrl();

            if (\Yii::$app->request->isAjax && !\Yii::$app->request->isPjax) {
                $rr->redirect = $authUrl;
                return (array)$rr;
            } else {
                \Yii::$app->getResponse()->redirect($authUrl);
            }

        } else {
            throw new ForbiddenHttpException(\Yii::t('yii',
                \Yii::t('skeeks/cms', 'You are not allowed to perform this action.')));
        }
    }
}
