<?php
namespace common\modules\cms\widgets;

use common\modules\cms\models\CmsStorageFile;
use yii\helpers\Html;

/**
 * Class AjaxFileUploadWidget
 * @package common\modules\cms\widgets
 */
class AjaxFileUploadWidget extends \common\modules\cms\modules\ajaxfileupload\widgets\AjaxFileUploadWidget
{
    protected function _initClientFiles()
    {
        if ($this->multiple) {
            if (is_array($this->model->{$this->attribute})) {
                foreach ($this->model->{$this->attribute} as $value) {
                    if ($file = CmsStorageFile::findOne((int)$value)) {
                        $this->clientOptions['files'][] = $this->_getCmsFileData($file);
                    } else {
                        if ($this->_getClientFileData($value)) {
                            $this->clientOptions['files'][] = $this->_getClientFileData($value);
                        }
                    }
                }

            }

        } else {
            if ($value = $this->model->{$this->attribute}) {
                if ($file = CmsStorageFile::findOne((int)$value)) {
                    $this->clientOptions['files'][] = $this->_getCmsFileData($file);
                } else {
                    return parent::_initClientFiles();
                }
            } else {
                return parent::_initClientFiles();
            }
        }

        return $this;
    }

    protected function _getCmsFileData(CmsStorageFile $file)
    {
        $fileData = [
            'name' => $file->fileName,
            'value' => $file->id,
            'state' => 'success',
            'size' => $file->size,
            'type' => $file->mime_type,
            'src' => $file->src,
        ];

        if ($file->isImage()) {
            $fileData['image'] = [
                'height' => $file->image_height,
                'width' => $file->image_width,
            ];

            $fileData['preview'] = Html::img($file->src);
        }

        return $fileData;
    }

}