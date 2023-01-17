<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[BotSettings]].
 *
 * @see BotSettings
 */
class BotSettingsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BotSettings[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BotSettings|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
