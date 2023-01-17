<?php

use yii\db\Migration;

/**
 * Class m190602_122312_bot_screens_alter_platform
 */
class m190602_122312_bot_screens_alter_platform extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('bot_screens','platform',"ENUM('telegram','vk','facebook','viber','whatsapp','widget','tunel') NULL DEFAULT NULL");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('bot_screens','platform',"ENUM('telegram','vk','facebook','viber','whatsapp','widget') NULL DEFAULT NULL");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190602_122312_bot_screens_alter_platform cannot be reverted.\n";

        return false;
    }
    */
}
