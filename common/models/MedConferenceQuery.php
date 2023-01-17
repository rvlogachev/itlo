<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MedConference]].
 *
 * @see MedConference
 */
class MedConferenceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MedConference[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MedConference|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
