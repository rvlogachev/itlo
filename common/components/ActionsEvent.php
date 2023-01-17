<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 13.03.16
 * Time: 15:13
 */
namespace common\components;

use yii\base\Component;
use yii\base\Event;

class ActionsEvent extends Event
{


    const ADD_LEAD = 'add_lead';        // Переход на страницу index




    public $params;
    public $order_id;
    public $number;
    public $name;
    public $phone;
    public $event_id;
    public $email;
    public $number_otpravki;
    public $product_id;
    public $fio;
    public $status;
    public $cookie;




}