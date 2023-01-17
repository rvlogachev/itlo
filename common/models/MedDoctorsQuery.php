<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MedDoctors]].
 *
 * @see MedDoctors
 */
class MedDoctorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MedDoctors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MedDoctors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
