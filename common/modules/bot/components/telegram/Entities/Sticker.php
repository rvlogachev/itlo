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

class Sticker extends Entity
{
    protected $file_id;
    protected $width;
    protected $height;
    protected $thumb;
    protected $emoji;
    protected $file_size;

    /**
     * Sticker constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {

        $this->file_id = isset($data['file_id']) ? $data['file_id'] : null;
        if (empty($this->file_id)) {
            throw new TelegramException('file_id is empty!');
        }

        $this->width = isset($data['width']) ? $data['width'] : null;
        if (empty($this->width)) {
            throw new TelegramException('width is empty!');
        }

        $this->height = isset($data['height']) ? $data['height'] : null;
        if (empty($this->height)) {
            throw new TelegramException('height is empty!');
        }

        $this->thumb = isset($data['thumb']) ? $data['thumb'] : null;
        if (empty($this->thumb)) {
            throw new TelegramException('thumb is empty!');
        }
        $this->thumb = new PhotoSize($this->thumb);

        $this->emoji = isset($data['emoji']) ? $data['emoji'] : null;

        $this->file_size = isset($data['file_size']) ? $data['file_size'] : null;
    }

    public function getFileId()
    {
        return $this->file_id;
    }

    public function getWidth()
    {
         return $this->width;
    }

    public function getHeight()
    {
         return $this->height;
    }

    public function getThumb()
    {
         return $this->thumb;
    }

    public function getEmoji()
    {
         return $this->emoji;
    }

    public function getFileSize()
    {
         return $this->file_size;
    }
}
