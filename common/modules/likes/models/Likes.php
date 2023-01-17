<?php

namespace common\modules\likes\models;

use Yii;

/**
 * This is the model class for table "{{%likes}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_ip
 * @property string $entity_id
 * @property int $target_id
 * @property int $is_like
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Users $user
 */

class Likes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%likes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = [
            [['user_id', 'target_id', 'is_like'], 'integer'],
            [['user_ip', 'entity_id', 'target_id'], 'required'],
            [['user_ip'], 'string', 'max' => 39],
            [['entity_id'], 'string', 'max' => 32],
            [['created_at', 'updated_at'], 'safe'],
        ];

        if(class_exists('\common\modules\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $rules[] = [['user_id'], 'required'];
            $rules[] = [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\modules\users\models\Users::class, 'targetAttribute' => ['user_id' => 'id']];
        }
        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/modules/likes', 'ID'),
            'user_id' => Yii::t('app/modules/likes', 'User ID'),
            'user_ip' => Yii::t('app/modules/likes', 'User IP'),
            'entity_id' => Yii::t('app/modules/likes', 'Entity'),
            'target_id' => Yii::t('app/modules/likes', 'Target'),
            'is_like' => Yii::t('app/modules/likes', 'Is Like'),
            'created_at' => Yii::t('app/modules/likes', 'Created At'),
            'updated_at' => Yii::t('app/modules/likes', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        if(class_exists('\common\modules\users\models\Users') && isset(Yii::$app->modules['users']))
            return $this->hasOne(\common\modules\users\models\Users::class, ['id' => 'user_id']);
        else
            return null;
    }
}