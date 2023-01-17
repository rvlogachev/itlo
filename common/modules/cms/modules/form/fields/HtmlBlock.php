<?php
namespace common\modules\cms\modules\form\fields;

use common\modules\cms\modules\form\Element;

/**
 * @property string $content;
 *
 * Class HtmlBlock
 * @package skeeks\yii2\form\fields
 */
class HtmlBlock extends Element
{
    /**
     * @var
     */
    protected $_content;

    /**
     * @return string
     */
    public function getContent()
    {
        if (isset($this->_content)) {
            if ($this->_content instanceof \Closure) {
                return (string)call_user_func($this->_content, $this);
            }
            return $this->_content;
        }
        return false;

    }

    public function setContent($content)
    {
        $this->_content = $content;
        return $this;
    }

    /**
     * @return \yii\widgets\ActiveField
     */
    public function render()
    {
        echo $this->content;
    }
}