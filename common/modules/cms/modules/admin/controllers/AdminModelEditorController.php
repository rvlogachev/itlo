<?php
namespace common\modules\cms\modules\admin\controllers;

use common\modules\backend\actions\BackendModelAction;
use common\modules\backend\actions\BackendModelCreateAction;
use common\modules\backend\actions\BackendModelDeleteAction;
use common\modules\backend\actions\BackendModelUpdateAction;
use common\modules\backend\actions\IBackendModelAction;
use common\modules\backend\actions\IBackendModelMultiAction;
use common\modules\backend\controllers\IBackendModelController;
use common\modules\backend\controllers\TBackendModelController;
use common\modules\cms\base\widgets\ActiveForm;
use common\modules\cms\components\Cms;
use common\modules\cms\helpers\ComponentHelper;
use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\IHasModel;
use common\modules\cms\models\Search;
use common\modules\cms\modules\admin\actions\modelEditor\AdminMultiModelEditAction;
use common\modules\cms\modules\admin\actions\modelEditor\ModelEditorGridAction;
use common\modules\cms\modules\backend\AdminAccessControl;
use yii\base\ActionEvent;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\base\Model;
use yii\behaviors\BlameableBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class AdminModelEditorController
 * @package common\modules\cms\modules\admin\controllers
 */
abstract class AdminModelEditorController extends AdminController
    implements IHasModel, IBackendModelController
{
    use TBackendModelController;

    public function init()
    {
        parent::init();
        $this->_ensureBackendModelController();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'class'      => ModelEditorGridAction::className(),
                'name'       => \Yii::t('skeeks/cms', 'List'),
                "icon"       => "fa fa-list",
                "priority"   => 10,

            ],

            "create" => ['class' => BackendModelCreateAction::class],
            "update" => ['class' => BackendModelUpdateAction::class],
            "delete" => ['class' => BackendModelDeleteAction::class],

            "delete-multi" =>
                [
                    'class'        => AdminMultiModelEditAction::className(),
                    "name"         => \Yii::t('skeeks/cms', "Delete"),
                    "icon"         => "fa fa-trash",
                    "confirm"      => \Yii::t('skeeks/cms', 'Are you sure you want to permanently delete the selected items?'),
                    "eachCallback" => [$this, 'eachMultiDelete'],
                    "priority"     => 99999,
                ],

        ]);
    }


    /**
     * @return $this
     */
    protected function _initMetaData()
    {
        $data = [];
        $data[] = \Yii::$app->name;
        $data[] = $this->name;

        if ($this->model) {
            if ($this->action instanceof IBackendModelAction) {
                $data[] = $this->model->{$this->modelShowAttribute};
            }
        }

        if ($this->action && property_exists($this->action, 'name')) {
            $data[] = $this->action->name;
        }

        $this->view->title = implode(" / ", $data);
        return $this;
    }


    /**
     * @param $model
     * @param $action
     * @return bool
     * @deprecated
     */
    public function eachMultiDelete($model, $action)
    {
        try {
            return $model->delete();
        } catch (\Exception $e) {
            return false;
        }
    }


    /**
     * @return array
     * @throws \yii\web\NotFoundHttpException
     * @deprecated
     */
    public function actionSortablePriority()
    {
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            \Yii::$app->response->format = Response::FORMAT_JSON;

            if ($keys = \Yii::$app->request->post('keys')) {
                //$counter = count($keys);

                foreach ($keys as $counter => $key) {
                    $priority = ($counter + 1) * 1000;

                    $modelClassName = $this->modelClassName;
                    $model = $modelClassName::findOne($key);
                    if ($model) {
                        $model->priority = $priority;
                        $model->save(false);
                    }

                    //$counter = $counter - 1;
                }
            }

            return [
                'success' => true,
                'message' => \Yii::t('skeeks/cms', 'Changes saved'),
            ];
        }
    }
}