<?php

use yii\db\Migration;

/**
 * Class m190730_134135_bot_order
 */
class m190730_134135_bot_order extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
                      CREATE TABLE `bot_order` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `type` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Тип гороскопа',
                `name` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Имя',
                `date_birth` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Дата рождения',
                `time_birth` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время рождения',
                `place_birth` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Место рождения',
                `name_partner` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Имя партнера',
                `date_birth_partner` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Дата рождения партнера',
                `time_birth_partner` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время рождения партнера',
                `place_birth_partner` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Место рождения партнера',
                `status` INT(11) NOT NULL DEFAULT '0' COMMENT 'Статус',
                `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
                `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата обновления',
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
        $this->dropTable('bot_order');
    }
}
