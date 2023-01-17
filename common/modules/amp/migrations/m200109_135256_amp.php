<?php

use yii\db\Migration;

/**
 * Class m200109_135256_amp
 */
class m200109_135256_amp extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        if (class_exists('\common\modules\pages\models\Pages')) {
            $userTable = \common\modules\pages\models\Pages::tableName();

            if (is_null($this->getDb()->getSchema()->getTableSchema($userTable)->getColumn('in_amp')))
                $this->addColumn($userTable, 'in_amp', $this->boolean()->defaultValue(true));

        }

        if (class_exists('\common\modules\news\models\News')) {
            $userTable = \common\modules\news\models\News::tableName();

            if (is_null($this->getDb()->getSchema()->getTableSchema($userTable)->getColumn('in_amp')))
                $this->addColumn($userTable, 'in_amp', $this->boolean()->defaultValue(true));

        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        if (class_exists('\common\modules\pages\models\Pages')) {
            $userTable = \common\modules\pages\models\Pages::tableName();

            if (!is_null($this->getDb()->getSchema()->getTableSchema($userTable)->getColumn('in_amp')))
                $this->dropColumn($userTable, 'in_amp');

        }

        if (class_exists('\common\modules\news\models\News')) {
            $userTable = \common\modules\news\models\News::tableName();

            if (!is_null($this->getDb()->getSchema()->getTableSchema($userTable)->getColumn('in_amp')))
                $this->dropColumn($userTable, 'in_amp');

        }

    }
}
