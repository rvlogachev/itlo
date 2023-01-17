<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserCompany]].
 *
 * @see UserCompany
 */
class UserCompanyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserCompany[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserCompany|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
