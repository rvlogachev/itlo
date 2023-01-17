<?php

use yii\db\Migration;

/**
 * Class m190731_103705_add_col_bot_order
 */
class m190731_103705_add_col_bot_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('bot_order', 'user_id', 'INT(11) NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('bot_order','user_id');
    }


}

