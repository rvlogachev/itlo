<?php
namespace common\modules\backend\controllers;

use common\modules\backend\actions\BackendGridModelAction;
use common\modules\backend\actions\BackendModelCreateAction;
use common\modules\backend\actions\BackendModelDeleteAction;
use common\modules\backend\actions\BackendModelUpdateAction;
use common\modules\backend\controllers\BackendModelController;
use common\modules\backend\models\BackendShowing;
use common\modules\cms\modules\agent\CmsAgent;
use common\modules\cms\modules\sx\helpers\ResponseHelper;
use common\modules\cms\modules\config\ConfigComponent;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminBackendShowingController extends BackendModelController
{
    public function init()
    {
        $this->name = \Yii::t('skeeks/backend', 'Showings');
        $this->modelShowAttribute = "name";
        $this->modelClassName = BackendShowing::class;

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [

                "create" => [
                    'class'         => BackendModelCreateAction::class,
                    'callback' => [$this, 'actionCreate']
                ],
                "update" => [
                    'class'         => BackendModelUpdateAction::class,
                    'fields' => [
                        'name',
                    ]
                ],
                "delete" => [
                    'class'         => BackendModelDeleteAction::class
                ],


                'index' => [
                    "name"    => \Yii::t('skeeks/backend', 'Showings'),
                    'class'   => BackendGridModelAction::class,
                    "filters" => [
                        /*'visibleFilters' => [
                            'id',
                            'created_by',
                        ],*/
                        /*'filtersModel'   => [
                            'rules'            => [
                                ['test', 'safe'],
                            ],
                            'attributeDefines' => [
                                'test',
                            ],
                            'fields'           => [
                                'test' => [
                                ],
                            ],
                        ],*/
                    ],
                    "grid"    => [
                        /*'on ready' => function(Event $e) {
                            /**
                             * @var $dataProvider ActiveDataProvider
                            $dataProvider = $e->sender->dataProvider;
                            $dataProvider->query->andWhere(['cms_user_id' => \Yii::$app->user->id]);
                        },*/
                        /*'visibleColumns' => [
                            'checkbox',
                            'actions',
                            'id',
                            'status',

                            'cms_user_id',
                            'hosting_vps_tariff_id',
                        ],

                        'columns' => [
                            'status' => [
                                'value' => function (HostingVps $model) {
                                    return $model->statusText;
                                },
                            ],
                        ],*/
                    ],
                ],

            ]
        );
    }

    /**
     * Создание представления
     * @return array|ResponseHelper
     */
    public function actionCreate()
    {
        $rr = new ResponseHelper();
        $showing = new BackendShowing();

        if (\Yii::$app->request->post()) {
            if (\Yii::$app->request->get('sx-validate')) {
                return $rr->ajaxValidateForm($showing);
            } else {
                if ($showing->load(\Yii::$app->request->post()) && $showing->save()) {
                    $rr->success = true;
                }
            }
        }

        return $rr;
    }



    public function actionComponentEdit()
    {
        $className = \Yii::$app->request->get('componentClassName');

        $configBehaviorData = ArrayHelper::getValue($this->getCallableData(), 'callAttributes.configBehaviorData');

        /**
         * @var $component ConfigComponent
         */
        $component = new $className([
            'configBehaviorData' => $configBehaviorData
        ]);
        $model = $component->configModel;

        ///var_dump($component->configStorage);die;
        if (!$component->configStorage->exists($component->configBehavior)) {
            $model->setAttributes((array) ArrayHelper::getValue($this->getCallableData(), 'callAttributes'));
        }

        $error = null;
        $success = null;
        $deleted = false;
        try {
            if (\Yii::$app->request->post()) {
                if (\Yii::$app->request->post('delete')) {
                    $component->configStorage->delete($component->configBehavior);
                    $component->configRefresh();
                    $deleted = true;
                } else {
                    if ($model->load(\Yii::$app->request->post())) {
                        if ($component->saveConfig()) {
                            $success = "Saved";
                        }
                    } else {
                        $error = "Not saved";
                    }
                }
                
            }
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        return $this->render($this->action->id, [
            'component' => $component,
            'error' => $error,
            'success' => $success,
            'deleted' => $deleted,
        ]);
    }

    /**
     * Промежуточный шаг, получение данных из вызываемого окна
     * отправка их в метод component-save-callable
     * редирект на редактирование компонента
     *
     * @return string
     */
    public function actionComponentCallEdit()
    {
        $className = \Yii::$app->request->get('componentClassName');

        return $this->render($this->action->id, [
            'component' => new $className(),
            'callable_id' => \Yii::$app->request->get('callable_id'),
        ]);
    }

    /**
     * Сохранение данных вызова компонента
     * @return ResponseHelper
     */
    public function actionComponentSaveCallable()
    {
        $rr = new ResponseHelper();

        if ($data = \Yii::$app->request->post('data')) {
            $this->_saveCallableData(unserialize(base64_decode($data)));
        }

        return $rr;
    }

    /**
     * @param Component $component
     * @param array $data
     */
    protected function _saveCallableData($data = [])
    {
        \Yii::$app->session->set('current-edit-component', $data);
    }

    /**
     * @param Component $component
     * @param array $data
     */
    public function getCallableData()
    {
        return (array)\Yii::$app->session->get('current-edit-component');
    }
}
