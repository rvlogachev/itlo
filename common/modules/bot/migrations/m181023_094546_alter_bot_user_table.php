<?php

use yii\db\Migration;

/**
 * Class m181023_094546_alter_bot_user_table
 */
class m181023_094546_alter_bot_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('bot_user', 'email', $this->integer());
        $this->addColumn('bot_user', 'phone', $this->integer());
        $this->addColumn('bot_user', 'bonus', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('bot_user', 'email');
        $this->dropColumn('bot_user', 'phone');
        $this->dropColumn('bot_user', 'bonus');
    }
}
