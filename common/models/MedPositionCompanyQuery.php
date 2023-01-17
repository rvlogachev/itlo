<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MedPositionCompany]].
 *
 * @see MedPositionCompany
 */
class MedPositionCompanyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MedPositionCompany[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MedPositionCompany|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
