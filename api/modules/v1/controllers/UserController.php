<?php

namespace api\modules\v1\controllers;

use common\commands\AddToTimelineCommand;
use common\components\SMS;
use common\models\BalanceHistory;
use common\models\MedCompany;
use common\models\MedConference;
use common\models\MedDoctors;
use common\models\MedPosition;
use common\models\MedPositionCompany;
use common\models\MedReport;
use common\models\MedSettings;
use common\models\MedTerminals;
use common\models\User;
use common\models\UserCompany;
use common\models\UserProfile;
use http\Url;
use Yii;
use yii\rest\Controller;
use yii\rest\OptionsAction;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class UserController extends Controller
{
	public $enableCsrfValidation = false;


	/**
	 * @return array
	 */
	public function behaviors()
	{
		$behaviors = parent::behaviors();
		$behaviors['corsFilter'] = [
			'class' => \yii\filters\Cors::class,
			'cors' => [
				// restrict access to
				'Origin' => ['*'],
				'Access-Control-Allow-Origin' => ['*'],
				'Access-Control-Request-Headers' => ['*'],
				'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
			],

		];

		return $behaviors;
	}


	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'options' => [
				'class' => OptionsAction::class
			]
		];
	}


	public function beforeAction($action)
	{

		$headers = Yii::$app->getResponse()->getHeaders();
		$headers->set('Access-Control-Allow-Origin', '*');
		$headers->set('Allow', implode(', ', ['GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS']));
		$headers->set('Access-Control-Allow-Methods', implode(', ', ['GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS']));


		$token = null;
		$headers = Yii::$app->request->headers;
		if ($headers->has('authorization')) {
			$authorization = $headers->get('authorization');
			$token = explode(" ", $authorization)[1];
		}

		if ($token) {
			$model = MedTerminals::find()->where(['terminal_id' => $token])->one();
			if (!$model) {
				return false;
			}
		}

		return parent::beforeAction($action);
	}

	/**
	 * @return User|null|\yii\web\IdentityInterface
	 */
	public function actionIndex($uuid)
	{
		if (empty($uuid)) return null;
		//2c3b4a4a-c61d-11ea-8020-0242ac150003
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$resource1 = User::find()->where(['uid' => $uuid])->asArray()->one();
		$resource2 = UserProfile::find()->where(['user_id' => $resource1['id']])->asArray()->one();
		$userCompany = UserCompany::find()->where(['user_id'=> $resource1['id']])->one();


		if(!$userCompany)
			return null;

		$company = MedCompany::find()->where([ 'id'=> $userCompany->company_id])->one();
		$balance = false;
		$position_name = '';
		$modelPositionCompany = MedPositionCompany::findOne($resource2['position']);
		if ($modelPositionCompany) {
			$position_name = $modelPositionCompany->name;
		}


		$settings = MedSettings::findOne(1);
		$rate = empty($company->rate) ? $settings->rate : $company->rate;

		if ($company) $price = $company->balance + $company->limit - $rate;

		if ($price >= 0) {
			$balance = true;
		}

		$doctors = MedDoctors::find()->select(['user_id'])->asArray()->all();
		if ($doctors) {
			$doctorId = $doctors[array_rand($doctors)]['user_id'];
			$doctorModel = MedDoctors::find()->where(['user_id' => $doctorId])->one();
			if ($resource1 && $resource2) {
				return array_merge(
					$resource1,
					$resource2,
					['position_name' => $position_name],
					['balance' => $balance],
					['company_name' => $company->name, 'company_status' => $company->status, 'company_phone' => $company->phone],
					['doctor_fio' => $doctorModel->fio, 'doctor_ecp' => $doctorModel->signature_hash, 'doctor_id' => $doctorModel->id]
				);
			}
		} else {
			if ($resource1 && $resource2) {
				return array_merge(
					$resource1,
					$resource2,
					['position_name' => $position_name],
					['balance' => $balance],
					['company_name' => $company->name, 'company_status' => $company->status, 'company_phone' => $company->phone],
					['doctor_fio' => '', 'doctor_ecp' => '', 'doctor_id' => '']

				);
			}
		}


	}

	public function actionPhone($phone)
	{
		//2c3b4a4a-c61d-11ea-8020-0242ac150003
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$phone_num = preg_replace("/[^0-9]/", '', $phone);
		$resource2 = UserProfile::find()->where(['phone' => $phone_num])->asArray()->one();
		if(!$resource2)
			return null;
		$resource1 = User::find()->where(['id' => $resource2['user_id']])->asArray()->one();
		$userCompany = UserCompany::find()->where(['user_id'=> $resource1['id']])->one();
		if(!$userCompany)
			return null;
		$company = MedCompany::find()->where([ 'id'=> $userCompany->company_id])->one();

		$doctors = MedDoctors::find()->select(['user_id'])->asArray()->all();
		if ($doctors) {
			$doctorId = $doctors[array_rand($doctors)]['user_id'];
			$doctorModel = MedDoctors::find()->where(['user_id' => $doctorId])->one();
			if ($resource1 && $resource2) {
				return array_merge(
					$resource1,
					$resource2,
					['balance' => true],
					['company_name' => $company->name, 'company_status' => $company->status, 'company_phone' => $company->phone],
					['doctor_fio' => $doctorModel->fio, 'doctor_ecp' => $doctorModel->signature_hash, 'doctor_id' => $doctorModel->id]
				);
			}

		} else {
			if ($resource1 && $resource2) {
				return array_merge(
					$resource1,
					$resource2,
					['balance' => true],
					['company_name' => $company->name, 'company_status' => $company->status, 'company_phone' => $company->phone],
					['doctor_fio' => '', 'doctor_ecp' => '', 'doctor_id' => '']

				);
			}
		}

	}


	public function actionSet()
	{

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$id = \Yii::$app->request->get('id');
		$bio = \Yii::$app->request->get('bio');
		$user = User::findOne($id);
		if ($user) {
			$user->bio = $bio;
			if (!$user->update()) {
				print_r($user->getErrors());
				die;
			}
		}

		return $user;
	}

	public function actionSendsms()
	{
		$phone = \Yii::$app->request->get('phone');
		$mes = \Yii::$app->request->get('mes');
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		$sms = New SMS();
		list($sms_id, $sms_cnt, $cost, $balance) = $sms->send_sms($phone, $mes, 1);

		return [$sms_id, $sms_cnt, $cost, $balance];
	}

	public function actionBio()
	{

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		$bio = \Yii::$app->request->get('bio');
		$userModel = User::find()->where(['bio' => $bio])->one();
		$users = [];

		if ($userModel) {
			$users['id'] = $userModel->id;
			$users['phone'] = $userModel->getUserProfile()->one()->getPhone();
			$users['name'] = $userModel->getUserProfile()->one()->getFullName();
			$users['image'] = $userModel->getUserProfile()->one()->getAvatar();
//            $users['bio'] = $userModel->getBio();
			return $users;
		}


		return false;
	}

	public function actionSetreportst()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$rawData = file_get_contents("php://input");

		$data = json_decode($rawData);

		if (isset($data->report)) {
			$model = MedReport::find()->where(['id' => $data->report])->one();
			if ($model) {
				$model->status = $data->status;
				if (!$model->update()) {
//					return $model->getErrors();
				}
			}
			$company = MedCompany::find()->where(['id' => $model->company_id])->one();
			if ($company && !empty($company->rate)) {
				$rate = $company->rate;
			} else {
				$settings = MedSettings::findOne(1);
				$rate = $settings->rate;
			}

			$user = UserProfile::find()->where(['user_id' => $model->user_id])->one();
			$reason = "Медосмотр пациента: <a href='/backend/web/report/view?id=" . $data->report . "'>" . $user->lastname . " " . $user->firstname . " " . $user->middlename . '</a>';
			MedCompany::AddHistory($rate, $reason, $company->balance, $company->balance - $rate, $model->company_id, BalanceHistory::TYPE_DEC);
			$this->updateBalance($rate, $company->id);
		}
	}

	/**
	 * @param $rate
	 * @throws \yii\db\Exception
	 */
	public function updateBalance($rate, $company_id): void
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$result = \Yii::$app->db->createCommand("UPDATE  `med_company` SET `balance`= (SELECT a.tt FROM (	SELECT  `balance` AS tt FROM  `med_company` WHERE  `id`=:company_id ) a ) - :rate WHERE  `id`=:company_id")
			->bindValue(':company_id', $company_id)
			->bindValue(':rate', $rate)
			->execute();
	}

	public function actionGetparam()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$model = MedSettings::find()->where(['id' => 1])->one();
		if ($model) {
			$param = [
				'MAX_TEMP' => $model->reference_temp_do,
				'MAX_ALCO' => $model->reference_alco_do,

				'SYS_MAX' => $model->reference_bpp_up_do,
				'SYS_MIN' => $model->reference_bpp_up_ot,

				'DIA_MAX' => $model->reference_bpp_lower_do,
				'DIA_MIN' => $model->reference_bpp_lower_ot,

				'PULSE_MAX' => $model->reference_bpp_pulse_do,
				'PULSE_MIN' => $model->reference_bpp_pulse_ot,
				'rate' => $model->rate,
				'all_phone' => $model->all_phone,
				'terminal_phone' => '55565656',
				'printer_count' => $model->printer_count,

			];
			return $param;
		}
	}

	public function actionPosition()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$name = Yii::$app->request->post('name', NULL);
		if ($name === NULL) return false;
		$user = User::findOne(Yii::$app->user->getId());

		$keyStorage = Yii::$app->keyStorage;
		$currentCompanyId = $keyStorage->get('currentCompanyUser_' . Yii::$app->user->getId());
		$model = MedPositionCompany::find()->where(['name' => $name, 'company_id' => $currentCompanyId])->one();
		if (!$model) {
			$model = new MedPositionCompany();
			$model->name = $name;
			$model->company_id = $currentCompanyId;
			$model->status = MedPosition::STATUS_ACTIVE;
			if (!$model->save()) {
				print_r($model->getErrors());
			}
			return $model;
		}
		return false;
	}

	public function actionSethistory()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$rawData = file_get_contents("php://input");

		$data = json_decode($rawData);

		\Yii::$app->commandBus->handle(new AddToTimelineCommand([
			'category' => $data->category,
			'event' => $data->event,
			'data' => $data,
			'report' => $data->report
		]));


		if (isset($data->data->user)) {

			$model = MedReport::find()->where(['id' => $data->report])->one();
			if ($model) {
				$model->user_id = $data->data->user->id;
				$model->company_id = $data->data->user->company_id;
				if (!$model->update()) {
					return $model->getErrors();
				}
			}
		}
		return $data;
	}

	public function actionReport()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$headers = Yii::$app->request->headers;
		$rawData = file_get_contents("php://input");
		$token = '';
		$data = json_decode($rawData);
		if ($headers->has('Authorization')) {
			$authorization = $headers->get('Authorization');
			$token = explode(" ", $authorization)[1];
		}


		if (isset($data->report)) {
			$model = MedReport::find()->where(['id' => $data->report])->one();
			if ($model) {
				$model->token = $token;
				if(isset($data->user_id))  $model->user_id = $data->user_id;
				if(isset($data->doctor_id))  $model->doctor_id = $data->doctor_id;
				if(isset($data->company_id))  $model->company_id = $data->company_id;
				$model->data_report = $rawData;
				if (!$model->update()) {
					return $model->getErrors();
				}
			}

		} else {
			$model = new MedReport();
			$model->token = $token;
			$model->data_report = $rawData;
			$model->user_id = isset($data->user_id) ? $data->user_id : null;
			$model->data_report = $rawData;
			$model->company_id = isset($data->company_id) ? $data->company_id : null;
			if (!$model->save()) {
				return $model->getErrors();
			}
		}

		return $model;


	}

	public function actionReportUpdate()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$headers = Yii::$app->request->headers;
		$rawData = file_get_contents("php://input");
		$token = '';
		$data = json_decode($rawData);
		if ($headers->has('Authorization')) {
			$authorization = $headers->get('Authorization');
			$token = explode(" ", $authorization)[1];
		}

		$id = Yii::$app->request->post();

		$model = MedReport::find()->where(['id' => $id])->one();
		if ($model) {
			$model->token = $token;
			$model->data_report = $rawData;
			if (!$model->save()) {
				return $model->getErrors();
			}
			return $model;
		}


	}

	public function actionReportUpdateComment()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$headers = Yii::$app->request->headers;
		$rawData = file_get_contents("php://input");
		$token = '';
		$data = json_decode($rawData);
		if ($headers->has('Authorization')) {
			$authorization = $headers->get('Authorization');
			$token = explode(" ", $authorization)[1];
		}

		$id = Yii::$app->request->post('id');
		$comment = Yii::$app->request->post('comment');
		$status = Yii::$app->request->post('status');


		$model = MedConference::find()->where(['id' => $id])->one();
		if ($model) {
			$model->result = $comment;
			$model->status = $status;

			if (!$model->save()) {
				return $model->getErrors();
			}

			$model = MedReport::find()->where(['id' => $model->report])->one();
			if ($model) {
				$model->status = $status;
				if (!$model->save()) {
					return $model->getErrors();
				}
			}


		}

		return $model;


	}

	public function actionConference()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$headers = Yii::$app->request->headers;
		$rawData = file_get_contents("php://input");
		$token = '';
		$data = json_decode($rawData);
		if ($headers->has('Authorization')) {
			$authorization = $headers->get('Authorization');
			$token = explode(" ", $authorization)[1];
		}


		$model = new MedConference();

		$model->user_id = $data->user_id;
		$model->frontend_peer = $data->peer;
		$model->data_json = json_encode(['token' => $token]);
		$model->report = $data->report;
		$model->status = MedConference::NEW_STATUS;

		if (!$model->save()) {
			return $model->getErrors();
		}
		return $model;


	}

	public function actionStartConf()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$doctorFio = '';
		$doctorEcp = '';
		$peer = \Yii::$app->request->get('peer');
		$conf = MedConference::find()->where(['frontend_peer' => $peer])->one();



		$doctor = MedDoctors::find()->where(['user_id' => Yii::$app->user->getId()])->one();
		if ($doctor) {
			$doctorFio = $doctor->fio;
			$doctorEcp = $doctor->signature_hash;
		}
		if ($conf) {
			$conf->doctor_id = Yii::$app->user->getId();
			$conf->status = MedConference::ONLINE_STATUS;
			$conf->data_json = array_merge(json_decode($conf->data_json, true), ['doctor' => $doctorFio, 'ecp' => $doctorEcp, 'doctor_id' => $doctor->id]);
			if (!$conf->update()) {
				print_r($conf->getErrors());
				die;
			}
		}
		return $conf;
	}

	public function actionStopConf()
	{

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$peer = \Yii::$app->request->get('peer');

		$conf = MedConference::find()->where(['frontend_peer' => $peer])->one();

		if ($conf) {

			$conf->status = 0;
			if (!$conf->update()) {
				print_r($conf->getErrors());
				die;
			}
		}

		return $conf;
	}

	public function actionPrinterCount()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$result = \Yii::$app->db->createCommand("UPDATE  `med_settings` SET `printer_count`= (SELECT a.tt FROM (	SELECT  printer_count AS tt FROM  `med_settings` ) a ) - 1 WHERE  `id`=:count_print")
			->bindValue(':count_print', 1)
			->execute();



		return $result;
	}

	public function actionSetCompany()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$id = Yii::$app->request->post('id');
		$keyStorage = Yii::$app->keyStorage;
		$keyStorage->set('currentCompanyUser_' . Yii::$app->user->getId(), $id);
		$model = MedCompany::findOne($id);
		return $model->name;

	}

}
