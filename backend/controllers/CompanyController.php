<?php

namespace backend\controllers;

use common\components\Access;
use common\models\BalanceHistory;
use Yii;
use common\models\MedCompany;
use common\models\MedCompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanyController implements the CRUD actions for MedCompany model.
 */
class CompanyController extends Controller
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

    /**
     * Lists all MedCompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedCompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MedCompany model.
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
     * Creates a new MedCompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MedCompany();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        	$model->setPosition();

            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MedCompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }


	public function actionUpdateBalance($id)
	{
		$model = $this->findModel($id);
		$value =(int) Yii::$app->request->post('MedCompany')['balance'];
		$reason = Yii::$app->request->post('MedCompany')['reason'];


		if(!empty($value) && $model){
			$balance =(int) $model->balance + $value;
			MedCompany::AddHistory($value, $reason, $model->balance, $balance, $model->id, BalanceHistory::TYPE_INC);
			$model->balance = $balance ;


			if ( $model->update(false)) {
				return $this->redirect(['view', 'id' => $model->id]);
			}else{
				print_r($model->getErrors());die;
			}
		}


		return $this->render('update-balance', [
			'model' => $model,
		]);
	}

    /**
     * Deletes an existing MedCompany model.
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
     * Finds the MedCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MedCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MedCompany::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
