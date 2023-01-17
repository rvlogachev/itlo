<?php
namespace common\modules\cms\traits;

use common\modules\cms\assets\ActiveFormAjaxSubmitAsset;

/**
 *
 * <?php $form = \common\modules\cms\base\widgets\ActiveFormAjaxSubmit::begin([
    'clientCallback' => new \yii\web\JsExpression(<<<JS
    function (ActiveFormAjaxSubmit) {
        ActiveFormAjaxSubmit.on('success', function(e, response) {
            $("#sx-result").empty();

            if (response.data.html) {
                $("#sx-result").append(response.data.html);
            }
        });
    }
JS
)
]); ?>
 *
 * Trait ActiveFormAjaxSubmitTrait
 * @package skeeks\cms\traits
 */
trait ActiveFormAjaxSubmitTrait
{
    /**
     * @var null
     */
    public $clientCallback = null;

    /**
     * @deprecated
     * @var string
     */
    public $afterValidateCallback = "";

    public function registerJs()
    {
        ActiveFormAjaxSubmitAsset::register($this->view);

        $this->view->registerJs(<<<JS
sx.ActiveForm = new sx.classes.activeForm.AjaxSubmit('{$this->id}');
JS
    );
        $afterValidateCallback = $this->afterValidateCallback;
        $clientCallback = $this->clientCallback;

        if ($clientCallback) {
            $this->view->registerJs(<<<JS
            var callback = $clientCallback;
            callback(sx.ActiveForm);
JS
    );
        }
        elseif ($afterValidateCallback) {
            $this->view->registerJs(<<<JS
            sx.ActiveForm.on('afterValidate', function(e, data) {
                var callback = $afterValidateCallback;
                var ActiveForm = data.activeFormAjaxSubmit;
                callback(ActiveForm.jForm, ActiveForm.AjaxQuery);
            });
JS
    );
        }
    }

    public function run()
    {
        $this->registerJs();
        return parent::run();
    }
}