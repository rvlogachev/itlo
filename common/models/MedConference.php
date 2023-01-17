<?php

namespace common\models;

use backend\modules\rbac\models\RbacAuthAssignment;
use Yii;

/**
 * This is the model class for table "med_conference".
 *
 * @property int $id
 * @property int|null $doctor_id
 * @property int|null $user_id
 * @property string|null $date_conf
 * @property int|null $status
 * @property string|null $data_json
 */
class MedConference extends \yii\db\ActiveRecord
{

    const NEW_STATUS = 1;
    const ONLINE_STATUS =2;
    const SUCCESS_STATUS = 3;
    const FAIL_STATUS = 4;
    const ERROR_STATUS = 5;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_conference';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'status'], 'integer'],
            [['date_conf', 'data_json', 'user_id', 'frontend_peer', 'report', 'result'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => 'Доктор',
            'user_id' => 'Пользователь',
            'date_conf' => 'Дата',
            'status' => 'Статус',
            'result' => 'Решение врача',
            'data_json' => 'Data Json',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MedConferenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedConferenceQuery(get_called_class());
    }


	public function getUser()
	{
		return $this->hasOne(User::class, ['id' => 'user_id']);
	}


	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCompany()
	{
		return $this->hasOne(UserCompany::class, ['user_id' => 'user_id']);
	}


	public static function statusesTxt()
	{
		return [
			self::NEW_STATUS => 'Подана заявка',
			self::ONLINE_STATUS => 'Online',
			self::SUCCESS_STATUS => 'Прошел',
			self::FAIL_STATUS => 'Не прошел',
			self::ERROR_STATUS => 'Прерван',
		];
	}


	public static function statuses()
	{
		return [
			self::NEW_STATUS => '<label class="label btn btn-info btn-xs">Подана заявка</label>',
			self::ONLINE_STATUS => '<label class="label btn btn-success btn-xs">Online</label>',
			self::SUCCESS_STATUS => '<label class="label btn btn-success btn-xs">Прошел</label>',
			self::FAIL_STATUS => '<label class="label btn btn-danger btn-xs">Не прошел</label>',
			self::ERROR_STATUS => '<label class="label btn btn-danger btn-xs">Прерван</label>',
		];
	}


	public function getDoctors()
	{
		return $this->hasMany(MedDoctors::class, ['id' => 'doctor_id']);
	}

	/**
	 * @return int|string
	 */
	public static function getCount()
	{
		if(\Yii::$app->user->can('manager HR') || \Yii::$app->user->can('doctor')) {
			$query = MedConference::find();
			$model = User::find()->where(['id'=>\Yii::$app->user->getId()])->one();
			$query->joinWith("user");
			$query->andFilterWhere([ 'user.company_id' => $model->company_id]);
			return $query->count();
		}else{
			return MedConference::find()->count();
		}
	}


}
