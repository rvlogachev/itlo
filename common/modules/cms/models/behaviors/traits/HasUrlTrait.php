<?php
/**
 * @author Roman Logachev
 * @link http://itlo.ru/
 * @copyright 2018-2021 ITLO (CMS)
 * @date 15.11.2021
 * @since 0.0.1
 */

namespace common\modules\cms\models\behaviors\traits;

use common\modules\cms\models\CmsContentElementTree;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 *
 * @property string absoluteUrl
 * @property string url
 */
trait HasUrlTrait
{
    /**
     * @return string
     */
    public function getAbsoluteUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return "";
    }
}