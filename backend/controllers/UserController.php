<?php

namespace backend\controllers;

use backend\models\search\UserSearch;
use backend\models\UserForm;
use common\components\Access;
use common\models\MedCompany;
use common\models\MedDoctors;
use common\models\MedSettings;
use common\models\User;
use common\models\UserCompany;
use common\models\UserProfile;
use common\models\UserProfileSearch;
use common\models\UserToken;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
	use Access;
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * @param $id
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     * @throws NotFoundHttpException
     */
    public function actionLogin($id)
    {
        $model = $this->findModel($id);
        $tokenModel = UserToken::create(
            $model->getId(),
            UserToken::TYPE_LOGIN_PASS,
            60
        );

        return $this->redirect(
            Yii::$app->urlManagerFrontend->createAbsoluteUrl(['user/sign-in/login-by-pass', 'token' => $tokenModel->token])
        );
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	        return $this->redirect(['/user/profile','id' => $model->model->id]);
        }

	    $out = \yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->all(),'id','name');
        return $this->render('create', [
            'model' => $model,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name'),
	        'companyUser'=>$out
        ]);
    }

    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $model->setModel($this->findModel($id));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

	    $companyUser = \yii\helpers\ArrayHelper::map(\common\models\MedCompany::find()->all(),'id','name');

	    $userCompany = UserCompany::find()->all();
	    $out =[];
	    foreach ($userCompany as $item){
		    $out[] = $item->getCompany()->one()->id;
	    }

	    $model->company_id = $out;


	    return $this->render('update', [
            'model' => $model,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name'),
	        'companyUser'=>$companyUser,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->authManager->revokeAll($id);
        $model = MedDoctors::find()->where(['user_id'=>$id])->one();
        if($model){
        	$model->delete();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


	public function actionProfile($id)
	{
		$model = UserProfile::find()->where(['user_id'=>$id])->one();
        $param = Yii::$app->request->post('UserProfile');
		if ($model->load($_POST) && $model->save()  ) {
			Yii::$app->session->setFlash('alert', [
				'options' => ['class' => 'alert-success'],
				'body' => Yii::t('backend', 'Профиль пользователя успешно сохранен.', [], $model->locale)
			]);
			return $this->redirect(['index']);
		}
		$settings = MedSettings::findOne(1);
		return $this->render('profile', [
			'model' => $model,
			'id' => $id,
			'work_pressure_max' => "Значение по умолчанию: ".$settings->reference_bpp_up_do ,
			'work_pressure_min' => "Значение по умолчанию: ".$settings->reference_bpp_up_ot ,
			'down_pressure_max' => "Значение по умолчанию: ".$settings->reference_bpp_lower_do ,
			'down_pressure_min' => "Значение по умолчанию: ".$settings->reference_bpp_lower_ot ,
			'pulse_max' => "Значение по умолчанию: ".$settings->reference_bpp_pulse_do  ,
			'pulse_min' => "Значение по умолчанию: ".$settings->reference_bpp_pulse_ot  ,
		]);
	}

}
