<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "med_report".
 *
 * @property int|null $id
 * @property string|null $date_report
 * @property int|null $user_id
 * @property int|null $doctor_id
 * @property int|null $conference_id
 * @property string|null $data_report
 * @property string|null $token
 * @property string|null $company_id
 */
class MedReport extends \yii\db\ActiveRecord
{



	const SUCCESS_STATUS = 3;
	const FAIL_STATUS = 4;
	const ERROR_STATUS = 5;





	public $date_report_ot;
	public $date_report_do;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'doctor_id', 'conference_id','company_id'], 'integer'],
	        [['date_report'], 'string'],
            [['date_report', 'data_report', 'token', 'status', 'date_report_ot', 'date_report_do'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_report' => 'Дата',
            'user_id' => 'Пользователь',
            'doctor_id' => 'Доктор',
            'conference_id' => 'Конференция',
            'data_report' => 'Дата',
            'status' => 'Статус',
            'company_id' => 'Компания',
        ];
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCompany()
	{
		return $this->hasOne(UserCompany::class, ['user_id' => 'user_id']);
	}


    /**
     * {@inheritdoc}
     * @return MedReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedReportQuery(get_called_class());
    }


	public static function statusesTxt()
	{
		return [


			self::SUCCESS_STATUS => 'Прошел',
			self::FAIL_STATUS => 'Не прошел',
			self::ERROR_STATUS => 'Прерван',
		];
	}


	public static function statuses()
	{
		return [

		    self::SUCCESS_STATUS => '<label class="label btn btn-success btn-xs">Прошел</label>',
			self::FAIL_STATUS => '<label class="label btn btn-danger btn-xs">Не прошел</label>',
			self::ERROR_STATUS => '<label class="label btn btn-danger btn-xs">Прерван</label>',
		];
	}

	public   function getTime()
	{
//		$start = TimelineEvent::find()->where(['report'=>$this->id])->orderBy(['id'=> SORT_DESC])->one();
//		$end = TimelineEvent::find()->where(['report'=>$this->id])->orderBy(['id'=> SORT_ASC])->one();
//		$start_date = new \DateTime(Yii::$app->formatter->asTime($start->created_at));
//		$end_date =new \DateTime(Yii::$app->formatter->asTime($end->created_at));
//		$interval = $start_date->diff($end_date);
//		return $interval->format("Время мед осмотра %I мин %S сек.");



	}


	public static function getCount()
	{

		$query = MedReport::find();

		if(\Yii::$app->user->can(User::ROLE_DOCTOR)  ) {

			$doctor = MedDoctors::find()->where(['user_id'=> Yii::$app->user->getId()])->one();
			if($doctor){
				$query->where([ 'id'=> $doctor->id]);
			}

			return $query->count();
		}

		if(\Yii::$app->user->can(User::ROLE_MANAGER_HR)  ){
			$keyStorage = Yii::$app->keyStorage;
			$company_id = $keyStorage->get('currentCompanyUser_' . Yii::$app->user->getId());
			$query->where([ 'company_id'=> $company_id]);
			return $query->count();
		}

		return MedReport::find()->count();
}

}
