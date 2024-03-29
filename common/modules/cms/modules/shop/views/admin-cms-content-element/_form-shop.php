<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @var $shopProduct \skeeks\cms\shop\models\ShopProduct */
/* @var $this yii\web\View */
/* @var $controller \skeeks\cms\shop\controllers\AdminCmsContentElementController */
/* @var $action \skeeks\cms\backend\actions\BackendModelCreateAction|\skeeks\cms\backend\actions\IHasActiveForm */
/* @var $model \skeeks\cms\shop\models\ShopCmsContentElement */
/* @var $shopStoreProducts \skeeks\cms\shop\models\ShopStoreProduct[] */
/* @var $relatedModel \skeeks\cms\relatedProperties\models\RelatedPropertiesModel */
/* @var $shopContent \skeeks\cms\shop\models\ShopContent */
/* @var $shopStoreProduct \skeeks\cms\shop\models\ShopStoreProduct */

//Родительский общий товар, указан если создается предложение к товару
$parent_content_element_id = null;
//Товар поставщика, из которого создается главный товар
$shopStoreProduct = @$shopStoreProduct;

//Разрешено ли менять тип товара?
$allowChangeProductType = true;
//Показывать управление ценами
$isShowPrices = true;
$isShowNdsSettings = true;
$isShowMeasureRatio = true;
$isShowMeasureQuantity = true;
$isShowMeasureCode = true;
$isShowQuantity = true;
$isAllowChangeSupplier = true;
$possibleProductTypes = \skeeks\cms\shop\models\ShopProduct::possibleProductTypes();
/**
 * @var $shopContent \skeeks\cms\shop\models\ShopContent
 */
$shopContent = \skeeks\cms\shop\models\ShopContent::find()->where(['content_id' => $contentModel->id])->one();
/*if ($shopContent->childrenContent) {
    $allowChangeProductType = true;*/

    /*if ($shopProduct->shop_supplier_id) {
        $shopProduct->product_type = \skeeks\cms\shop\models\ShopProduct::TYPE_SIMPLE;
        $allowChangeProductType = false;
    }*/
/*}*/


if ($model->isNewRecord) {

    if ($tree_id = \Yii::$app->request->get("tree_id")) {
        $model->tree_id = $tree_id;
    }

    //Если создаем товар модификацию
    if ($parent_content_element_id = \Yii::$app->request->get("parent_content_element_id")) {
        $allowChangeProductType = false;
    }

    //Если создается новый товар и указан товар поставщика
    if ($shopStoreProduct) {
        $allowChangeProductType = false;
        $isShowPrices = false;
        $isShowNdsSettings = false;
        $isShowMeasureQuantity = false;
        $isShowMeasureRatio = true;
        $isShowMeasureCode = true;
        $isShowQuantity = false;
    }

    \yii\helpers\ArrayHelper::remove($possibleProductTypes, \skeeks\cms\shop\models\ShopProduct::TYPE_OFFER);

} else {
    //Товар не новый уже и у него заданы товары поставщика
    /*if ($model->shopSupplierElements) {
        $allowChangeProductType = true;
        $isAllowChangeSupplier = false;
        $isShowPrices = false;
        $isShowNdsSettings = false;
        $isShowMeasureCode = true;
        $isShowMeasureRatio = true;
        $isShowQuantity = false;
        $isShowMeasureQuantity = false;

        \yii\helpers\ArrayHelper::remove($possibleProductTypes, \skeeks\cms\shop\models\ShopProduct::TYPE_OFFERS);
    }*/
}

if ($shopProduct->tradeOffers) {
    $allowChangeProductType = false;
    $shopProduct->product_type = \skeeks\cms\shop\models\ShopProduct::TYPE_OFFERS;
}

$isChangeParrentElement = false;
if ($shopProduct->product_type == \skeeks\cms\shop\models\ShopProduct::TYPE_OFFER) {
    $isChangeParrentElement = true;
}


?>

<?php $fieldSet = $form->fieldSet(\Yii::t('skeeks/shop/app', 'Товарные данные')); ?>

<?
/*if ($shopStoreProduct && $model->isNewRecord) {
    $siteClass = \Yii::$app->skeeks->siteClass;
    $defaultSite = $siteClass::find()->where(['is_default' => 1])->one();
    $model->cms_site_id = $defaultSite->id;
    echo "<div style='display: none;'>" . $form->field($model, 'cms_site_id') . "</div>";
}*/
?>

<?php if ($allowChangeProductType === false) : ?>
    <div style="display: none;">
        <?= $form->fieldSelect($shopProduct, 'product_type',
            \skeeks\cms\shop\models\ShopProduct::possibleProductTypes()); ?>
    </div>
<?php else : ?>
    <?= $form->fieldSelect($shopProduct, 'product_type', $possibleProductTypes, [
        'options' => [
            'data-form-reload' => "true",
        ],
    ]); ?>
<?php endif; ?>


<?php if (in_array($shopProduct->product_type, [
    \skeeks\cms\shop\models\ShopProduct::TYPE_OFFER,
    \skeeks\cms\shop\models\ShopProduct::TYPE_SIMPLE,
])) : ?>

    <?php if ($isChangeParrentElement) : ?>
        <?= $form->field($shopProduct, 'offers_pid')->widget(
            /*\skeeks\cms\widgets\AjaxSelectModel::class,
            [
                'modelClass' => \skeeks\cms\shop\models\ShopCmsContentElement::class,
                'searchQuery' => function($word = '') {
                    $query = \skeeks\cms\shop\models\ShopCmsContentElement::find()->cmsSite()->joinWith("shopProduct as sp");
                    $query->andWhere(['sp.product_type' => \skeeks\cms\shop\models\ShopProduct::TYPE_OFFERS]);
                    
                    if ($word) {
                        $query->search($word);
                    }
                    
                    return $query;
                },
            ]*/
                
            \skeeks\cms\backend\widgets\SelectModelDialogContentElementWidget::class,
            [
                'content_id'  => $model->content_id,
                'dialogRoute' => [
                    '/shop/admin-cms-content-element',
                    'findex' => [
                        'shop_product_type' => [\skeeks\cms\shop\models\ShopProduct::TYPE_OFFERS],
                    ],
                ],
            ]
        )->label('Товар содержащий модификации');
        ?>
    <?php endif; ?>

    <?php if ($isAllowChangeSupplier) : ?>
        <?/*= $form->fieldSelect($shopProduct, "shop_supplier_id", \yii\helpers\ArrayHelper::map(\skeeks\cms\shop\models\ShopSupplier::find()->all(), 'id', 'name'), [
            'allowDeselect' => true,
            'options'       => [
                'data-form-reload' => "true",
            ],
        ]); */?><!--
        --><?/*= $form->field($shopProduct, "supplier_external_id"); */?>


    <?php endif; ?>





    <?php if ($isShowPrices) : ?>
        <?php if ($productPrices) : ?>
        <?= \skeeks\cms\modules\admin\widgets\BlockTitleWidget::widget([
            'content' => \Yii::t('skeeks/shop/app', 'Main prices'),
        ]) ?>

            <?php foreach ($productPrices as $productPrice) : ?>
                <div class="form-group">
                    <div class="row sx-inline-row">
                        <div class="col-md-3 text-md-right my-auto">
                            <label class="control-label"><?= $productPrice->typePrice->name; ?></label>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex flex-row sx-measure-row">
                                <div class="my-auto" style="padding-right: 5px;">
                                    <?= \yii\helpers\Html::textInput("prices[".$productPrice->typePrice->id."][price]", $productPrice->price, [
                                        'class' => 'form-control',
                                    ]); ?>
                                </div>
                                <div class="my-auto">
                                    <?= \skeeks\cms\widgets\Select::widget([
                                        'name'          => "prices[".$productPrice->typePrice->id."][currency_code]",
                                        'value'         => $productPrice->currency_code,
                                        'allowDeselect' => false,
                                        'items'         => \yii\helpers\ArrayHelper::map(
                                            \Yii::$app->money->activeCurrencies, 'code', 'code'
                                        ),
                                    ]) ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    <?/* elseif ($shopStoreProduct): */?><!--
        <?/* $alert = \yii\bootstrap\Alert::begin([
            'closeButton' => false,
            'options'     => [
                'class' => 'alert-default text-center',
            ],
        ]); */?>
        Цена по этому товару будет рассчитана автоматически.
        <?/* $alert::end(); */?>

    <?/* elseif ($model->shopSupplierElements) : */?>
        <?/* $alert = \yii\bootstrap\Alert::begin([
            'closeButton' => false,
            'options'     => [
                'class' => 'alert-default text-center',
            ],
        ]); */?>
        Цена по этому товару рассчитывается автоматически из данных поставщиков.
        --><?/* $alert::end(); */?>
    <?php endif; ?>



    <?= \skeeks\cms\modules\admin\widgets\BlockTitleWidget::widget([
        'content' => \Yii::t('skeeks/shop/app', 'The number and account'),
    ]); ?>

    <?php if ($isShowMeasureCode) : ?>
        <?= $form->fieldSelect($shopProduct, 'measure_code', \yii\helpers\ArrayHelper::map(
            \skeeks\cms\measure\models\CmsMeasure::find()->orderBy(['priority' => SORT_ASC])->all(),
            'code',
            'asShortText'
        ), [
            "options" => [
                \skeeks\cms\helpers\RequestResponse::DYNAMIC_RELOAD_FIELD_ELEMENT => "true",
            ],
        ]); ?>
    <?php endif; ?>

    <?php if ($isShowMeasureRatio) : ?>
        <?= $form->field($shopProduct, 'measure_ratio')
            ->widget(\skeeks\cms\backend\widgets\forms\NumberInputWidget::class, [
                'dynamicReload' => true,
                'append'        => $shopProduct->measure ? $shopProduct->measure->symbol : "",
                'options' => [
                    'step' => 0.0001
                ]
            ]); ?>
        <?= $form->field($shopProduct, 'measure_ratio_min')
            ->widget(\skeeks\cms\backend\widgets\forms\NumberInputWidget::class, [
                //'dynamicReload' => true,
                'append'        => $shopProduct->measure ? $shopProduct->measure->symbol : "",
                'options' => [
                    'step' => 0.0001
                ]
            ]); ?>
    <?php endif; ?>

    <?= $form->field($shopProduct, 'measure_matches_jsondata')->widget(
        \skeeks\cms\shop\widgets\admin\ProductMeasureMatchesInputWidget::class
    ); ?>

    <?= \skeeks\cms\modules\admin\widgets\BlockTitleWidget::widget([
        'content' => \Yii::t('skeeks/shop/app', 'Штрихкоды'),
    ]); ?>

    <?= $form->field($shopProduct, 'barcodes')->widget(
        \skeeks\cms\shop\widgets\admin\ProductBarcodesInputWidget::class
    ); ?>


    <?/* if ($isShowMeasureQuantity) : */?><!--

        <?/*= $form->field($shopProduct, "quantity")
            ->widget(\skeeks\cms\backend\widgets\forms\NumberInputWidget::class, [
                'options' => [
                    'step' => 0.0001,
                ],
                'append'  => $shopProduct->measure ? $shopProduct->measure->symbol : "",
            ]);
        */?>

    <?/* elseif ($shopStoreProduct): */?>
        <?/* $alert = \yii\bootstrap\Alert::begin([
            'closeButton' => false,
            'options'     => [
                'class' => 'alert-default text-center',
            ],
        ]); */?>
        Количество по этому товару будет рассчитано автоматически.
        <?/* $alert::end(); */?>
    <?/* elseif ($model->shopSupplierElements) : */?>
        <?/* $alert = \yii\bootstrap\Alert::begin([
            'closeButton' => false,
            'options'     => [
                'class' => 'alert-default text-center',
            ],
        ]); */?>
        Количество по этому товару будет рассчитано автоматически из данных поставщиков.
        <?/* $alert::end(); */?>
    --><?/* endif; */?>

    <?php if ($shopStoreProducts && !$shopStoreProduct) : ?>
        <?
        if ($model->cms_site_id) {
            $site_id = $model->cms_site_id;
        } else {
            $site_id = \Yii::$app->skeeks->site->id;
        }
        
        
        $shopStores = \skeeks\cms\shop\models\ShopStore::find()->where(['cms_site_id' => $site_id])->all();
        ?>

        <?php foreach ($shopStores as $shopStore) : ?>
            <?php foreach ($shopStoreProducts as $shopStoreProduct) : ?>
                <?php if ($shopStoreProduct->shop_store_id == $shopStore->id) : ?>
                    <div class="form-group">
                        <div class="row sx-inline-row">
                            <div class="col-md-3 text-md-right my-auto">
                                <label class="control-label">Склад: <?= $shopStore->name; ?></label>
                            </div>
                            <div class="col-md-9">
                                <?= \skeeks\cms\backend\widgets\forms\NumberInputWidget::widget([
                                    'name'    => "stores[".$shopStore->id."][quantity]",
                                    'value'   => $shopStoreProduct->quantity,
                                    'options' => [
                                        'class' => 'form-control',
                                        'step'  => 0.0001,
                                    ],
                                    'append'  => $shopProduct->measure ? $shopProduct->measure->symbol : "",
                                ]) ?>
                                <?php /*= \yii\helpers\Html::textInput("stores[".$shopStore->id."][quantity]", $shopStoreProduct->quantity, [
                                                'class' => 'form-control',
                                            ]); */ ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>


    <?php endif; ?>

    <?= \skeeks\cms\modules\admin\widgets\BlockTitleWidget::widget([
        'content' => \Yii::t('skeeks/shop/app', 'Вес и размеры товара за '.$shopProduct->measure_ratio." ".($shopProduct->measure ? $shopProduct->measure->symbol : "")),
    ]); ?>

    <?= $form->field($shopProduct, 'weight')->widget(
        \skeeks\cms\shop\widgets\admin\SmartWeightInputWidget::class
    ); ?>
    <?= $form->field($shopProduct, 'length')->widget(\skeeks\cms\shop\widgets\admin\SmartDimensionsInputWidget::class); ?>
    <?= $form->field($shopProduct, 'width')->widget(\skeeks\cms\shop\widgets\admin\SmartDimensionsInputWidget::class); ?>
    <?= $form->field($shopProduct, 'height')->widget(\skeeks\cms\shop\widgets\admin\SmartDimensionsInputWidget::class); ?>

    <?php if ($isShowNdsSettings) : ?>

        <?= \skeeks\cms\modules\admin\widgets\BlockTitleWidget::widget([
            'content' => \Yii::t('skeeks/shop/app', 'Setting prices'),
        ]); ?>

        <?= $form->fieldSelect($shopProduct, 'vat_id', \yii\helpers\ArrayHelper::map(
            \skeeks\cms\shop\models\ShopVat::find()->all(), 'id', 'name'
        )); ?>
        <?= $form->field($shopProduct, 'vat_included')->checkbox([
            'uncheck' => \skeeks\cms\components\Cms::BOOL_N,
            'value'   => \skeeks\cms\components\Cms::BOOL_Y,
        ]); ?>
    <?php endif; ?>
<?php endif; ?>


<?php if ($shopContent->childrenContent && $shopProduct->product_type == \skeeks\cms\shop\models\ShopProduct::TYPE_OFFERS) : ?>
    <div id="row">
        <div id="sx-shop-product-tradeOffers" class="col-md-12">

            <?php if ($model->isNewRecord) : ?>

                <?= \yii\bootstrap\Alert::widget([
                    'options' =>
                        [
                            'class' => 'alert-warning',
                        ],
                    'body'    => \Yii::t('skeeks/shop/app', 'Управлять предложениями можно после сохранения товара, в отдельной вкладке.'),
                ]); ?>
            <?php else: ?>

                <?= \yii\bootstrap\Alert::widget([
                    'options' =>
                        [
                            'class' => 'alert-warning',
                        ],
                    'body'    => \Yii::t('skeeks/shop/app', 'Управлять предложениями можно в отдельной вкладке.'),
                ]); ?>

            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>


<?php $fieldSet::end(); ?>