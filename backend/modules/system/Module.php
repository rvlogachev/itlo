<?php

namespace common\modules\system;

/**
 * Admin dashboard for Butterfly.CMS
 *
 * @category        Module
 * @version         1.3.2
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-admin
 * @copyright       Copyright (c) 2019 - 2021 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use Yii;
use common\modules\base\BaseModule;

class Module extends BaseModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\system\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
