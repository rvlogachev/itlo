<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[MessageVk]].
 *
 * @see MessageVk
 */
class MessageVkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MessageVk[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MessageVk|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
