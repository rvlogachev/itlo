<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 08.09.2018
 * Time: 20:46
 */

namespace common\modules\bot\models;


use yii\db\ActiveRecord;

class Car extends ActiveRecord
{
    public function getCarName()
    {
        return "{$this->markName} {$this->modelName} {$this->number}";
    }
}