<?php
namespace common\modules\cms\base\widgets;

use common\modules\cms\traits\ActiveFormAjaxSubmitTrait;

/**
*
<?php $form = \skeeks\cms\base\widgets\ActiveFormAjaxSubmit::begin([
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
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class ActiveFormAjaxSubmit extends ActiveForm
{
    use ActiveFormAjaxSubmitTrait;

    public $enableAjaxValidation = true;
    public $validateOnChange = false;
    public $validateOnBlur = false;
}
