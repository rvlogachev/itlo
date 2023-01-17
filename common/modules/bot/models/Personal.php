<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 08.09.2018
 * Time: 20:46
 */

namespace common\modules\bot\models;


use common\models\Userbot;

class Personal extends Userbot
{
    const TYPE = 1;
    const PERSONAL_TYPES = [
        'Мастер приемщик',
        'Автомеханик',
        'Менеджер по продажам',
        'ИТР',
    ];

    public function init()
    {
        $this->userType = self::TYPE;
        parent::init();
    }

    public static function find()
    {
        return new UserQuery(get_called_class(), [
            'type' => self::TYPE,
            'tableName' => self::tableName(),
        ]);
    }

    public function beforeSave($insert)
    {
        $this->type = self::TYPE;
        return parent::beforeSave($insert);
    }

    public function getPersonalTypeName()
    {
        return self::PERSONAL_TYPES[$this->personalTypeId];
    }
}