<?php
namespace common\modules\cms\models\forms;

use common\modules\cms\models\CmsUserEmail;
use common\modules\cms\models\User;
use yii\base\Model;
use Yii;

/**
 * Class ViewFileEditModel
 * @package skeeks\cms\models\forms
 */
class ViewFileEditModel extends Model
{
    public $rootViewFile;

    public $error;

    public $source;

    public function init()
    {
        parent::init();

        if (is_readable($this->rootViewFile) && file_exists($this->rootViewFile)) {
            $fp = fopen($this->rootViewFile, 'a+');
            if ($fp) {
                $content = fread($fp, filesize($this->rootViewFile));
                fclose($fp);
                $this->source = $content;

            } else {
                $this->error = "file is not exist or is not readable";
            }
        }
    }


    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'source' => \Yii::t('skeeks/cms', 'Code'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['rootViewFile', 'string'],
            ['source', 'string'],
        ];
    }

    /**
     * @return bool
     */
    public function saveFile()
    {
        if (is_writable($this->rootViewFile) && file_exists($this->rootViewFile)) {
            $file = fopen($this->rootViewFile, 'w');
            fwrite($file, $this->source);
            fclose($file);

            return true;
        }

        return false;
    }

}
