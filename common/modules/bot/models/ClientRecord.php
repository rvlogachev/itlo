<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 08.09.2018
 * Time: 20:47
 */

namespace common\modules\bot\models;


use yii\db\ActiveRecord;

class ClientRecord extends ActiveRecord
{
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'clientId']);
    }

    public function getCar()
    {
        return $this->hasOne(Car::className(), ['id' => 'selectedCarId']);
    }
}