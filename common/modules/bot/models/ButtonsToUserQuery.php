<?php

namespace common\modules\bot\models;

/**
 * This is the ActiveQuery class for [[ButtonsToUser]].
 *
 * @see ButtonsToUser
 */
class ButtonsToUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ButtonsToUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ButtonsToUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
