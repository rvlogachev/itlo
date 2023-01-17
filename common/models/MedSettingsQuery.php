<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MedSettings]].
 *
 * @see MedSettings
 */
class MedSettingsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MedSettings[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MedSettings|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
