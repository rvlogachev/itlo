<?php
namespace common\modules\cms\modules\queryfilters\filters;

use common\modules\cms\modules\queryfilters\filters\modes\FilterMode;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeEmpty;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeEq;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeEqually;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeGt;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeGte;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeLike;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeLt;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeLte;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeNe;
use common\modules\cms\modules\queryfilters\filters\modes\FilterModeNotEmpty;
use common\modules\cms\modules\queryfilters\QueryFiltersEvent;
use common\modules\cms\modules\form\Field;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * @property $filterAttribute;
 * @property $fullFilterAttribute;
 *
 */
class FilterField extends Field
{
    static public $_isRegisteredAssets = false;
    /**
     * Отрисовка кастомного элемента вместо стандартного инпута
     *
     * @var Field
     */
    public $field;

    /**
     * @var bool
     */
    public $isAllowChangeMode = true;
    
    /**
     * По умолчанию выбранный мод фильтрации
     *
     * @var string
     */
    public $defaultMode = FilterModeLike::ID;
    /**
     * Доступные моды фильтрации
     *
     * @var array|FilterMode[]
     */
    public $modes = [];

    public function getBaseModes()
    {
        return [
            FilterModeEmpty::class,
            FilterModeNotEmpty::class,

            /*FilterModeEq::class,
            FilterModeNe::class,
            FilterModeGt::class,
            FilterModeLt::class,
            FilterModeGte::class,
            FilterModeLte::class,
            FilterModeLike::class,*/
        ];
    }
    /**
     * Атрибут в базе данных по которому фильтровать
     *
     * @var
     */
    protected $_filterAttribute;
    
    public function init()
    {
        parent::init();

        if (!$this->modes) {
            $this->modes = $this->getBaseModes();
        }
        
        $modes = [];

        if ($this->modes) {
            foreach ($this->modes as $mode) {
                $tmpMode = \Yii::createObject($mode);
                $modes[$tmpMode->id] = $tmpMode;
            }

            $this->modes = $modes;
        }

        $this->on('apply', [$this, '_applyEvent']);
    }
    public function _applyEvent(QueryFiltersEvent $queryFiltersEvent)
    {
        $value = $queryFiltersEvent->field->value;

        if (!$value) {
            return;
        }

        $mode = ArrayHelper::getValue($value, 'mode');
        $value = ArrayHelper::getValue($value, 'value');

        /**
         * @var $filterMode FilterMode
         */
        $filterMode = ArrayHelper::getValue($this->modes, $mode);

        if (!$filterMode || !$mode) {
            return;
        }

        if ($filterMode->isValue) {
            $filterMode->value = $value[0];
        }
        if ($filterMode->isValue2) {
            $filterMode->value2 = $value[1];
        }

        $fullFilterAttribute = $this->filterAttribute;
        
        $query = $queryFiltersEvent->query;
        if (!strpos($this->filterAttribute, ".") && $query->modelClass && !$query->from) {
            $modelClass = $query->modelClass;
            $tableName = $modelClass::tableName();
            $fullFilterAttribute = "{$tableName}.{$fullFilterAttribute}";
            
        }
        /*if ($queryFiltersEvent->widget && $queryFiltersEvent->widget->asModelTable && !strpos(".", $fullFilterAttribute)) {
            $fullFilterAttribute = $queryFiltersEvent->widget->asModelTable . "." . $fullFilterAttribute;
        }*/
        /*
        $modelClassName = $queryFiltersEvent->widget->modelClassName;
        $tableName = $modelClassName::tableName();
        $fullFilterAttribute = $tableName . "." . $this->filterAttribute;*/

        $filterMode->attributeName = $fullFilterAttribute;

        $filterMode->applyQuery($queryFiltersEvent->query);
    }
    /**
     * @return \yii\widgets\ActiveField
     */
    public function getActiveField()
    {
        if (!$this->_activeForm || !$this->_model || !$this->_attribute) {
            throw new InvalidConfigException('Not found form or model or attribute');
        }

        if ($this->field) {

            $this->field['attribute'] = $this->_attribute."[value][0]";
            $this->field['model'] = $this->_model;
            $this->field['activeForm'] = $this->_activeForm;

            $this->field = \Yii::createObject($this->field);

            /**
             * @var $field Field
             */
            $field = $this->field;
            $activeField = $field->activeField;

            if ($this->label !== null || $this->labelOptions) {
                $activeField->label($this->label, $this->labelOptions);
            }

            if ($this->hint !== null || $this->labelOptions) {
                $activeField->hint($this->hint, $this->hintOptions);
            }


        } else {
            $activeField = $this->_activeForm->field($this->_model, $this->_attribute."[value][0]", $this->_options);

            if ($this->label !== null || $this->labelOptions) {
                $activeField->label($this->label, $this->labelOptions);
            }

            if ($this->hint !== null || $this->labelOptions) {
                $activeField->hint($this->hint, $this->hintOptions);
            }

            $activeField->textInput();
        }


        $input2 = (string)Html::activeTextInput($this->model, $this->attribute."[value][1]", [
            'class' => 'form-control',
        ]);


        $modes = [
            'none' => ' -- ',
        ];
        $modesOptions = [];
        if ($this->modes) {

            foreach ($this->modes as $key => $mode) {
                if (!$mode instanceof FilterMode) {
                    //var_dump($mode);die;
                }
                $modes[$key] = $mode->name;
                $modesOptions[$key] = [
                    'data-isValue'  => (int)$mode->isValue,
                    'data-isValue2' => (int)$mode->isValue2,
                ];
            }
        }

        $opts = [
            'options' => $modesOptions,
            'size'    => 1,
            'class'   => 'form-control sx-filter-mode',
        ];

        if (!$mode = ArrayHelper::getValue($this->model->{$this->attribute}, 'mode')) {
            $opts['value'] = $this->defaultMode;
        }
        
        
        $mode = (string)Html::activeListBox($this->model, $this->attribute."[mode]", $modes, $opts);

        $style = '';
        
        if (!$this->isAllowChangeMode) {
            $style = "style='display:none;'";
        }

        $activeField->parts['{input}'] = "
            <div class='row' id='{$this->id}'>           
                <div class='col-md-4' {$style}>{$mode}</div>            
                <div class='col-md-4 sx-input-wrapper'>".$activeField->parts['{input}']."</div>         
                <div class='col-md-4 sx-input-wrapper-2'>{$input2}</div>           
            </div>
        ";

        $jsOptions = Json::encode([
            'id' => $this->id,
            'isAllowChangeMode' => $this->isAllowChangeMode,
        ]);

        $this->registerAssets();
        \Yii::$app->view->registerJs(<<<JS
new sx.classes.filters.FilterField({$jsOptions});
JS
        );

        return $activeField;
    }
    public function registerAssets()
    {
        if (!static::$_isRegisteredAssets) {
            static::$_isRegisteredAssets = true;

            \Yii::$app->view->registerJs(<<<JS
(function(sx, $, _)
{
    sx.createNamespace('classes.filters', sx);
    sx.classes.filters.FilterField = sx.classes.Component.extend({
    
        _onDomReady: function()
        {
            var self = this;
            
            this.jFilterWrapper = $("#" + this.get('id'));
            this.jFilterMode = $('.sx-filter-mode', this.jFilterWrapper);
            this.jFilterInput = $('.sx-input-wrapper', this.jFilterWrapper);
            this.jFilterInput2 = $('.sx-input-wrapper-2', this.jFilterWrapper);
            
            this.update();
            
            this.jFilterMode.on('change', function () {
                self.update();
                return false;
            });
        },
        
        update: function()
        {
            var big = 'col-md-8';
            var small = 'col-md-4';
            
            if (!this.get('isAllowChangeMode')) {
                var big = 'col-md-12'
                var small = 'col-md-6'
            }
            
            this.jFilterInput.removeClass('col-md-4').removeClass('col-md-6').removeClass('col-md-12').addClass(small);
            
            this.jFilterInput.hide();
            this.jFilterInput2.hide();
            
            var mode = this.jFilterMode.val();
            
            if (mode) {
                var jModeOption = $("option[value=" + mode + "]", this.jFilterMode);
                
                if (jModeOption.data('isvalue')) {
                    this.jFilterInput.show();
                }
                
                if (jModeOption.data('isvalue2')) {
                    this.jFilterInput2.show();
                }
                
                if (jModeOption.data('isvalue') && !jModeOption.data('isvalue2')) {
                    this.jFilterInput.removeClass('col-md-4').removeClass('col-md-6').removeClass('col-md-12').addClass(big);
                }
            }
            
            
        }
    });
})(sx, sx.$, sx._);
JS
            );
        }

        return $this;
    }
    public function getFilterAttribute()
    {
        if ($this->_filterAttribute === null) {
            $this->_filterAttribute = $this->_attribute;
        }

        return $this->_filterAttribute;
    }
    /**
     * @param $filterAttribute
     * @return $this
     */
    public function setFilterAttribute($filterAttribute)
    {
        $this->_filterAttribute = $filterAttribute;
        return $this;
    }
}