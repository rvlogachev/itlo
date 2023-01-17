<?php
namespace common\modules\cms\widgets\formInputs\selectTree;

use common\modules\cms\helpers\UrlHelper;
use common\modules\cms\models\CmsTree;
use common\modules\cms\models\Tree;
use common\modules\admin\Module;
use common\modules\cms\modules\admin\widgets\ActiveForm;
use common\modules\cms\widgets\formInputs\selectTree\assets\SelectTreeInputWidgetAsset;
use common\modules\cms\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use Yii;

/**
 *
 *
 *  <?= $form->field($model, 'treeIds')->widget(
 * \common\modules\cms\widgets\formInputs\selectTree\SelectTreeInputWidget::class,
 * [
 * 'multiple' => true
 * ]
 * ); ?>
 *
 *
 * @property CmsTree[] $sections
 *
 * Class SelectTreeInputWidget
 *
 * @package skeeks\cms\widgets\formInputs\selectTree
 */
class SelectTreeInputWidget extends InputWidget
{
    public static $autoIdPrefix = 'SelectTreeInputWidget';

    /**
     * @var array
     */
    public $clientOptions = [];
    /**
     * @var array
     */
    public $wrapperOptions = [];

    /**
     * @see common\modules\cms\widgets\tree\CmsTreeWidget options
     *
     * @var array
     */
    public $treeWidgetOptions = [];
    public $treeWidgetClass = 'common\modules\cms\widgets\tree\CmsTreeWidget';

    /**
     * @var bool
     */
    public $multiple = false;

    /**
     * @var null|callable
     */
    public $isAllowNodeSelectCallback = null;

    public function init()
    {
        $this->treeWidgetOptions = ArrayHelper::merge([
            "models" => [],
            "sessionName" => 'select-' . (int)$this->multiple,
            "viewNodeContentFile" => '@common/modules/cms/widgets/formInputs/selectTree/views/_tree-node',

            'pjaxOptions' =>
                [
                    'enablePushState' => false,
                ],

            'contextData' => [
                'selectTreeInputWidget' => $this
            ]
        ], $this->treeWidgetOptions);

        $this->wrapperOptions['id'] = $this->id . "-wrapper";

        $this->clientOptions['id'] = $this->id;
        $this->clientOptions['wrapperid'] = $this->wrapperOptions['id'];

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $value = $this->model->{$this->attribute};
        $items = $value;
        if ($value && is_string($value) || is_int($value)) {
            $items = [$value => $value];
        } else if (is_array($value)) {
            $newValue = [];
            foreach ($value as $k => $v) {
                if ($v instanceof CmsTree) {
                    $newValue[$v->id] = $v->id;
                } else {
                    $newValue[$v] = $v;
                }
            }
            $items = $newValue;
        }

        if (!$items) {
            $items = [];
        }

        if (is_array($items)) {
            $tmpItems = [];
            foreach ($items as $key => $item) {
                if ($item instanceof CmsTree) {
                    $tmpItems[$item->id] = $item->id;
                }
            }

            if ($tmpItems) {
                $items = $tmpItems;
            }

        }

        $this->options['multiple'] = $this->multiple;
        Html::addCssClass($this->options, 'sx-widget-element');

        $select = Html::activeListBox($this->model, $this->attribute, $items, $this->options);

        $this->clientOptions['value'] = $value;
        $this->clientOptions['multiple'] = (int)$this->multiple;
        $this->registerAssets();

        return $this->render('select-tree-widget', [
            'elementForm' => $select
        ]);
    }

    /**
     * @return $this
     */
    public function registerAssets()
    {
        SelectTreeInputWidgetAsset::register($this->view);
        return $this;
    }

    /**
     * @param $model
     *
     * @return string
     */
    public function getNodeName($tree)
    {
        if ($models = ArrayHelper::getValue($this->treeWidgetOptions, 'models')) {
            $model = $models[0];
            $rootLevel = $model->level;

            /**
             * @var \common\modules\cms\models\CmsTree $tree
             */
            $name = $tree->name;
            if ($tree->parents) {
                $parents = $tree->getParents()->andWhere(['>=', 'level', $rootLevel])->all();
                if ($parents) {
                    $name = implode(" / ", \yii\helpers\ArrayHelper::map($parents, 'id', 'name'));
                    $name .= " / " . $tree->name;
                }
            }

            return $name;
        } else {
            $rootLevel = 0;

            /**
             * @var \common\modules\cms\models\CmsTree $tree
             */
            $name = $tree->name;
            if ($tree->parents) {
                $parents = $tree->getParents()->andWhere(['>=', 'level', $rootLevel])->all();
                if ($parents) {
                    $name = implode(" / ", \yii\helpers\ArrayHelper::map($parents, 'id', 'name'));
                    $name .= " / " . $tree->name;
                }
            }

            return $name;
        }

        return $tree->name;
    }

    /**
     * @param $model
     *
     * @return string
     */
    public function renderNodeControll($model)
    {
        $disabled = false;
        if ($this->isAllowNodeSelectCallback && is_callable($this->isAllowNodeSelectCallback)) {
            $function = $this->isAllowNodeSelectCallback;
            if (!$function($model)) {
                $disabled = "disabled";
            }
        }

        if ($this->multiple) {
            $controllElement = Html::checkbox($this->id . '-checkbox', false, [
                'value' => $model->id,
                'class' => 'sx-checkbox',
                'disabled' => $disabled,
                'style' => 'float: left; margin-left: 5px; margin-right: 5px;',
            ]);
        } else {
            $controllElement = Html::radio($this->id . '-radio', false, [
                'value' => $model->id,
                'class' => 'sx-radio',
                'disabled' => $disabled,
                'style' => 'float: left; margin-left: 5px; margin-right: 5px;',
            ]);
        }

        return $controllElement;
    }

    /**
     * @param $model
     *
     * @return string
     */
    public function renderNodeName($model)
    {
        $result = $model->name;
        $additionalName = '';
        if ($model->level == 0) {
            $site = \common\modules\cms\models\CmsSite::findOne(['id' => $model->cms_site_id]);
            if ($site) {
                $additionalName = $site->name;
            }
        }

        if ($additionalName) {
            $result .= " [{$additionalName}]";
        }

        return $result;
    }

    /**
     * @return CmsTree[]
     */
    public function getSections()
    {
        $value = $this->model->{$this->attribute};
        if (!$value) {
            return [];
        }

        $items = $value;
        if (is_string($value) || is_int($value)) {
            $items = [$value => $value];
        }

        if (is_array($items)) {
            $tmpItems = [];
            foreach ($items as $key => $item) {
                if ($item instanceof CmsTree) {
                    $tmpItems[$item->id] = $item->id;
                }
            }

            if ($tmpItems) {
                $items = $tmpItems;
            }

        }

        return CmsTree::findAll(["id" => $items]);
    }
}
