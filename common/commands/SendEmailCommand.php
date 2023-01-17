<?php

namespace common\commands;

use trntv\bus\interfaces\SelfHandlingCommand;
use yii\base\BaseObject;
use yii\swiftmailer\Message;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendEmailCommand extends BaseObject implements SelfHandlingCommand
{
    /**
     * @var mixedrabbitmq:
    image: "rabbitmq:3-management"
    hostname: "rabbit1"
    environment:
      RABBITMQ_ERLANG_COOKIE: "SWQOKODSQALRPCLNMEQG"
      RABBITMQ_DEFAULT_USER: ${RABBITMQ_DEFAULT_USER}
      RABBITMQ_DEFAULT_PASS: ${RABBITMQ_DEFAULT_PASS}
      RABBITMQ_DEFAULT_VHOST: "/"
    labels:
      NAME: "rabbitmq1"
    volumes:
      - "./docker/rabbitmq/enabled_plugins:/etc/rabbitmq/enabled_plugins"
    ports:
      - $RABBITMQ_PUBLIC_PORT:5672
      - $RABBITMQ_UI_PUBLIC_PORT:15672
     */
    public $from;
    /**
     * @var mixed
     */
    public $to;
    /**
     * @var string
     */
    public $subject;
    /**
     * @var string
     */
    public $view;
    /**
     * @var array
     */
    public $params;
    /**
     * @var string
     */
    public $body;
    /**
     * @var bool
     */
    public $html = true;

    /**
     * Command init
     */
    public function init()
    {
        $this->from = $this->from ?: \Yii::$app->params['robotEmail'];
    }

    /**
     * @param \common\commands\SendEmailCommand $command
     * @return bool
     */
    public function handle($command)
    {
        if (!$command->body) {
            $message = \Yii::$app->mailer->compose($command->view, $command->params);
        } else {
            $message = new Message();
            if ($command->isHtml()) {
                $message->setHtmlBody($command->body);
            } else {
                $message->setTextBody($command->body);
            }
        }
        $message->setFrom($command->from);
        $message->setTo($command->to ?: \Yii::$app->params['robotEmail']);
        $message->setSubject($command->subject);
        return $message->send();
    }

    /**
     * @return bool
     */
    public function isHtml()
    {
        return (bool)$this->html;
    }
}
