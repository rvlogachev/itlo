<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 08.09.2018
 * Time: 20:51
 */

namespace common\modules\bot\models;


use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    public $type;
    public $tableName;

    public function prepare($builder)
    {
        if ($this->type !== null) {
            $this->andWhere(["{$this->tableName}.userType" => $this->type]);
        }
        return parent::prepare($builder);
    }
}