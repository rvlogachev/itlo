<?php

namespace common\modules\bot\controllers;

// use common\models\search\WidgetTextSearch;

use common\modules\bot\models\BotScreens;
use common\modules\bot\models\WidgetText;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use trntv\filekit\actions\UploadAction;
use Intervention\Image\ImageManagerStatic;
use yii\rest\DeleteAction;
/**
 * WidgetTextController implements the CRUD actions for WidgetText model.
 */
class WidgetTextController extends Controller
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'img-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'img-delete',
                'fileStorage' => Yii::$app->get('fileStorage'),

                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'img-delete' => [
                'class' => DeleteAction::className()
            ]
        ];
    }



    /**
     * Lists all WidgetText models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new  WidgetText();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new WidgetText model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $sid = Yii::$app->request->get('sid');
        $model = new \common\modules\bot\models\WidgetText();

        $model->status=1;

        $screen = BotScreens::findOne($sid);
        $model->title=$screen->title."_".time();


        $sort = WidgetText::find()->where(['screens_id'=>$sid])->orderBy(['sort'=>SORT_DESC])->one();
        if($sort){
            $model->sort=$sort->sort+1;
        }else{
            $model->sort=1;
        }



       $model->setScenario('insert');

        $modelButtons = new \common\modules\bot\models\BotButtons();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if($screen->platform){
                return $this->redirect(['/bot/screens']);
            }else{
                return $this->redirect(['/bot/screens']);
            }


        } else {
            return $this->render('create', [
                'sid' => $sid,
                'model' => $model,
                'modelButtons' => $modelButtons,
            ]);
        }
    }

    /**
     * Updates an existing WidgetText model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   $sid = Yii::$app->request->get('sid');
        $screen = BotScreens::findOne($sid);
        $model = $this->findModel($id);
        $model->setScenario('update');


        $modelButtons = new \common\modules\bot\models\BotButtons();
        $modelButtons->widget_text_id = $id;

        if ($modelButtons->load(Yii::$app->request->post()) && $modelButtons->save()) {
            \Yii::$app->session->setFlash('consol_v_error','$modelButtons->save');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            return $this->redirect(['/bot/screens']);



        } else {
            return $this->render('update', [
                'model' => $model,
                'modelButtons' => $modelButtons,
                'sid' => $sid,
            ]);
        }
    }

    /**
     * Deletes an existing WidgetText model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/bot/screens']);
    }

    /**
     * Finds the WidgetText model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WidgetText the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WidgetText::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
