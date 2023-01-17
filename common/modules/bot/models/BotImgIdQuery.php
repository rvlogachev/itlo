<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[BotImgId]].
 *
 * @see BotImgId
 */
class BotImgIdQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BotImgId[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BotImgId|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
