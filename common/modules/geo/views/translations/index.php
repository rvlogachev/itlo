<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\geo\models\GeoTranslationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app/modules/geo', 'Translations');
$this->params['breadcrumbs'][] = ['label' => $this->context->module->name, 'url' => ['geo/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1><?= Html::encode($this->title) ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small></h1>
</div>
<div class="geo-translations-index">

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{summary}<br\/>{items}<br\/>{summary}<br\/><div class="text-center">{pager}</div>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'source_id',
                'header' => Yii::t('app/modules/geo', 'Source'),
                'format' => 'raw',
                'value' => function($data, $model) {
                    if ($data->source_id) {
                        if ($data->source_type == common\modules\geo\models\GeoTranslations::TR_COUNTRY) {
                            return Html::a($data->source['title'], ['../admin/geo/countries/view/?id='.$data->source_id], [
                                'target' => '_blank',
                                'data-pjax' => 0
                            ]);
                        } elseif ($data->source_type == common\modules\geo\models\GeoTranslations::TR_REGION) {
                            return Html::a($data->source['title'], ['../admin/geo/regions/view/?id='.$data->source_id], [
                                'target' => '_blank',
                                'data-pjax' => 0
                            ]);
                        } elseif ($data->source_type == common\modules\geo\models\GeoTranslations::TR_CITY) {
                            return Html::a($data->source['title'], ['../admin/geo/cities/view/?id='.$data->source_id], [
                                'target' => '_blank',
                                'data-pjax' => 0
                            ]);
                        } else {
                            return $data->source['title'];
                        }
                    } else {
                        return null;
                    }
                }
            ],
            [
                'attribute' => 'source_type',
                'header' => Yii::t('app/modules/geo', 'Source Type'),
                'value' => function($data, $model) {
                    if ($data->source_type == common\modules\geo\models\GeoTranslations::TR_COUNTRY)
                        return Yii::t('app/modules/geo','Country');
                    elseif ($data->source_type == common\modules\geo\models\GeoTranslations::TR_REGION)
                        return Yii::t('app/modules/geo','Region');
                    elseif ($data->source_type == common\modules\geo\models\GeoTranslations::TR_CITY)
                        return Yii::t('app/modules/geo','City');
                    else
                        return false;

                },
            ],
            'translation',
            [
                'attribute' => 'language',
                'headerOptions' => [
                    'class' => 'text-center'
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
                'value' => function($data) {
                    if(class_exists('Locale'))
                        return \Locale::getDisplayLanguage($data->language, Yii::$app->language);
                    else
                        return $data->language;
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'headerOptions' => [
                    'class' => 'text-center'
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Yii::t('app/modules/geo', 'Actions'),
                'contentOptions' => [
                    'class' => 'text-center'
                ],
            ],
        ],
        'pager' => [
            'options' => [
                'class' => 'pagination',
            ],
            'maxButtonCount' => 5,
            'activePageCssClass' => 'active',
            'linkContainerOptions' => [
                'class' => 'linkContainerOptions',
            ],
            'linkOptions' => [
                'class' => 'linkOptions',
            ],
            'prevPageCssClass' => '',
            'nextPageCssClass' => '',
            'firstPageCssClass' => 'previous',
            'lastPageCssClass' => 'next',
            'firstPageLabel' => Yii::t('app/modules/geo', 'First page'),
            'lastPageLabel'  => Yii::t('app/modules/geo', 'Last page'),
            'prevPageLabel'  => Yii::t('app/modules/geo', '&larr; Prev page'),
            'nextPageLabel'  => Yii::t('app/modules/geo', 'Next page &rarr;')
        ],
    ]); ?>

    <div>
        <?= Html::a(Yii::t('app/modules/geo', '&larr; Back to module'), ['../admin/geo'], ['class' => 'btn btn-default pull-left']) ?>
        <?= Html::a(Yii::t('app/modules/geo', 'Add new translation'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </div>
    <?php Pjax::end(); ?>
</div>

<?php echo $this->render('../_debug'); ?>
