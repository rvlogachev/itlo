<?php
/**
 * @author Roman Logachev
 * @link http://itlo.ru/
 * @copyright 2018-2021 ITLO (CMS)
 * @date 15.11.2021
 * @since 0.0.1
 */

namespace common\modules\cms\models\behaviors;

use yii\base\Behavior;
use yii\caching\Cache;
use yii\caching\TagDependency;
use yii\db\ActiveQuery;
use yii\db\AfterSaveEvent;
use yii\db\BaseActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\ErrorHandler;

/**
 * Class HasTableCache
 * @package skeeks\cms\models\behaviors
 */
class HasTableCache extends Behavior
{
    /**
     * @var Cache
     */
    public $cache;

    /**
     * @return array
     */
    public function events()
    {
        return
            [
                BaseActiveRecord::EVENT_AFTER_UPDATE => "invalidateTableCache",
                BaseActiveRecord::EVENT_AFTER_INSERT => "invalidateTableCache",
                BaseActiveRecord::EVENT_AFTER_DELETE => "invalidateTableCache",
            ];
    }

    /**
     * При любом обновлении, сохранении, удалении записей в эту таблицу, инвалидируется тэг кэша таблицы
     * @return $this
     */
    public function invalidateTableCache()
    {
        TagDependency::invalidate($this->cache, [
            $this->getTableCacheTag()
        ]);

        return $this;
    }

    /**
     * @return string
     */
    public function getTableCacheTag()
    {
        return 'sx-table-' . $this->owner->tableName();
    }

}