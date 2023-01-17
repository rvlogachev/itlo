<?php

use yii\db\Migration;

/**
 * Class m190524_233522_views
 */
class m190524_233522_views extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%views}}', [
            'id'=> $this->bigPrimaryKey(20),
            'user_id' => $this->integer(),
            'user_ip' => $this->string(39)->notNull(),
            'entity_id' => $this->string(32)->notNull(),
            'target_id' => $this->integer()->null(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        $this->createIndex('idx_views_user','{{%views}}', ['user_id', 'user_ip'],false);
        $this->createIndex('idx_views_condition','{{%views}}', ['entity_id', 'target_id'],false);

        // If exist module `Users` set foreign key `user_id` to `users.id`
        if(class_exists('\common\modules\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $userTable = \common\modules\users\models\Users::tableName();
            $this->addForeignKey(
                'fk_views_to_users',
                '{{%views}}',
                'user_id',
                $userTable,
                'id',
                'NO ACTION',
                'CASCADE'
            );
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_views_user', '{{%views}}');
        $this->dropIndex('idx_views_condition', '{{%views}}');

        if(class_exists('\common\modules\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $userTable = \common\modules\users\models\Users::tableName();
            if (!(Yii::$app->db->getTableSchema($userTable, true) === null)) {
                $this->dropForeignKey(
                    'fk_views_to_users',
                    '{{%views}}'
                );
            }
        }

        $this->truncateTable('{{%views}}');
        $this->dropTable('{{%views}}');
    }

}
