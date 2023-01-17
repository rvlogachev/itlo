<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[BotTarif]].
 *
 * @see BotTarif
 */
class BotTarifQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BotTarif[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BotTarif|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
