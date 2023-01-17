<?php
/**
 */

namespace common\modules\cms\traits;

use yii\base\Model;

/**
 * @property Model $model;
 *
 * Class THasModel
 * @package common\modules\cms\traits
 */
trait THasModel
{
    /**
     * @var string
     */
    protected $_model = '';

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * @param Model $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->_model = $model;
        return $this;
    }

}