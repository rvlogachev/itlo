<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MedReport]].
 *
 * @see MedReport
 */
class MedReportQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MedReport[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MedReport|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
