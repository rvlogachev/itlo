<?php
namespace common\components\boomerang;
use common\assets\BoomerangThemeAsset;
use common\modules\cms\base\Component;

use common\modules\cms\components\Cms;
use \Yii;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * @var string $bodyCssClasses
 *
 * Class TemplateBoomerang
 * @package common\components\unify
 */
class TemplateBoomerang extends Component
{
    /**
     * @return array
     */
    static public function themes()
    {
        return [
            'blue'      => 'Синяя',

            'violet'    => 'Пурпурная',
            'orange'    => 'Оранжевая',
            'red'       => 'Красная',
            'green'     => 'Зеленая',
            'yellow'     => 'Желтая',
        ];
    }


    /**
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name'          => 'Настройки шаблона Boomerang',
        ]);
    }

    /**
     * @var string Цветовая схема
     */
    public $themeColor              = "blue";

    /**
     * @var string Изображение для фона
     */
    public $boxedBgImage                    = "/img/pattern-3.png";
    public $boxedBgCss                      = "repeat";

    /**
     * @var string
     */
    public $boxedLayout             = Cms::BOOL_Y;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['themeColor'], 'string'],
            [['boxedBgImage'], 'string'],
            [['boxedLayout'], 'string'],
            [['boxedBgCss'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'themeColor'            => 'Цветовая схема',
            'boxedBgImage'          => 'Фоновое изображение',
            'boxedLayout'           => 'Фиксированный шаблон',
            'boxedBgCss'            => 'Css стиль для фона',
        ]);
    }


    public function renderConfigForm(ActiveForm $form)
    {
        echo $form->fieldSet(\Yii::t('app', 'Main'));

            echo $form->fieldSelect($this, 'themeColor', static::themes(), [
                'allowDeselect' => true
            ]);

            echo $form->fieldRadioListBoolean($this, 'boxedLayout');

            echo $form->field($this, 'boxedBgImage')->widget(
                \common\modules\cms\modules\admin\widgets\formInputs\OneImage::className()
            );
            echo $form->field($this, 'boxedBgCss')->textInput()->hint('repeat or fixed center center');

        echo $form->fieldSetEnd();
    }

    /**
     * @return $this
     */
    public function initTheme()
    {
        if ($this->themeColor)
        {
            if (in_array($this->themeColor, array_keys(self::themes())))
            {
                \Yii::$app->view->registerCssFile(BoomerangThemeAsset::getAssetUrl('css/global-style-' . $this->themeColor . '.css'), [
                    'depends' =>
                    [
                        'common\assets\BoomerangThemeAsset'
                    ]
                ]);
            }
        }

        if ($this->boxedBgImage)
        {
            \Yii::$app->view->registerCss(<<<CSS
            body
            {
                background: url('{$this->boxedBgImage}') {$this->boxedBgCss};
            }
CSS
);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getBodyCssClasses()
    {
        if ($this->boxedLayout == Cms::BOOL_Y)
        {
            return 'body-boxed';
        }

        return '';
    }
}