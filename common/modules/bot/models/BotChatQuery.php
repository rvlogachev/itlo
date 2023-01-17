<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[BotChat]].
 *
 * @see BotChat
 */
class BotChatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BotChat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BotChat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
