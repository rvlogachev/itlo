<?php

use yii\db\Migration;

/**
 * Class m190730_134904_bot_order_addcol
 */
class m190730_134904_bot_order_addcol extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('bot_order','email','VARCHAR(150) DEFAULT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropColumn('bot_order','email');
    }


}
