<?php

namespace common\modules\bot\modules\catalog;



class CatalogModule extends \yii\base\Module
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
