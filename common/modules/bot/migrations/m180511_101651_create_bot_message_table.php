<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bot_message`.
 */
class m180511_101651_create_bot_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        $this->db->createCommand("CREATE TABLE  `bot_message` (
              `chat_id` bigint(20) NOT NULL COMMENT 'Unique chat identifier',
              `id` bigint(20) unsigned NOT NULL COMMENT 'Unique message identifier',
              `user_id` bigint(20) DEFAULT NULL COMMENT 'Unique user identifier',
              `date` timestamp NULL DEFAULT NULL COMMENT 'Date the message was sent in timestamp format',
              `forward_from` bigint(20) DEFAULT NULL COMMENT 'Unique user identifier, sender of the original message',
              `forward_from_chat` bigint(20) DEFAULT NULL COMMENT 'Unique chat identifier, chat the original message belongs to',
              `forward_date` timestamp NULL DEFAULT NULL COMMENT 'date the original message was sent in timestamp format',
              `reply_to_chat` bigint(20) DEFAULT NULL COMMENT 'Unique chat identifier',
              `reply_to_message` bigint(20) unsigned DEFAULT NULL COMMENT 'Message that this message is reply to',
              `text` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For text messages, the actual UTF-8 text of the message max message length 4096 char utf8mb4',
              `entities` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text',
              `audio` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Audio object. Message is an audio file, information about the file',
              `document` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Document object. Message is a general file, information about the file',
              `photo` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Array of PhotoSize objects. Message is a photo, available sizes of the photo',
              `sticker` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Sticker object. Message is a sticker, information about the sticker',
              `video` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Video object. Message is a video, information about the video',
              `voice` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Voice Object. Message is a Voice, information about the Voice',
              `contact` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Contact object. Message is a shared contact, information about the contact',
              `location` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Location object. Message is a shared location, information about the location',
              `venue` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Venue object. Message is a Venue, information about the Venue',
              `caption` text COLLATE utf8mb4_unicode_520_ci COMMENT 'For message with caption, the actual UTF-8 text of the caption',
              `new_chat_member` bigint(20) DEFAULT NULL COMMENT 'Unique user identifier, a new member was added to the group, information about them (this member may be bot itself)',
              `left_chat_member` bigint(20) DEFAULT NULL COMMENT 'Unique user identifier, a member was removed from the group, information about them (this member may be bot itself)',
              `new_chat_title` char(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'A chat title was changed to this value',
              `new_chat_photo` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Array of PhotoSize objects. A chat photo was change to this value',
              `delete_chat_photo` tinyint(1) DEFAULT '0' COMMENT 'Informs that the chat photo was deleted',
              `group_chat_created` tinyint(1) DEFAULT '0' COMMENT 'Informs that the group has been created',
              `supergroup_chat_created` tinyint(1) DEFAULT '0' COMMENT 'Informs that the supergroup has been created',
              `channel_chat_created` tinyint(1) DEFAULT '0' COMMENT 'Informs that the channel chat has been created',
              `migrate_to_chat_id` bigint(20) DEFAULT NULL COMMENT 'Migrate to chat identifier. The group has been migrated to a supergroup with the specified identifie',
              `migrate_from_chat_id` bigint(20) DEFAULT NULL COMMENT 'Migrate from chat identifier. The supergroup has been migrated from a group with the specified identifier',
              `pinned_message` text COLLATE utf8mb4_unicode_520_ci COMMENT 'Message object. Specified message was pinned',
              PRIMARY KEY (`chat_id`,`id`));")->execute();
            $this->createIndex('user_id','bot_message','user_id');
            $this->createIndex('forward_from','bot_message','forward_from');
            $this->createIndex('forward_from_chat','bot_message','forward_from_chat');
            $this->createIndex('reply_to_chat','bot_message','reply_to_chat');
            $this->createIndex('reply_to_message','bot_message','reply_to_message');
            $this->createIndex('new_chat_member','bot_message','new_chat_member');
            $this->createIndex('left_chat_member','bot_message','left_chat_member');
            $this->createIndex('migrate_from_chat_id','bot_message','migrate_from_chat_id');
            $this->createIndex('migrate_to_chat_id','bot_message','migrate_to_chat_id');
            $this->createIndex('reply_to_chat_2','bot_message',['reply_to_chat','reply_to_message']);
            $this->addForeignKey('message_ibfk_1','bot_message','user_id','bot_user','id');
            $this->addForeignKey('message_ibfk_2','bot_message','chat_id','bot_chat','id');
            $this->addForeignKey('message_ibfk_3','bot_message','forward_from','bot_user','id');
            $this->addForeignKey('message_ibfk_4','bot_message','forward_from_chat','bot_chat','id');
            $this->addForeignKey('message_ibfk_5','bot_message',['reply_to_chat', 'reply_to_message'],'bot_message',['chat_id', 'id']);
            $this->addForeignKey('message_ibfk_6','bot_message','new_chat_member','bot_user','id');
            $this->addForeignKey('message_ibfk_7','bot_message','left_chat_member','bot_user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('message_ibfk_1','bot_message');
        $this->dropForeignKey('message_ibfk_2','bot_message');
        $this->dropForeignKey('message_ibfk_3','bot_message');
        $this->dropForeignKey('message_ibfk_4','bot_message');
        $this->dropForeignKey('message_ibfk_5','bot_message');
        $this->dropForeignKey('message_ibfk_6','bot_message');
        $this->dropForeignKey('message_ibfk_7','bot_message');
        $this->dropIndex('user_id','bot_message');
        $this->dropIndex('forward_from','bot_message');
        $this->dropIndex('forward_from_chat','bot_message');
        $this->dropIndex('reply_to_chat','bot_message');
        $this->dropIndex('reply_to_message','bot_message');
        $this->dropIndex('new_chat_member','bot_message');
        $this->dropIndex('left_chat_member','bot_message');
        $this->dropIndex('migrate_from_chat_id','bot_message');
        $this->dropIndex('migrate_to_chat_id','bot_message');
        $this->dropIndex('reply_to_chat_2','bot_message');
        $this->dropTable('bot_message');
    }
}
