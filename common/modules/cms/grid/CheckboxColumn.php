<?php
namespace common\modules\cms\grid;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Class CheckboxColumn
 * @package skeeks\cms\grid
 */
class CheckboxColumn extends \yii\grid\CheckboxColumn
{
    protected function renderHeaderCellContent()
    {
        $this->checkboxOptions = ArrayHelper::merge(['class' => 'sx-grid-checkbox'], $this->checkboxOptions);

        $id = $this->grid->options['id'];
        $jsOptions = [
            'gridId' => $id,
        ];

        $jsOptionsString = Json::encode($jsOptions);

        $this->grid->getView()->registerJs(<<<JS
        (function(sx, $, _)
        {
            sx.classes.Checkbox = sx.classes.Component.extend({

                _onDomReady: function()
                {

                    $('.select-on-check-all').on('click', function()
                    {
                        _.delay(function()
                        {
                            $('.sx-grid-checkbox').each(function()
                            {
                                if ( $(this).is(":checked") )
                                {
                                    $(this).closest("tr").addClass("sx-active");
                                } else
                                {
                                    $(this).closest("tr").removeClass("sx-active");
                                }

                            });

                        }, 100);

                    });

                    $("body").on('click', '.sx-grid-checkbox', function()
                    {
                        if ( $(this).is(":checked") )
                        {
                            $(this).closest("tr").addClass("sx-active");
                        } else
                        {
                            $(this).closest("tr").removeClass("sx-active");
                        }
                    });
                }
            });

            new sx.classes.Checkbox({$jsOptionsString});
        })(sx, sx.$, sx._);
JS
        );

        return parent::renderHeaderCellContent();
    }
}