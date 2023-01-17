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
use common\modules\cms\models\CmsTree;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @method ActiveQuery getElementTrees()
 * @method ActiveQuery getCmsTrees()
 * @method int[] getTreeIds()
 *
 * @property CmsContentElementTree[] $elementTrees
 * @property int[] $treeIds
 * @property CmsTree[] $cmsTrees
 */
trait HasTreesTrait
{
}