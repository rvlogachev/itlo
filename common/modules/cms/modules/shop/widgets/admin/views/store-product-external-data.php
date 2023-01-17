<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\shop\widgets\admin\StoreProductExternalDataWidget
 */


$data = $widget->storeProduct->external_data;
$supplierProperties = $widget->storeProduct->shopStore->getShopStoreProperties()
    ->andWhere(['is_visible' => 1])->andWhere(['in', 'external_code', array_keys($data)])
    ->all();

$this->registerCss(<<<CSS

.sx-fast-edit {
    opacity: 0;
    transition: 1s;
    cursor: pointer;
}
.sx-supplier-properies-hidden {
display: none;
}

.sx-supproduct-external-widget {
    font-size: 10px;
}

.sx-propery-row:hover {
    background: #e6ecec;
}
.sx-propery-row-inner {
    margin: auto 0;
    width: 100%;
}
.sx-propery-row {
    /*margin: 7px 0px;*/
    min-height: 22px;
    padding-bottom: 2px;
    padding-top: 2px;
    line-height: 1.1;
}

.sx-green {
    background: #d9fbd9;
}
.sx-red {
    background: #ffe9e9;
}

.sx-propery-row:hover .sx-fast-edit {
    opacity: 1;
}

CSS
);

$this->registerJs(<<<JS
$("body").on("click", ".sx-more", function() {
    if ($(".sx-supplier-properies-hidden").is(":visible")) {
        $(this).empty().append("Показать еще");
        $(".sx-supplier-properies-hidden").slideUp();
    } else {
        $(".sx-supplier-properies-hidden").slideDown();
        $(this).empty().append("Скрыть");
    }
    
    return false;
});

$(".sx-copy").on("click", function() {
    var input =  document.getElementById("cont");
    var input =  $(this).find("input");
      // Select the input node's contents
    input.select();
    // Copy it to the clipboard
    _.delay(function() {
        try {
            // Теперь, когда мы выбрали текст ссылки, выполним команду копирования
            var successful = document.execCommand("copy");
            var msg = successful ? 'successful' : 'unsuccessful';  
            sx.notify.success("Скопировано");
        } catch(err) { 
            throw err;
            sx.notify.error('Oops, unable to copy');  
        }  
    }, 300);
});
JS
);

/**
 * @var \skeeks\cms\shop\models\ShopStoreProperty[] $supplierProperties
 */

?>



<?= \yii\helpers\Html::beginTag('div', $widget->options); ?>

    <div itemscope="" itemtype="http://schema.org/Product">
        <!--<meta itemprop="name" content="<?php /*= $widget->shopProduct->cmsContentElement->name; */ ?>">-->

        <?php if ($supplierProperties) : ?>
            <div class="sx-supplier-properies-visible">
                <?php foreach ($supplierProperties as $supplierProperty) : ?>
                    <?
                    $formCode = "";
                    if ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_EAV || $supplierProperty->cmsContentProperty) {
                        if ($supplierProperty->cmsContentProperty) {
                            $formCode = strtolower("field-relatedpropertiesmodel-".$supplierProperty->cmsContentProperty->code);
                        }
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_TREE) {
                        $formCode = "field-shopcmscontentelement-tree_id";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_BARCODE) {
                        $formCode = "field-shopproduct-barcodes";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_IMAGE) {
                        $formCode = "field-shopcmscontentelement-image_id";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_SECOND_IMAGE) {
                        $formCode = "field-shopcmscontentelement-imageids";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_WEIGHT) {
                        $formCode = "field-shopproduct-weight";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_LENGTH) {
                        $formCode = "field-shopproduct-length";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_HEIGHT) {
                        $formCode = "field-shopproduct-height";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_WIDTH) {
                        $formCode = "field-shopproduct-width";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_MEASURE_CODE) {
                        $formCode = "field-shopproduct-measure_code";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_MEASURE_RATIO_MIN) {
                        $formCode = "field-shopproduct-measure_ratio_min";
                    } elseif ($supplierProperty->property_nature == \skeeks\cms\shop\models\ShopStoreProperty::PROPERTY_NATURE_MEASURE_RATIO) {
                        $formCode = "field-shopproduct-measure_ratio";
                    }

                    $row = \yii\helpers\ArrayHelper::getValue($data, $supplierProperty->external_code);
                    \yii\helpers\ArrayHelper::remove($data, $supplierProperty->external_code);

                    $isReady = false;
                    if ($supplierProperty->property_nature) {
                        $isReady = true;
                    }

                    $shopSupplierPropertyOption = null;
                    $isRed = false;
                    $isGreen = false;
                    $cssClasses = [];
                    if (is_string($row)) {

                        if ($supplierProperty->cmsContentProperty) {
                            if ($supplierProperty->import_delimetr) {
                                $value = explode($supplierProperty->import_delimetr, $row);
                                foreach ($value as $k => $v) {
                                    $value[$k] = trim($v);
                                }

                                /**
                                 * @var $shopSupplierPropertyOption \skeeks\cms\shop\models\ShopStorePropertyOption
                                 */
                                $shopSupplierPropertyOptions = $supplierProperty->getShopStorePropertyOptions()->andWhere(['name' => $value])->all();
                                if ($shopSupplierPropertyOptions) {
                                    foreach ($shopSupplierPropertyOptions as $shopSupplierPropertyOption) {
                                        if ($shopSupplierPropertyOption->cmsContentElement || $shopSupplierPropertyOption->cmsContentPropertyEnum) {
                                            $isGreen = true;
                                        } else {
                                            $isRed = true;
                                        }
                                    }

                                }

                            } else {
                                /**
                                 * @var $shopSupplierPropertyOption \skeeks\cms\shop\models\ShopStorePropertyOption
                                 */
                                $shopSupplierPropertyOption = $supplierProperty->getShopStorePropertyOptions()->andWhere(['name' => $row])->one();
                                if ($shopSupplierPropertyOption) {
                                    if ($shopSupplierPropertyOption->cmsContentElement || $shopSupplierPropertyOption->cmsContentPropertyEnum) {
                                        $isGreen = true;
                                    } else {
                                        $isRed = true;
                                    }
                                }
                            }


                            if ($supplierProperty->cmsContentProperty->property_type == \skeeks\cms\relatedProperties\PropertyType::CODE_STRING) {
                                $isGreen = true;
                            }

                            if ($supplierProperty->cmsContentProperty->property_type == \skeeks\cms\relatedProperties\PropertyType::CODE_NUMBER) {
                                $isGreen = true;
                            }
                        } elseif ($supplierProperty->property_nature) {
                            $isGreen = true;
                        }
                    }

                    if ($isGreen) {
                        $cssClasses[] = "sx-green";
                    }
                    if ($isRed) {
                        $cssClasses[] = "sx-red";
                    }

                    ?>


                    <?php if ($row) : ?>
                        <div class="sx-propery-row d-flex <?php echo implode(" ", $cssClasses); ?>" data-form-code="<?php echo $formCode; ?>">
                            <div class="sx-propery-row-inner">



                            <span>

                            <?php if ($isReady) : ?>
                                <i class="fas fa-link" data-toggle="tooltip" title="" data-original-title="Эта характеристика связана с характеристикой сайта"></i>
                            <?php endif; ?>

                                <?php if ($supplierProperty->name) : ?>
                                    <?= $supplierProperty->name; ?>
                                <?php else : ?>
                                    <?= $supplierProperty->external_code; ?>
                                <?php endif; ?>
                                :
                            </span>
                                <?php if (is_string($row)) : ?>
                                    <?php if (filter_var($row, FILTER_VALIDATE_URL)) : ?>
                                        <b><a href="<?= $row; ?>" target="_blank"><?= $row; ?></a></b>
                                    <?php else : ?>
                                        <b><?= $row; ?></b>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <pre><?= print_r($row, true); ?></pre>
                                <?php endif; ?>

                                <span style="float: right;" title="Правильное название в нашей системе">
                                <?php if (is_string($row)) : ?>
                                    <?php if ($supplierProperty->cmsContentProperty) : ?>
                                        <?php if ($shopSupplierPropertyOption && $shopSupplierPropertyOption->cmsContentElement) : ?>
                                            <?= $shopSupplierPropertyOption->cmsContentElement->name; ?>
                                            <a href="#" class="btn btn-xs sx-copy btn-default" data-toggle="tooltip" title="" data-original-title="Скопировать">
                                                <i class="fas fa-copy" style="cursor: pointer; color: gray;"></i>
                                                <input id="cont" type="text" value="<?= $shopSupplierPropertyOption->cmsContentElement->name; ?>" style="position: absolute; left: -20000px;">
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($shopSupplierPropertyOption && $shopSupplierPropertyOption->cmsContentPropertyEnum) : ?>
                                            <?= $shopSupplierPropertyOption->cmsContentPropertyEnum->value; ?>
                                            <a href="#" class="btn btn-xs sx-copy btn-default" data-toggle="tooltip" title="" data-original-title="Скопировать">
                                                <i class="fas fa-copy" style="cursor: pointer; color: gray;"></i>
                                                <input id="cont" type="text" value="<?= $shopSupplierPropertyOption->cmsContentPropertyEnum->value; ?>" style="position: absolute; left: -20000px;">
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </span>


                                <?
                                \skeeks\cms\backend\widgets\AjaxControllerActionsWidget::begin([
                                    'controllerId' => "/shop/store-property/",
                                    'modelId'      => $supplierProperty->id,
                                    'tag'          => 'span',
                                    'options' => [
                                        'class' => 'sx-fast-edit'
                                    ]
                                ]);
                                ?>
                                <i class="fas fa-pencil-alt" data-toggle="tooltip" style="color: gray;" title="" data-original-title=""></i>
                                <?php \skeeks\cms\backend\widgets\AjaxControllerActionsWidget::end(); ?>

                            </div>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($data) : ?>
            <div class="">
                <button class="btn btn-secondary btn-sm sx-more">Показать еще</button>
            </div>
            <div class="sx-supplier-properies-hidden">
                <?php foreach ($data as $key => $row) : ?>
                    <?php if ($row) : ?>
                        <div class="sx-propery-row"><span><?= $key; ?>:</span>
                            <?php if (is_string($row)) : ?>
                                <?php if (filter_var($row, FILTER_VALIDATE_URL)) : ?>
                                    <b><a href="<?= $row; ?>" target="_blank"><?= $row; ?></a></b>
                                <?php else : ?>
                                    <b><?= $row; ?></b>
                                <?php endif; ?>

                            <?php else : ?>
                                <pre><?= print_r($row, true); ?></pre>
                            <?php endif; ?>

                            <?php
                            $supplierProperty = $widget->storeProduct->shopStore->getShopStoreProperties()
                                ->andWhere(['in', 'external_code', trim($key)])
                                ->one();
                            ?>
                            <?php if ($supplierProperty) : ?>

                                <?
                                \skeeks\cms\backend\widgets\AjaxControllerActionsWidget::begin([
                                    'controllerId' => "/shop/store-property/",
                                    'modelId'      => $supplierProperty->id,
                                    'tag'          => 'span',
                                    'options' => [
                                        'class' => 'sx-fast-edit'
                                    ]
                                ]);
                                ?>
                                <i class="fas fa-pencil-alt" data-toggle="tooltip" style="color: gray;" title="" data-original-title=""></i>
                                <?php \skeeks\cms\backend\widgets\AjaxControllerActionsWidget::end(); ?>

                            <?php endif; ?>


                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
<?= \yii\helpers\Html::endTag('div'); ?>