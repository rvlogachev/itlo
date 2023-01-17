<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\modules\bot\commands\UserCommands;
use common\modules\bot\commands\UserCommand;
use common\modules\bot\Request;


/**
 * User "/echo" command
 */
class EchoCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'echo';
    protected $description = 'Show text';
    protected $usage = '/echo <text>';
    protected $version = '1.0.1';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $text = trim($message->getText(true));

        if ($text === '') {
            $text = 'Command usage: ' . $this->getUsage();
        }

        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
        ];

        return Request::sendMessage($data);
    }
}
