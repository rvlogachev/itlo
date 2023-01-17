<?php
/**
 */

namespace common\modules\cms\relatedProperties\userPropertyTypes;

use common\modules\cms\components\Cms;
use common\modules\cms\models\CmsContentElement;
use common\modules\cms\relatedProperties\models\RelatedPropertiesModel;
use common\modules\cms\relatedProperties\PropertyType;
use yii\helpers\ArrayHelper;

/**
 * Class UserPropertyTypeSelectFile
 * @package skeeks\cms\relatedProperties\userPropertyTypes
 */
class UserPropertyTypeSelectFile extends PropertyType
{
    public $code = self::CODE_STRING;
    public $name = "";

    public function init()
    {
        parent::init();

        if (!$this->name) {
            $this->name = \Yii::t('skeeks/cms', 'Standard file selection');
        }
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
            [
                'type' => \Yii::t('skeeks/cms', 'Type'),
            ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
            [
            ]);
    }

    /**
     * @return \yii\widgets\ActiveField
     */
    public function renderForActiveForm()
    {
        $field = parent::renderForActiveForm();

        $field->widget(\common\modules\cms\modules\admin\widgets\formInputs\OneImage::className(),
            [
                'filesModel' => $this->property->relatedPropertiesModel->relatedElementModel
            ]);

        return $field;
    }


    /**
     * Файл с формой настроек, по умолчанию лежит в той же папке где и компонент.
     *
     * @return string
     */
    public function getConfigFormFile()
    {
        $class = new \ReflectionClass($this->className());
        return dirname($class->getFileName()) . DIRECTORY_SEPARATOR . 'views/_formUserPropertyTypeDate.php';
    }

    /**
     * @varsion > 3.0.2
     *
     * @return $this
     */
    public function addRules()
    {
        $this->property->relatedPropertiesModel->addRule($this->property->code, 'string');

        return $this;
    }
}