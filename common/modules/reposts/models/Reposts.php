<?php

namespace common\modules\reposts\models;

use Yii;

/**
 * This is the model class for table "{{%reposts}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_ip
 * @property string $entity_id
 * @property int $target_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Users $user
 */

class Reposts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%reposts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = [
            [['user_id', 'target_id'], 'integer'],
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
            'id' => Yii::t('app/modules/reposts', 'ID'),
            'user_id' => Yii::t('app/modules/reposts', 'User ID'),
            'user_ip' => Yii::t('app/modules/reposts', 'User IP'),
            'entity_id' => Yii::t('app/modules/reposts', 'Entity'),
            'target_id' => Yii::t('app/modules/reposts', 'Target'),
            'created_at' => Yii::t('app/modules/reposts', 'Created At'),
            'updated_at' => Yii::t('app/modules/reposts', 'Updated At'),
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
