<?php

use yii\db\Migration;

/**
 * Class m190602_121306_bot_widget_text_body
 */
class m190602_121306_bot_widget_text_body extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('bot_widget_text','body','TEXT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('bot_widget_text','body','VARCHAR(255) NULL DEFAULT');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190602_121306_bot_widget_text_body cannot be reverted.\n";

        return false;
    }
    */
}
