<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MedPosition]].
 *
 * @see MedPosition
 */
class MedPositionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MedPosition[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MedPosition|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
