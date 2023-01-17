<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[BotTest]].
 *
 * @see BotTest
 */
class BotTestQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BotTest[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BotTest|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
