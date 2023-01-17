<?php

namespace backend\controllers;

use common\components\Access;
use common\models\MedCompany;
use common\models\MedConference;
use common\models\MedConferenceQuery;
use common\models\MedDoctors;
use common\models\TimelineEvent;
use common\models\UserCompany;
use common\models\UserProfile;
use Yii;
use common\models\MedReport;
use common\models\MedReportSearch;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReportController implements the CRUD actions for MedReport model.
 */
class ReportController extends Controller
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
     * Lists all MedReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedReportSearch();
        $param  = Yii::$app->request->queryParams;

        $dataProvider = $searchModel->search($param);
	  //  $query = MedReport::find()->andWhere(['not', ['user_id' => null]]);
//	    $dataProvider = new ActiveDataProvider([
//		    'query' => $query,
//	    ]);

	    $gridColumns = [

		    [
			    'header' => 'Дата время',
			    'format' => 'raw',
			    'value' =>function($data){
				    return Yii::$app->formatter->asDatetime($data->date_report);
			    },
			    'contentOptions' => ['align'=>"center"],

		    ],
		    ['class' => 'yii\grid\SerialColumn'],
		    [
			    'header' => 'ФИО',
			    'format' => 'raw',
			    'value' =>function($data){
				    $text = '';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
				    foreach ($model as $item){
					    if(isset($item->data['data']['user'])){
						    $text = $item->data['data']['user']['firstname'].' '.$item->data['data']['user']['middlename'].' '.$item->data['data']['user']['lastname'];
					    }
				    }
				    return $text;
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],
		    [
			    'header' => 'Табельный номер',
			    'format' => 'raw',
			    'value' =>function($data){
				    $text = '';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
				    foreach ($model as $item){
					    if(isset($item->data['data']['user'])){
						    $text = $item->data['data']['user']['number'];
					    }
				    }
				    return $text;
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],
		    [
			    'header' => 'Жалобы',
			    'format' => 'raw',
			    'value' =>function($data){
				    $txt='';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
				    foreach ($model as $item) {

					    if (isset($item->data['data']['question'])) {


						    foreach ($item->data['data']['question'] as $i) {
							    if($i['success_answer'] != $i['answer']){
								    $txt .= $i['currentQuestion'] . " -- " . $i['answer'] . "<br>";
							    }

						    }
						    return $txt;
					    }
				    }
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],


		    [
			    'header' => 'Пульс сердца, уд./мин.',
			    'format' => 'raw',
			    'value' =>function($data){
				    $text = '';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
				    foreach ($model as $item){
					    if(isset($item->data['data']['bpp'])){
						    $text =  $item->data['data']['bpp']['pulse'];
					    }
				    }
				    return $text;
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],
		    [
			    'header' => 'Температура тела град.',
			    'format' => 'raw',
			    'value' =>function($data){
				    $text = '';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
				    foreach ($model as $item){
					    if(isset($item->data['data']['temp'])){
						    $text =   $item->data['data']['temp'] ;
					    }
				    }
				    return $text;
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],
		    [
			    'header' => 'Артериальное давление. мм.рт.ст.',
			    'format' => 'raw',
			    'value' =>function($data){
				    $text = '';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
				    foreach ($model as $item){
					    if(isset($item->data['data']['bpp'])){
						    $text =   $item->data['data']['bpp']['dia'] ." / ". $item->data['data']['bpp']['sys'] ;
					    }
				    }
				    return $text;
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],
		    [
			    'header' => 'Проба на содержание алкоголя в выдыхаемом воздухе',
			    'format' => 'raw',
			    'value' =>function($data){
				    $text = '';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
				    foreach ($model as $item){
					    if(isset($item->data['data']['alco'])){
						    $text = $item->data['data']['alco'] ;
					    }
				    }
				    return $text;
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],
		    [
			    'header' => 'Допуск к работе',
			    'format' => 'raw',
			    'value' =>function($data){
				    $text = '';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id, 'event'=>'end'])->all();
				    foreach ($model as $item){
					    if(isset($item->data['data']['result'])){
						    $text =   $item->data['data']['result']  ;
					    }
				    }
				    return $text;
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],
		    [
			    'header' => 'Подпись мед. сотрудника',
			    'format' => 'html',
			    'value' =>function($data){
				    $text = '';
				    $model = \common\models\TimelineEvent::find()->where(['report'=>$data->id])->all();
				    foreach ($model as $item){
					    if(isset($item->data['data']['doctor'])){
						    $text = $item->data['data']['doctor']['fio'].'<br>'.$item->data['data']['doctor']['ecp'];
					    }
				    }
				    return $text;
			    },
			    'contentOptions' => ['align'=>"center"],
		    ],
	    ];

	    $users = [];
	    $modelUser = UserProfile::find()->all();
	    foreach ($modelUser as $item){
		    $users[$item->user_id] =$item->lastname." ". $item->firstname. " " . $item->middlename;
	    }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'param' => $param,
            'gridColumns' => $gridColumns,
            'users' => $users,
        ]);
    }

    /**
     * Displays a single MedReport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $events =  TimelineEvent::find()->where(['report'=>$id])->all();
        $conf =  MedConference::find()->where(['report'=>$id])->all();
        $report =  MedReport::find()->where(['id'=>$id])->one();


	    $dataReport = date("d.m.Y H:s:i", strtotime($report->date_report));
	    $companyName = '';
        $company =  MedCompany::find()->where(['id'=>$report->company_id])->one();
	    if($company){
		    $companyName = $company->forma . " " . $company->name;
	    }
        $userFio = '';$userPhone = '';
        $user = UserProfile::find()->where(['user_id'=>$report->user_id])->one();
        if($user){

        	$userFio = $user->lastname . " " . $user->firstname. " " . $user->middlename;
	        $userPhone = $user->phone;
        }
	    $data=[];
        foreach ($events as $event){
	        $data[] = [
	        	'id' => $event->id,
		        'data' => Yii::$app->formatter->asDatetime( $event->created_at),
		        'text' => $event->data['text'],
		        'desc' => $event->data['desc'],
		        'value' => $this->getInfo($event->data['data']),
	        ];
        }
	    $provider = new ArrayDataProvider([
		    'allModels' => $data,
		    'pagination' => [
			    'pageSize' => 20,
		    ],
		    'sort' => [
			    'attributes' => ['id', 'name'],
		    ],
	    ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
	        'dataProvider' => $provider,
            'conf'=>$conf,
	        'user'=>$userFio,
	        'phone'=>$userPhone,
	        'company'=>$companyName,
	        'dataReport'=>$dataReport,
        ]);
    }

    /**
     * Creates a new MedReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MedReport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MedReport model.
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

    /**
     * Deletes an existing MedReport model.
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
     * Finds the MedReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MedReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MedReport::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


	public function getInfo($data){

		$txt='';

		if( isset($data['user'])){

			$userCompany = UserCompany::find()->where(['user_id'=>$data['user']['id']])->one();

			$company = MedCompany::findOne($userCompany->company_id);




			return isset($data['user']['firstname'])?
				" <a href='/backend/web/user/view?id=".$data['user']['id']."'>".$data['user']['lastname']." ".$data['user']['firstname']."  ".$data['user']['middlename']."</a><br>  ".$data['user']['phone']."<br> <a href='/backend/web/company/view?id=".$data['user']['company_id']."'>" . $company->name . "</a>":
				'';
		}
		if( isset($data['doctor'])){

			return isset($data['doctor']['fio'])?
				"<a href='/backend/web/doctors/view?id=".$data['doctor']['doctor_id']."'>".$data['doctor']['fio']."</a><br>  ".$data['doctor']['ecp']:
				'';
		}

		if( isset($data['question'])){

			foreach ($data['question'] as $item){
				$txt .= $item ['currentQuestion']. " -- " . $item ['answer']."<br>";
			}
			return$txt;
		}

		if( isset($data['alco'])){
			if($data['alco'] == 1){

				return 'Обнаружено';
			}else{
				return $data['alco']. " ‰";
			}

		}
		if( isset($data['temp'])){
			return $data['temp']. " °C";
		}
		if( isset($data['bpp'])){

			$sys = 	$data['bpp']['maxResultSys']."/".	$data['bpp']['minResultSys'];
			$dia = 	$data['bpp']['maxResultDia']."/".	$data['bpp']['minResultDia'];
			$pulse = 	$data['bpp']['maxResultPulse']."/".	$data['bpp']['minResultPulse'];

			return "Верхнее давление: ".$data['bpp']['sys']." мм.рт.ст. (норма ". $sys .")
			<br> Нижнее давление:  ". $data['bpp']['dia'] ." мм.рт.ст. (норма ". $dia .")
			<br> Пульс ".$data['bpp']['pulse']. " уд./мин. (норма ". $pulse .")";
		}
		if( isset($data['video'])){
			$comment = '';
			if(isset($data['comment'])){
				$comment = $data['comment'];
			}
			return  $data['video']."<br>".$comment;
		}
		if( isset($data['result'])){



			return  $data['result'];
		}

	}

}
