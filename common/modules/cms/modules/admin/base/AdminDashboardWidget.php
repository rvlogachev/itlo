<?php
namespace common\modules\cms\modules\admin\base;

use common\modules\cms\base\ConfigFormInterface;
use common\modules\cms\traits\HasComponentDescriptorTrait;
use common\modules\cms\traits\TWidget;
use yii\base\Model;
use yii\base\ViewContextInterface;
use yii\widgets\ActiveForm;

/**
 * Class AdminDashboardWidget
 * @package skeeks\cms\modules\admin\base
 */
class AdminDashboardWidget extends Model implements ViewContextInterface, ConfigFormInterface
{
    /**
     * @see \yii\base\Widget
     */
    use TWidget;

    //Можно задавать описание компонента.
    use HasComponentDescriptorTrait;

    /**
     *
     * Стоит форму для себя
     *
     * @param ActiveForm|null $form
     */
    public function renderConfigForm(ActiveForm $form)
    {
    }

    /**
     * @var null Файл в котором будет реднериться виджет
     */
    public $viewFile = "default";

    public function run()
    {
        if ($this->viewFile) {
            echo $this->render($this->viewFile, [
                'widget' => $this
            ]);
        } else {
            return \Yii::t('skeeks/admin', "Template not found");
        }
    }
}