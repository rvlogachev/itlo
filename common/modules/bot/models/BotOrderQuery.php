<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[BotOrder]].
 *
 * @see BotOrder
 */
class BotOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BotOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BotOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
