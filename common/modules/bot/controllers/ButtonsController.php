<?php

namespace common\modules\bot\controllers;

use common\modules\bot\models\BotButtons;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ButtonsController implements the CRUD actions for Buttons model.
 */
class ButtonsController extends Controller
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

    /**
     * Lists all Buttons models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BotButtons();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buttons model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Buttons model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BotButtons();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Buttons model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $sid = Yii::$app->request->get('sid');
        $wid = Yii::$app->request->get('wid');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            if ($wid && $sid){

                return $this->redirect(['widget-text/update', 'id' => $wid]);
            }else{
                return $this->redirect(['/bot/screens/index']);
            }


        } else {
            return $this->render('update', [
                'model' => $model,

            ]);
        }
    }

    /**
     * Deletes an existing Buttons model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $sid = Yii::$app->request->get('sid');
        $wid = Yii::$app->request->get('wid');

        $this->findModel($id)->delete();

        if ($wid && $sid){

            return $this->redirect(['widget-text/update', 'id' => $wid, 'sid' => $sid]);
        }else{
            return $this->redirect(['/bot/screens/index']);
        }



    }

    /**
     * Finds the Buttons model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buttons the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BotButtons::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
