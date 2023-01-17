<?php

use yii\db\Migration;

/**
 * Class m191206_103250_add_status_pay_to_order
 */
class m191206_103250_add_status_pay_to_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addColumn('bot_order','status_pay','INT(11) DEFAULT 0');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('bot_order','status_pay');
    }

}
