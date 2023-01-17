<?php

namespace common\modules\bot\controllers;

use common\modules\bot\models\BotScreens;
use common\modules\bot\models\BotScreensSearch;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;


use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ScreensController implements the CRUD actions for Screens model.
 */
class ScreensController extends Controller
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

    public function beforeAction($action)
    {
        $this->layout = '@backend/views/layouts/common';

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function actions()
    {
        return [
            'upload-img' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'avatar-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'avatar-delete' => [
                'class' => DeleteAction::className()
            ]
        ];
    }



    /**
     * Lists all Screens models.
     * @return mixed
     */
    public function actionIndex()
    {

         $this->layout = '@backend/themes/adminlte/views/layouts/common';


        $platform = Yii::$app->request->get('platform');
        if ( isset($platform) ) {

            $searchModel = new BotScreensSearch();
            $query = BotScreens::find()->where(['platform'=>$platform]);


            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);


        } else {
            $searchModel = new BotScreensSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        }


        return $this->render('index', [
            'model' => $searchModel,
            'dataProvider' => $dataProvider,
            'platform'=>$platform
        ]);

    }

    public function actionScreen($id)
    {



        \Yii::$app->keyStorage->set(Yii::$app->user->getId().'_current_screen',$id);


        $model = BotScreens::find()->all();
        foreach ($model as $item){
            $state = json_decode($item->state,true);

            $state['selected']=false;

            $item->state = json_encode($state);
            if(!$item->update()){
              //  print_r($item->getErrors());
            }


        }



        $screen = BotScreens::findOne($id);
        if($screen){
            $state = json_decode($screen->state,true);

//        {"checked":false,"disabled":false,"expanded":true,"selected":true,"visible":true}

          //  print_r($screen->state);


            if (isset($state['checked']) && $state['checked']==false){

                $state['checked']=true;
            }else{

                $state['checked']=false;
            }

            if (isset($state['selected']) && $state['selected']==false){
                $state['selected']=true;
            }else{
                $state['selected']=false;
            }


            $screen->state = json_encode($state);




            if(!$screen->update()){
               // print_r("REEOR DB ".$screen->getErrors());
            }
           // print_r($screen->state);
        }



        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return $this->renderAjax('_screen2', [
                'model' => \common\modules\bot\models\BotScreensSearch::findOne($id),
            ]);
        }
    }
    public function actionScreenExpanded($id)
    {
        \Yii::$app->keyStorage->set(Yii::$app->user->getId().'_current_screen',$id);


        try{
            $screen = BotScreens::findOne($id);


            $this->setExpanded($screen);

            $sc1 = BotScreens::find()->where(['parent_id'=>$screen->id])->one();
            if( $sc1){
                $this->setExpanded($sc1);
                $sc2 = BotScreens::find()->where(['parent_id'=>$sc1->id])->one();
                if( $sc2 ){
                    $this->setExpanded($sc2);
                    $sc3 = BotScreens::find()->where(['parent_id'=>$sc2->id])->one();
                    if( $sc3 ){
                        $this->setExpanded($sc3);
                        $sc4 = BotScreens::find()->where(['parent_id'=>$sc3->id])->one();
                        if( $sc4){
                            $this->setExpanded($sc4);
                            $sc5 = BotScreens::find()->where(['parent_id'=>$sc4->id])->one();
                            if( $sc5 ){
                                $this->setExpanded($sc5);
                                $sc6 = BotScreens::find()->where(['parent_id'=>$sc5->id])->one();
                                if( $sc6 ){
                                    $this->setExpanded($sc6);
                                    $sc7 = BotScreens::find()->where(['parent_id'=>$sc6->id])->one();
                                    if( $sc7 ){
                                        $this->setExpanded($sc7);


                                    }

                                }

                            }

                        }

                    }

                }
            }



            $request = Yii::$app->request;
            if ($request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;

                return json_encode([]);
            }
        } catch (\Exception $e) {
            return false;
        }



    }


    public function setExpanded($model){
        if($model){
            $state = json_decode($model->state,true);
           // print_r($state);
            if ($state['expanded'] == false){
                $state['expanded']=true;
            }else{
                $state['expanded']=false;
            }
            $model->state = json_encode($state);
            if(!$model->update()){
                // print_r("REEOR DB ".$screen->getErrors());
            }
          //  print_r($state);
            return true;

       }
        return false;
    }



    /**
     * Displays a single Screens model.
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
     * Creates a new Screens model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $parentid = Yii::$app->request->get('parentid',false);
        $key = Yii::$app->request->get('key',false);

        $model = new BotScreens();
        if($parentid){
            $model->parent_id=$parentid;
        }

        if($key){
            $model->key=$key;
        }



        if ($model->load(Yii::$app->request->post()) && $model->save()) {




            return $this->redirect(['/bot/screens']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Screens model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


                return $this->redirect(['/bot/screens']);





        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Screens model.
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
     * Finds the Screens model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Screens the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BotScreens::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}