<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;
/**
 * This is the model class for table "med_doctors".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $signature_hash
 */
class MedDoctors extends \yii\db\ActiveRecord
{


    /**
     * @var
     */
    public $picture;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_doctors';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'picture' => [
                'class' => UploadBehavior::class,
                'attribute' => 'picture',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url'
            ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
	        [['signature_hash', 'fio','phone','email' ], 'required'],
            [['user_id', ], 'integer'],
            ['picture', 'safe'],
            [['signature_hash', 'fio','phone','email'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'fio' => 'ФИО',
            'phone' => 'Телефон',
            'email' => 'Email',
            'signature_hash' => 'ЭЦП',
        ];
    }


	public function getUser()
	{
		return $this->hasOne(User::class, ['id' => 'user_id']);
	}

    /**
     * {@inheritdoc}
     * @return MedDoctorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedDoctorsQuery(get_called_class());
    }


	/**
	 * @return string
	 */
    public function getUrl() {
        if(!empty($this->base_url) && !empty($this->path)){
            return $this->base_url . '/' . $this->path;
        }else{
            return '/backend/web/img/anonymous.png';
        }
    }


	/**
	 * @return int|string
	 */
	public static function getCount()
	{

			return MedDoctors::find()->count();

	}
}
