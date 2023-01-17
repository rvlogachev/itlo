<?php

namespace common\modules\bot\modules\expert;



class ExpertModule extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\bot\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public static function getModuleName(){




        return \Yii::t('common', 'Bot');

    }

}
