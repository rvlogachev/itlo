<?php

namespace common\modules\crypto\components;



use Yii;
use yii\base\Component;
use yii\base\InvalidArgumentException;

class Crypto extends Component
{

    protected $model;

    /**
     * Initialize the component
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->model = new \common\modules\crypto\models\Crypto;
    }

    /**
     * {@inheritdoc}
     */
    public function __get($param) {
        return parent::__get($param);
    }

    /**
     * {@inheritdoc}
     */
    public function __set($param, $value) {
        return parent::__set($param, $value);
    }

}

?>