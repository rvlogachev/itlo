<?php

namespace common\modules\bot\components\viber\Api\Message;

/**
 * Available message types
 *
 * @author Novikov Bogdan <hcbogdan@gmail.com>
 */
interface Type
{
    const TEXT = 'text';
    const PICTURE = 'picture';
    const VIDEO = 'video';
    const FILE = 'file';
    const STICKER = 'sticker';
    const CONTACT = 'contact';
    const URL = 'url';
    const LOCATION = 'location';
    const RICH_MEDIA = 'rich_media';
}
