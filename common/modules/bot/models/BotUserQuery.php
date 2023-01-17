<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[UserBot]].
 *
 * @see UserBot
 */
class BotUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserBot[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserBot|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
