<?php

namespace backend\controllers;

use common\components\Access;
use common\models\MedDoctorsSearch;
use common\models\UserProfile;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;
use common\models\MedDoctors;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctorsController implements the CRUD actions for MedDoctors model.
 */
class DoctorsController extends Controller
{


	use Access;



    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }



    public function actions()
    {
        return [
            'avatar-upload' => [
                'class' => UploadAction::class,
                'deleteRoute' => 'avatar-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'avatar-delete' => [
                'class' => DeleteAction::class
            ]
        ];
    }

    /**
     * Lists all MedDoctors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedDoctorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);




        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single MedDoctors model.
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
     * Creates a new MedDoctors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MedDoctors();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $users = [];
        $modelUser = UserProfile::find()->all();
        foreach ($modelUser as $item){
        	$users[$item->user_id] =$item->lastname." ". $item->firstname. " " . $item->middlename;
        }


//	    $users = \yii\helpers\ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username');
//
//        print_r($users);

        return $this->render('create', [
            'model' => $model,
	        'users' => $users,
        ]);
    }

    /**
     * Updates an existing MedDoctors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	    $users = [];
	    $modelUser = UserProfile::find()->all();
	    foreach ($modelUser as $item){
		    $users[$item->user_id] =$item->lastname." ". $item->firstname. " " . $item->middlename;
	    }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
	        'users' => $users,
        ]);
    }

    /**
     * Deletes an existing MedDoctors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MedDoctors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MedDoctors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MedDoctors::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
