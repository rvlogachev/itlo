<?php

use yii\db\Migration;

/**
 * Class m190115_100655_add_platforma_botscreens
 */
class m190115_100655_add_platforma_botscreens extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
         ALTER TABLE `bot_screens`
	ADD COLUMN `platform` ENUM('telegram','vk','facebook','viber','whatsapp') NULL DEFAULT NULL AFTER `created_at`;

        ");
        $res->query();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('bot_screens', 'platform');
    }
}
