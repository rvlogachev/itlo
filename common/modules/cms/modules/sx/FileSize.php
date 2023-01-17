<?php
/**
 * File
 *
 */
namespace common\modules\cms\modules\sx;
use yii\base\Exception;


/**
 * Class FileSize
 * @package skeeks\sx
 *
 * @deprecated
 */
class FileSize
{
    use traits\Entity;

    /**
     * @param $file
     * @return static
     */
    static public function object($file = null)
    {
        if ($file instanceof static)
        {
            return $file;
        } else
        {
            return new static($file);
        }
    }

    public function __construct($sizeBytes = 0)
    {
        $this->_data["bytes"] = (float) $sizeBytes;
    }

    /**
     * Размер в байтах
     * @return float
     */
    public function getBytes()
    {
        return (float) $this->get("bytes", 0);
    }

    /**
     * @param null $decimals
     * @param array $options
     * @param array $textOptions
     * @return string
     */
    public function formatedShortSize($decimals = null, $options = [], $textOptions = [])
    {
        return \Yii::$app->getFormatter()->asShortSize($this->getBytes(), $decimals, $options, $textOptions);
    }

    /**
     * @param null $decimals
     * @param array $options
     * @param array $textOptions
     * @return string
     */
    public function formatedSize($decimals = null, $options = [], $textOptions = [])
    {
        return \Yii::$app->getFormatter()->asSize($this->getBytes(), $decimals, $options, $textOptions);
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->formatedShortSize();
    }
}