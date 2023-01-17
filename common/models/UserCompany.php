<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_company".
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property int $status
 *
 * @property MedCompany $company
 * @property User $user
 */
class UserCompany extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_id', 'status'], 'integer'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => MedCompany::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'company_id' => 'Company ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery|MedCompanyQuery
     */
    public function getCompany()
    {
        return $this->hasOne(MedCompany::className(), ['id' => 'company_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserCompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserCompanyQuery(get_called_class());
    }
}
