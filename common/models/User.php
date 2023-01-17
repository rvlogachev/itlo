<?php

namespace common\models;
use  common\modules\cms\models\User as CmsUser;

/**
 * Class User
 * @package common\models
 */
class User
    extends CmsUser
{
    //Сюда пишем методя для расширения базовой сущьности пользователя, для конкретно этого проекта

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Game::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGameCompanies()
    {
        return $this->hasMany(GameCompany::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGameGenres()
    {
        return $this->hasMany(GameGenre::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGamePlatforms()
    {
        return $this->hasMany(GamePlatform::className(), ['updated_by' => 'id']);
    }
}