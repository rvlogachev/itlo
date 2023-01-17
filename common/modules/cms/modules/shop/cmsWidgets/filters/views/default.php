<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 13.10.2015
 */
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\shop\cmsWidgets\filters\ShopProductFiltersWidget */
?>

<?
$this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.classes.FiltersForm = sx.classes.Component.extend({

        _init: function()
        {},

        _onDomReady: function()
        {
            var self = this;
            this.JqueryForm = $("#sx-filters-form");

            $("input, checkbox, select", this.JqueryForm).on("change", function()
            {
                self.JqueryForm.submit();
            });
        },

        _onWindowReady: function()
        {}
    });

    new sx.classes.FiltersForm();
})(sx, sx.$, sx._);
JS
)
?>
<?php $form = \skeeks\cms\base\widgets\ActiveForm::begin([
    'options' =>
        [
            'id'        => 'sx-filters-form',
            'data-pjax' => '1',
        ],
    'method'  => 'get',
    'action'  => "/".\Yii::$app->request->getPathInfo(),
]); ?>

<?php if ($widget->searchModel) : ?>

    <?php if ($widget->typePrice) : ?>

        <?= $form->field($widget->searchModel, "type_price_id", [
            'options' =>
                [
                    'class' => 'hidden',
                ],
        ])->hiddenInput([
            'value' => $widget->typePrice->id,
        ])->label(false); ?>
        <div class="form-group">
            <label class="control-label">Цена</label>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($widget->searchModel, "price_from")->textInput([
                        'placeholder' => \Yii::$app->money->currencyCode,
                    ])->label("От"); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($widget->searchModel, "price_to")->textInput([
                        'placeholder' => \Yii::$app->money->currencyCode,
                    ])->label("До"); ?>
                </div>
            </div>
        </div>


    <?php endif; ?>

    <?php if (in_array('image', $widget->searchModelAttributes)) : ?>
        <?= $form->fieldSelect($widget->searchModel, "image", [
            ''  => \skeeks\cms\shop\Module::t('app', 'Does not matter'),
            'Y' => \skeeks\cms\shop\Module::t('app', 'With photo'),
            'N' => \skeeks\cms\shop\Module::t('app', 'Without photo'),
        ]); ?>
    <?php endif; ?>

    <?php if (in_array('hasQuantity', $widget->searchModelAttributes)) : ?>
        <?= $form->field($widget->searchModel, "hasQuantity")->checkbox()->label(\skeeks\cms\shop\Module::t('app',
            'Availability')); ?>
    <?php endif; ?>

<?php endif; ?>



<?php if ($widget->searchRelatedPropertiesModel) : ?>
    <?php if ($properties = $widget->searchRelatedPropertiesModel->properties) : ?>

        <?php foreach ($properties as $property) : ?>
            <?php if (in_array($property->code, $widget->realatedProperties)) : ?>

                <?php if (in_array($property->property_type, [
                    \skeeks\cms\relatedProperties\PropertyType::CODE_ELEMENT,
                    \skeeks\cms\relatedProperties\PropertyType::CODE_LIST,
                ])) : ?>

                    <?= $form->field($widget->searchRelatedPropertiesModel, $property->code)->checkboxList(
                        $widget->getRelatedPropertyOptions($property)
                        , ['class' => 'sx-filters-checkbox-options']); ?>

                <?php elseif ($property->property_type == \skeeks\cms\relatedProperties\PropertyType::CODE_NUMBER) : ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($widget->searchRelatedPropertiesModel,
                                    $widget->searchRelatedPropertiesModel->getAttributeNameRangeFrom($property->code))->textInput([
                                    'placeholder' => 'от',
                                ])->label(
                                    $property->name.""
                                ); ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($widget->searchRelatedPropertiesModel,
                                    $widget->searchRelatedPropertiesModel->getAttributeNameRangeTo($property->code))->textInput([
                                    'placeholder' => 'до',
                                ])->label("&nbsp;"); ?>
                            </div>
                        </div>
                    </div>

                <?php else : ?>

                    <?php $propertiesValues = \skeeks\cms\models\CmsContentElementProperty::find()->select(['value'])->where([
                        'property_id' => $property->id,
                        'element_id'  => $widget->elementIds,
                    ])->all(); ?>

                    <?php if ($propertiesValues) : ?>
                        <div class="row">
                            <div class="col-md-12">

                                <?= $form->field($widget->searchRelatedPropertiesModel, $property->code)->dropDownList(
                                    \yii\helpers\ArrayHelper::merge(['' => ''], \yii\helpers\ArrayHelper::map(
                                        $propertiesValues, 'value', 'value'
                                    ))); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endif; ?>


        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>



<?php if ($widget->searchOfferRelatedPropertiesModel) : ?>
    <?php if ($properties = $widget->searchOfferRelatedPropertiesModel->properties) : ?>

        <?php foreach ($properties as $property) : ?>
            <?php if (in_array($property->code, $widget->offerRelatedProperties)) : ?>

                <?php if (in_array($property->property_type, [
                    \skeeks\cms\relatedProperties\PropertyType::CODE_ELEMENT,
                    \skeeks\cms\relatedProperties\PropertyType::CODE_LIST,
                ])) : ?>

                    <?= $form->field($widget->searchOfferRelatedPropertiesModel, $property->code)
                        ->checkboxList(
                            $widget->getOfferRelatedPropertyOptions($property)
                            , ['class' => 'sx-filters-checkbox-options']); ?>

                <?php elseif ($property->property_type == \skeeks\cms\relatedProperties\PropertyType::CODE_NUMBER) : ?>
                    <?php /*= $form->field($widget->searchRelatedPropertiesModel, $property->code)->textInput(); */ ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($widget->searchOfferRelatedPropertiesModel,
                                    $widget->searchOfferRelatedPropertiesModel->getAttributeNameRangeFrom($property->code))->textInput([
                                    'placeholder' => 'от',
                                ])->label(
                                    $property->name.""
                                ); ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($widget->searchOfferRelatedPropertiesModel,
                                    $widget->searchOfferRelatedPropertiesModel->getAttributeNameRangeTo($property->code))->textInput([
                                    'placeholder' => 'до',
                                ])->label("&nbsp;"); ?>
                            </div>
                        </div>
                    </div>

                <?php else : ?>

                    <?php $propertiesValues = \skeeks\cms\models\CmsContentElementProperty::find()->select(['value'])->where([
                        'property_id' => $property->id,
                        'element_id'  => $widget->elementIds,
                    ])->all(); ?>

                    <?php if ($propertiesValues) : ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">

                                    <?= $form->field($widget->searchOfferRelatedPropertiesModel,
                                        $property->code)->dropDownList(
                                        \yii\helpers\ArrayHelper::merge(['' => ''], \yii\helpers\ArrayHelper::map(
                                            $propertiesValues, 'value', 'value'
                                        ))); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endif; ?>


        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>


<button class="btn btn-primary"><?= \skeeks\cms\shop\Module::t('app', 'Apply'); ?></button>

<?php \skeeks\cms\base\widgets\ActiveForm::end(); ?>
