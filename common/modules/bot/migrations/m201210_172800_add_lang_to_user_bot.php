<?php

use yii\db\Migration;

/**
 * Class m201210_172800_add_lang_to_user_bot
 */
class m201210_172800_add_lang_to_user_bot extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addColumn('bot_user','lang','VARCHAR(50) DEFAULT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropColumn('bot_user','lang');
    }


}
