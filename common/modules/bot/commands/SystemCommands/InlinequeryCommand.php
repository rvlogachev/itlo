<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\modules\bot\commands\SystemCommands;
use common\modules\bot\commands\SystemCommand;


/**
 * Inline query command
 */
class InlinequeryCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'inlinequery';
    protected $description = 'Reply to inline query';
    protected $version = '1.0.2';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $update = $this->getUpdate();
        $inline_query = $update->getInlineQuery();
        $from = $inline_query->getFrom();
        $user_id = $from->getId();
        $query = $inline_query->getQuery();
        $data = ['inline_query_id' => $inline_query->getId()];
        $results = [];
        $command = \Yii::$app->dbbot->createCommand("select chat_id from user_chat where user_id=" . $user_id);
        $chat_id = $command->queryOne();
        \Yii::info("                                        chat_id  " . print_r($chat_id['chat_id'], true), 'infostudiobot');
        if ($chat_id) {
            $command = \Yii::$app->dbbot->createCommand("select notes from conversation where user_id=" . $user_id . " and chat_id=" . $chat_id['chat_id'] . " and status = 'active' ");
            $conversation = $command->queryOne();
            \Yii::info("   conversation->notes  " . print_r($conversation['notes'], true), 'infostudiobot');
            $articles = [];
            $notes = json_decode($conversation['notes'], true);
            \Yii::info("   conversation->notes  " . print_r($notes, true), 'infostudiobot');
            \Yii::info("   notes name   " . print_r($notes['name'], true), 'infostudiobot');

            switch (trim($notes['name'])) {
                case 'registraciamoyka':
                    \Yii::info(" Registraciamoyka ", 'infostudiobot');
                    switch ($notes['state']) {
                        case 10:
                            $address_city = $notes['address_city'];
                            \Yii::info("                                        address_city  " . print_r($address_city, true), 'infostudiobot');
                            $command = \Yii::$app->db->createCommand("
                            select id, `name`, `okrug`
                            from geo_district
                            where geo_city_id in (select id from geo_city where city like '%" . $address_city ."%')
                            and `name` Like '%".$query."%'
                            order by `name`
                            limit 10 
                            ");
                            $row = $command->queryAll();
                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['name'], true), 'infostudiobot');

                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['name'],
                                    'description' => $item['okrug'],
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['name']])
                                ];
                            }
                            break;
                        case 9:
                            $command = \Yii::$app->db->createCommand("select * from geo_city where `city` Like '" . $query . "%' and status=1 order by city asc limit 10 ");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['city'], true), 'infostudiobot');

                                $articles[] = [

                                    'id' => $item['id'],
                                    'title' => $item['city'],
                                    'description' => 'вы ввели: ' . $query,
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['city']])


                                ];

                            }
                            break;
                    }
                    break;

                case 'editprofile':

                    switch ($notes['state']) {
                        case 10:
                            $address_city = $notes['address_city'];
                            \Yii::info("                                        address_city  " . print_r($address_city, true), 'infostudiobot');
                            $command = \Yii::$app->db->createCommand("
                            select id, `name`, `okrug`
                            from geo_district
                            where geo_city_id in (select id from geo_city where city like '%" . $address_city ."%')
                            and `name` Like '%".$query."%'
                            order by `name`
                            limit 10 
                            ");
                            $row = $command->queryAll();
                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['name'], true), 'infostudiobot');

                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['name'],
                                    'description' => $item['okrug'],
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['name']])
                                ];
                            }
                            break;
                        case 9:
                            $command = \Yii::$app->db->createCommand("select * from geo_city where `city` Like '" . $query . "%' and status=1 order by city asc limit 10 ");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['city'], true), 'infostudiobot');

                                $articles[] = [

                                    'id' => $item['id'],
                                    'title' => $item['city'],
                                    'description' => 'вы ввели: ' . $query,
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['city']])


                                ];

                            }
                            break;
                    }

                    break;

                case 'findmoyka':
                    \Yii::info(" Findmoyka ", 'infostudiobot');

                    switch ($notes['state']) {
                        case 2:
                            $command = \Yii::$app->db->createCommand("select id,mark from add_automarka where `mark` Like '" . $query . "%'   order by mark asc limit 10 ");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['mark'], true), 'infostudiobot');
                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['mark'],
                                    'description' => 'вы ввели: ' . $query,
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['mark']])
                                ];
                            }
                            break;
                        case 3:
                            $command = \Yii::$app->db->createCommand("
                            SELECT id,model
                            FROM add_automodel
                            WHERE `model` LIKE  '" . $query . "%'
                            and mark_id in (select id from add_automarka where mark  ='" . $notes['marka'] . "')
                           
                            ORDER BY model ASC
                            limit 10");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("         row " . print_r($item['model'], true), 'infostudiobot');

                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['model'],
                                    'description' => $notes['marka'],
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['model']])
                                ];
                            }
                            break;

                        case 6:
                            $command = \Yii::$app->db->createCommand("select * from geo_city where `city` Like '" . $query . "%' and status=1 order by city asc limit 10 ");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['city'], true), 'infostudiobot');

                                $articles[] = [

                                    'id' => $item['id'],
                                    'title' => $item['city'],
                                    'description' => 'вы ввели: ' . $query,
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['city']])


                                ];

                            }
                            break;
                        case 7:
                            $address_city = $notes['city'];
                            \Yii::info("                                        address_city  " . print_r($address_city, true), 'infostudiobot');
                            $command = \Yii::$app->db->createCommand("
                            select id, `name`, `okrug`
                            from geo_district
                            where geo_city_id in (select id from geo_city where city like '%" . $address_city . "%')
                            and `name` Like '%".$query."%'
                            order by `name` asc limit 10
                            ");
                            $row = $command->queryAll();
                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['name'], true), 'infostudiobot');

                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['name'],
                                    'description' => $item['okrug'],
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['name']])
                                ];
                            }

                            break;





                    }
                    break;

                case 'editsettings':
                    switch ($notes['state']) {
                        case 4:
                            $command = \Yii::$app->db->createCommand("select id,mark from add_automarka where `mark` Like '" . $query . "%'   order by mark asc limit 10 ");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['mark'], true), 'infostudiobot');
                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['mark'],
                                    'description' => 'вы ввели: ' . $query,
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['mark']])
                                ];
                            }
                            break;
                        case 5:
                            $command = \Yii::$app->db->createCommand("
                            SELECT id,model
                            FROM add_automodel
                            WHERE `model` LIKE  '" . $query . "%'
                            and mark_id in (select id from add_automarka where mark  ='" . $notes['marka'] . "')
                           
                            ORDER BY model ASC
                            limit 10");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("         row " . print_r($item['model'], true), 'infostudiobot');

                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['model'],
                                    'description' => $notes['marka'],
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['model']])
                                ];
                            }
                            break;
                    }
                    break;

                case 'findmoykathis':
                    \Yii::info(" Findmoyka ", 'infostudiobot');

                    switch ($notes['state']) {
                        case 2:
                            $command = \Yii::$app->db->createCommand("select id,mark from add_automarka where `mark` Like '" . $query . "%'   order by mark asc limit 10 ");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("                                        row " . print_r($item['mark'], true), 'infostudiobot');
                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['mark'],
                                    'description' => 'вы ввели: ' . $query,
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['mark']])
                                ];
                            }
                            break;
                        case 3:
                            $command = \Yii::$app->db->createCommand("
                            SELECT id,model
                            FROM add_automodel
                            WHERE `model` LIKE  '" . $query . "%'
                            and mark_id in (select id from add_automarka where mark  ='" . $notes['marka'] . "')
                            ORDER BY model ASC
                            limit 10");
                            $row = $command->queryAll();

                            foreach ($row as $item) {
                                \Yii::info("         row " . print_r($item['model'], true), 'infostudiobot');

                                $articles[] = [
                                    'id' => $item['id'],
                                    'title' => $item['model'],
                                    'description' =>$notes['marka'],
                                    'input_message_content' => new InputTextMessageContent(['message_text' => $item['model']])
                                ];
                            }
                            break;
                    }
                    break;

            }


            foreach ($articles as $article) {
                $results[] = new InlineQueryResultArticle($article);
            }
        }


        $data['results'] = '[' . implode(',', $results) . ']';
        $data['cache_time'] = 0;
        $data['is_personal'] = false;
        \Yii::info("                                        data " . print_r($data, true), 'infostudiobot');
        return Request::answerInlineQuery($data);
    }
}
