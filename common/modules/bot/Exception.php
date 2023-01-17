<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\modules\bot;

/**
 * Main exception class used for exception handling
 */
class Exception extends \Exception
{
    public function __construct($msg){


        \Yii::info("Exception   ".print_r($msg,true), 'chat');

        return parent::__construct();
    }
}
