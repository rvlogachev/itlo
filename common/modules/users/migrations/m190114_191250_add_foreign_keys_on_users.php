<?php

use yii\db\Migration;

/**
 * Class m190114_191244_users
 */
class m190114_191250_add_foreign_keys_on_users extends Migration
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



//        $this->addForeignKey('cms_user_created_by','users','created_by','users','id',null,null);
//        $this->addForeignKey('cms_user_updated_by','users','updated_by','users','id',null,null);
//        $this->addForeignKey('cms_user__image_id','users','image_id','cms_storage_file','id',null,null);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('cms_user_created_by','users');
//        $this->dropForeignKey('cms_user_updated_by','users');
//        $this->dropForeignKey('cms_user__image_id','users');
    }
}
