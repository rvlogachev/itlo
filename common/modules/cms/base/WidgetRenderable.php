<?php
/**
 */

namespace common\modules\cms\base;

use yii\helpers\ArrayHelper;

/**
 * Class WidgetRenderable
 * @package common\modules\cms\base
 */
class WidgetRenderable extends Widget
{
    /**
     * @var null Файл в котором будет реднериться виджет
     */
    public $viewFile = "default";

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'viewFile' => \Yii::t('skeeks/cms', 'File-template'),
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['viewFile'], 'string'],
        ]);
    }

    public function run()
    {
        if ($this->viewFile) {
            return $this->render($this->viewFile, [
                'widget' => $this,
            ]);
        } else {
            return \Yii::t('skeeks/cms', "Template not found");
        }
    }
}