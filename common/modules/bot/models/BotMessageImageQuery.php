<?php

namespace common\modules\bot\models;


use yii\db\ActiveQuery;
/**
 * This is the ActiveQuery class for [[LandingImage]].
 *
 * @see LandingImage
 */
class BotMessageImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LandingImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LandingImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
