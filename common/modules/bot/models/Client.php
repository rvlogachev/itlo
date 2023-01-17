<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 08.09.2018
 * Time: 20:45
 */

namespace common\modules\bot\models;


use common\models\Userbot;

class Client extends Userbot
{
    const TYPE = 0;

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

    public function getCars()
    {
        return $this->hasMany(Car::className(), ['id' => 'carId'])
            ->viaTable('clientCar', ['clientId' => 'id']);
    }

    public function getClientRecords()
    {
        return $this->hasMany(ClientRecord::className(), ['clientId' => 'id']);
    }
}