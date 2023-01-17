<?php
namespace common\modules\cms\modules\config;

use common\modules\cms\modules\form\IHasForm;
use yii\base\Model;

/**
 * @see ConfigBehavior
 *
 * @property Model|IHasForm $configModel
 * @property ConfigStorage  $configStorage
 * @property ConfigBehavior $configBehavior
 * @property array          $callAttributes
 * @property string         $configClassName
 * @property string         $configKey
 *
 * @method $this configRefresh()
 *
 */
trait ConfigTrait
{

}

