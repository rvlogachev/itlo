<?php

use yii\db\Migration;

/**
 * Class m190823_164505_bot_tarif
 */
class m190823_164505_bot_tarif extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
                  CREATE TABLE `bot_tarif` (
                        `id` INT(11) NOT NULL AUTO_INCREMENT,
                        `slug` VARCHAR(50) NOT NULL DEFAULT '0',
                        `name` VARCHAR(512) NULL DEFAULT NULL,
                        `description` TEXT NULL,
                        `amount` FLOAT NULL DEFAULT NULL,
                        `status` INT(11) NOT NULL DEFAULT '0',
                        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                        PRIMARY KEY (`id`)
                    )
                    ENGINE=InnoDB
                    ;
        ");
        $res->query();




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bot_tarif');
    }
}
