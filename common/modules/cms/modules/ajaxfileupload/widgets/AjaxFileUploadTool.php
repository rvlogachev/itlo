<?php
namespace common\modules\cms\modules\ajaxfileupload\widgets;

use common\modules\cms\IHasInfo;
use common\modules\cms\models\CmsStorageFile;
use common\modules\cms\traits\THasInfo;
use yii\base\InvalidConfigException;
use yii\base\Widget;

/**
 * Download Tool
 *
 * @property $name;
 * @property $icon;
 * @property $image;
 *
 * Class AjaxFileUploadTool
 * @package skeeks\yii2\ajaxfileupload\widgets
 */
abstract class AjaxFileUploadTool extends Widget
{
    /**
     * @var AjaxFileUploadWidget
     */
    public $ajaxFileUploadWidget = null;

    /**
     * @var null
     */
    public $id = null;

    /**
     * @var null backend url
     */
    public $upload_url = null;
    /**
     * @var string
     */
    protected $_name = '';
    /**
     * @var string
     */
    protected $_icon = '';
    /**
     * @var string
     */
    protected $_image = '';
    public function init()
    {
        parent::init();

        if (!$this->ajaxFileUploadWidget || !$this->ajaxFileUploadWidget instanceof AjaxFileUploadWidget) {
            throw new InvalidConfigException();
        }

        if (!$this->upload_url) {
            $this->upload_url = $this->ajaxFileUploadWidget->upload_url;
        }
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->_icon;
    }
    /**
     * @param $icon
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->_icon = $icon;
        return $this;
    }
    /**
     * @return string
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->_image = $image;
        return $this;
    }
}