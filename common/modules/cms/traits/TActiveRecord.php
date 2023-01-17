<?php
/**
 */

namespace common\modules\cms\traits;

/**
 * @property string $asText;
 * @property string $asHtml;
 *
 */
trait TActiveRecord
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->asText();
    }
    /**
     * @return string
     */
    public function asText()
    {
        $result = [];
        $result[] = "#".$this->id;

        if (isset($this->name) && is_string($this->name)) {
            $result[] = $this->name;
        } else if (isset($this->label) && is_string($this->label)) {
            $result[] = $this->label;
        }

        return implode("#", $result);
    }

    /**
     * @return string
     */
    public function getAsText()
    {
        return $this->asText();
    }

    /**
     * @return string
     */
    public function getAsHtml()
    {
        return $this->asHtml();
    }

    /**
     * @return string
     */
    public function asHtml()
    {
        return $this->asText();
    }
}