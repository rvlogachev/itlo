<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MedTerminals]].
 *
 * @see MedTerminals
 */
class MedTerminalsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MedTerminals[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MedTerminals|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
