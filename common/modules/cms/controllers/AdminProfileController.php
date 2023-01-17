<?php
namespace common\modules\cms\controllers;

use common\modules\backend\actions\BackendModelAction;
use common\modules\backend\actions\BackendModelUpdateAction;
use common\modules\backend\BackendController;
use common\modules\backend\controllers\BackendModelController;
use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\helpers\UrlHelper;
use common\modules\cms\models\CmsUser;
use common\modules\cms\models\forms\PasswordChangeForm;
use common\modules\cms\models\Search;
use common\modules\cms\modules\admin\actions\AdminAction;
use common\modules\cms\modules\admin\actions\modelEditor\AdminOneModelEditAction;
use common\modules\cms\modules\admin\controllers\AdminController;
use common\modules\cms\modules\admin\controllers\AdminModelEditorController;
use common\modules\cms\rbac\CmsManager;
use Yii;
use common\modules\cms\models\User;
use common\modules\cms\models\searchs\User as UserSearch;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * Class AdminProfileController
 * @package common\modules\cms\controllers
 */
class AdminProfileController extends BackendModelController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    /**
     * @return string
     */
    public function getPermissionName()
    {
        return CmsManager::PERMISSION_ADMIN_ACCESS;
    }

    public function init()
    {
        $this->name = "Личный кабинет";
        $this->modelShowAttribute = "username";
        $this->modelClassName = User::className();
        parent::init();
    }

    public function actions()
    {
        $actions = ArrayHelper::merge(parent::actions(),
            [
                /*'file-manager' =>
                [
                    "class"         => BackendModelAction::class,
                    "name"          => "Личные файлы",
                    "icon"          => "glyphicon glyphicon-folder-open",
                    "callback"      => [$this, 'actionFileManager'],
                ],*/

                'update' =>
                    [
                        'class' => BackendModelUpdateAction::class,
                        "callback" => [$this, 'update'],
                        "isVisible" => false,
                        "accessCallback" => false
                    ],
            ]);


        ArrayHelper::remove($actions, 'delete');
        ArrayHelper::remove($actions, 'create');
        ArrayHelper::remove($actions, 'index');

        return $actions;
    }


    public function update($adminAction)
    {
        /**
         * @var $model CmsUser
         */
        $model = $this->model;
        $relatedModel = $model->relatedPropertiesModel;
        $passwordChange = new PasswordChangeForm([
            'user' => $model
        ]);
        $passwordChange->scenario = PasswordChangeForm::SCENARION_NOT_REQUIRED;

        $rr = new RequestResponse();

        if (\Yii::$app->request->isAjax && !\Yii::$app->request->isPjax) {
            $model->load(\Yii::$app->request->post());
            $relatedModel->load(\Yii::$app->request->post());
            $passwordChange->load(\Yii::$app->request->post());

            return \yii\widgets\ActiveForm::validateMultiple([
                $model,
                $relatedModel,
                $passwordChange
            ]);
        }

        if ($rr->isRequestPjaxPost()) {
            $model->load(\Yii::$app->request->post());
            $relatedModel->load(\Yii::$app->request->post());
            $passwordChange->load(\Yii::$app->request->post());

            try {


                if ($model->load(\Yii::$app->request->post()) && $model->save()) {


                    if ($relatedModel->load(\Yii::$app->request->post())) {
                        if (!$relatedModel->save()) {
                            throw new Exception("Не удалось сохранить дополнительные свойства: " . print_r($relatedModel->errors, true));
                        }
                    }

                    if ($passwordChange->load(\Yii::$app->request->post()) && $passwordChange->new_password) {
                        if (!$passwordChange->changePassword()) {
                            throw new Exception("Пароль не изменен");
                        }

                        \Yii::$app->getSession()->setFlash('success', \Yii::t('skeeks/cms', 'Пароль успешно обновлен'));
                    }


                    if (\Yii::$app->request->post('submit-btn') == 'apply') {

                    } else {
                        return $this->redirect(
                            $this->url
                        );
                    }

                    $model->refresh();

                    \Yii::$app->getSession()->setFlash('success', \Yii::t('skeeks/cms', 'Данные обновлены'));

                } else {
                    throw new Exception("Не удалось сохранить дополнительные свойства: " . print_r($model->errors, true));
                }

            } catch (\Exception $e) {
                \Yii::$app->getSession()->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('_form', [
            'model' => $model,
            'relatedModel' => $relatedModel,
            'passwordChange' => $passwordChange,
        ]);
    }


    public function beforeAction($action)
    {
        $this->model = \Yii::$app->user->identity;
        return parent::beforeAction($action);
    }

    /**
     * @return mixed|\yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(UrlHelper::construct("cms/admin-profile/update")->enableAdmin()->toString());
    }

    /**
     * Updates an existing Game model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionFileManager()
    {
        $model = $this->model;


        return $this->render('@skeeks/cms/views/admin-user/file-manager', [
            'model' => $model
        ]);

    }*/


    /**
     * Updates an existing Game model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionChangePassword()
    {
        $model = $this->model;

        $modelForm = new PasswordChangeForm([
            'user' => $model
        ]);

        if (\Yii::$app->request->isAjax && !\Yii::$app->request->isPjax) {
            $modelForm->load(\Yii::$app->request->post());
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return \skeeks\cms\modules\admin\widgets\ActiveForm::validate($modelForm);
        }


        if ($modelForm->load(\Yii::$app->request->post()) && $modelForm->changePassword()) {
            \Yii::$app->getSession()->setFlash('success', 'Успешно сохранено');
            return $this->redirect(['change-password', 'id' => $model->id]);
        } else {
            if (\Yii::$app->request->isPost) {
                \Yii::$app->getSession()->setFlash('error', 'Не удалось изменить пароль');
            }

            return $this->render('@skeeks/cms/views/admin-user/change-password.php', [
                'model' => $modelForm
            ]);

            /*return $this->render('_form-change-password', [
                'model' => $modelForm,
            ]);*/
        }
    }


}
