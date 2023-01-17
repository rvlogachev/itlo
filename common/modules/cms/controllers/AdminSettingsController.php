<?php
namespace common\modules\cms\controllers;

use common\modules\backend\BackendController;
use common\modules\cms\base\Component;
use common\modules\cms\components\Cms;
use common\modules\cms\modules\admin\actions\AdminAction;
use common\modules\cms\modules\admin\controllers\AdminController;
use common\modules\cms\modules\config\ConfigBehavior;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Class AdminSettingsController
 * @package common\modules\cms\controllers
 */
class AdminSettingsController extends BackendController
{

    public $layout = '@backend/themes/adminlte/views/layouts/clean';


    public function init()
    {
        $this->name = "Управление настройками";
        $this->generateAccessActions = false;
        //$this->permissionName = "cms/admin-settings";
        parent::init();
    }

    public function actions()
    {
        return [
            "index" => [
                "class"    => AdminAction::className(),
                "name"     => "Настройки",
                "callback" => [$this, 'actionIndex'],
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = '@backend/themes/adminlte/views/layouts/common';

        $loadedComponents = [];
        $loadedForSelect = [];
        $component = '';
        $componentSelect = Cms::className();

        foreach (\Yii::$app->getComponents(true) as $id => $data) {
            $loadedComponent = \Yii::$app->get($id);
            if ($loadedComponent instanceof Component) {
                $loadedComponents[$loadedComponent->className()] = $loadedComponent;

                if ($name = $loadedComponent->descriptor->name) {
                    $loadedForSelect[$loadedComponent->className()] = $name;
                } else {
                    $loadedForSelect[$loadedComponent->className()] = $loadedComponent->className();
                }
            } elseif ($loadedComponent instanceof \yii\base\Component && $loadedComponent->getBehavior(ConfigBehavior::class)) {
                $loadedComponents[$loadedComponent->className()] = $loadedComponent;
                $loadedForSelect[$loadedComponent->className()] = $id;
            }
        }

        if (\Yii::$app->request->get("component")) {
            $componentSelect = \Yii::$app->request->get("component");
        }

        $component = ArrayHelper::getValue($loadedComponents, $componentSelect);

        if ($component && $component instanceof Component) {

            if (\Yii::$app->request->isAjax && !\Yii::$app->request->isPjax) {
                $component->load(\Yii::$app->request->post());
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($component);
            }

            if (\Yii::$app->request->isAjax) {
                if ($component->load(\Yii::$app->request->post())) {
                    $component->override = Component::OVERRIDE_DEFAULT;
                    if ($component->save()) {
                        \Yii::$app->getSession()->setFlash('success', 'Успешно сохранено');
                    } else {
                        \Yii::$app->getSession()->setFlash('error', 'Не удалось сохранить');
                    }

                } else {
                    \Yii::$app->getSession()->setFlash('error', 'Не удалось сохранить');
                }

            }
        }

        if ($component) {

        }


        return $this->render('index', [
            'loadedComponents' => $loadedComponents,
            'loadedForSelect'  => $loadedForSelect,
            'component'        => $component,
        ]);
    }

}
