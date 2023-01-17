<?php

namespace common\modules\bot\models\form;

use Yii;
use yii\base\Model;
use borales\extensions\phoneInput\PhoneInputValidator;


class SendUserForm extends Model
{
    public $screen;
    public $users;


    public function rules()
    {
        return [

            [['screen', ], 'integer'],
            ['users', 'safe'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'screen' => Yii::t('frontend', 'Экран'),
            'users' => Yii::t('frontend', 'Пользователи'),

        ];
    }


}
