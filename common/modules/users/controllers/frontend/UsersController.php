<?php

namespace common\modules\users\controllers\frontend;

use common\modules\users\models\UsersSignin;
use Yii;
use common\modules\users\models\Users;
use common\modules\users\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    public $layout = '@frontend/themes/cryptoparrot/layouts/main';



    public function actionLogin()
    {

        $this->layout = '@frontend/themes/cryptoparrot/layouts/main';

        if (!Yii::$app->user->isGuest)
            return $this->redirect(['users/users/login']);

        $model = new UsersSignin();
        if ($model->load(Yii::$app->request->post())) {

            Yii::$app->user->on(\yii\web\User::EVENT_AFTER_LOGIN, function($e) {

                // Log activity
                if (isset(Yii::$app->components['activity'])) {
                    $username = Yii::$app->user->identity->username;
                    Yii::$app->activity->set('User `' . $username . '` has successfully login.', 'login', 'info', 2);
                }
            });

            try {
                if ($model->login()) {
                    return $this->redirect(['admin/index']);
                } else {
                    // Log activity
                    if (isset(Yii::$app->components['activity'])) {
                        $username = $model->username;
                        Yii::$app->activity->set('An error occurred while user `'.$username.'` has attempt login. Wrong password.', 'login', 'danger', 2);
                    }
                }
            } catch (\DomainException $error) {
                Yii::$app->session->setFlash('error', $error->getMessage());
                return $this->redirect(['admin/login']);
            }
        }

        return $this->render('@common/modules/users/views/frontend/login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {

        Yii::$app->user->on(\yii\web\User::EVENT_BEFORE_LOGOUT, function($e) {
            if (isset(Yii::$app->components['activity'])) {
                $username = Yii::$app->user->identity->username;
                Yii::$app->activity->set('User `'.$username.'` has successfully logout.', 'logout', 'info', 2);
            }
        });

        Yii::$app->user->logout();
        return $this->goHome();
    }

}
