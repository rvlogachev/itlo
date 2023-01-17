<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[BotLog]].
 *
 * @see BotLog
 */
class BotLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BotLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BotLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
