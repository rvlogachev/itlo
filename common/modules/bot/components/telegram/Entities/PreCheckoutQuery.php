<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\modules\bot\components\telegram\Entities;

use common\components\telegrambot\src\Exception\TelegramException;

class PreCheckoutQuery extends Entity
{
    protected $id;
    protected $from;
    protected $currency;
    protected $total_amount;
    protected $invoice_payload;

    /**
     * CallbackQuery constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? $data['id'] : null;
        if (empty($this->id)) {
            throw new TelegramException('id is empty!');
        }

        $this->from = isset($data['from']) ? $data['from'] : null;
        if (empty($this->from)) {
            throw new TelegramException('from is empty!');
        }
        $this->from = new User($this->from);

        $this->currency = isset($data['currency']) ? $data['currency'] : null;
        if (!empty($this->currency)) {
            $this->currency = "RUB";
        }

        $this->invoice_payload = isset($data['invoice_payload']) ? $data['invoice_payload'] : null;


        $this->total_amount = isset($data['total_amount']) ? $data['total_amount'] : null;




        \Yii::info("PreCheckoutQuery иницилизирован ", 'chat');

    }

    public function getId()
    {
        return $this->id;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getInvoicePayload()
    {
        return $this->invoice_payload;
    }


}
