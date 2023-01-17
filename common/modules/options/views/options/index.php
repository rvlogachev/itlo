<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\modules\widget\src\SelectInput;
use yii\bootstrap\Modal;
use rmrevin\yii\fontawesome\FAS;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\options\models\OptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->context->module->name;
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<< JS

    /* To initialize BS3 tooltips set this below */
    $(function () {
        $("[data-toggle='tooltip']").tooltip(); 
    });
    
    /* To initialize BS3 popovers set this below */
    $(function () {
        $("[data-toggle='popover']").popover(); 
    });

JS
);

?>



<div class="card">

    <div class="card-header">
        <h5 class="card-title"><?= Html::encode($this->title) ?> <small class="text-muted pull-right"></small></h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <?= Html::a(Yii::t('app/modules/options', 'Add new option'), ['create'], ['class' => 'dropdown-item btn btn-success pull-right']) ?>
                    <a class="dropdown-divider"></a>
                    <a class="dropdown-item"><?= Html::encode($this->context->module->id) ?> [ v.<?= $this->context->module->version ?>]</a>
                </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body ">
        <div class="options-index">
            <?php Pjax::begin(); ?>
            <div class="form-group">
                <?= Html::a(Yii::t('app/modules/options', 'Add new option'), ['create'], ['class' => 'btn btn-success pull-left']) ?>

                <?= Html::a(Yii::t('app/modules/options', 'Import options'), ['import'], [
                    'class' => 'btn btn-warning ',
                    'data-toggle' => 'modal',
                    'data-target' => '#optionsImport',
                    'data-pjax' => '1'
                ]) ?>
                <?= Html::a(Yii::t('app/modules/options', 'Export options'), ['export'], [
                    'class' => 'btn btn-info',
                    'data-pjax' => '0'
                ]) ?>
            </div>
            <hr/>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => '{summary}<br\/>{items}<br\/> <div class="text-center">{pager}</div>',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'param',
                        'label' => Yii::t('app/modules/options', 'Label and param'),
                        'filter' => true,
                        'format' => 'html',
                        'value' => function($data) {

                            if ($data->protected)
                                $label = $data->label.' <span title="'.Yii::t('app/modules/options', 'Protected option').'" class="fa fa-lock text-danger"></span>';
                            else
                                $label = $data->label;

                            return $label.'<br/><em class="text-muted">'.$data->getFullParamName().'</em>';
                        }
                    ],
                    [
                        'attribute' => 'value',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if ($data->type == 'array') {
                                return 'array()';
                            } else if ($data->type == 'object') {
                                return 'object()';
                            } else {
                                return '<pre contenteditable="true">' . $data->value . '</pre>';
                            }
                        }
                    ],
                    [
                        'attribute' => 'default',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if ($data->type == 'array') {
                                return 'array()';
                            } else if ($data->type == 'object') {
                                return 'object()';
                            } else {
                                return $data->default;
                            }
                        }
                    ],
                    [
                        'attribute' => 'type',
                        'format' => 'html',
                        'filter' => SelectInput::widget([
                            'model' => $searchModel,
                            'attribute' => 'type',
                            'items' => $optionsTypes,
                            'options' => [
                                'class' => 'form-control'
                            ]
                        ]),
                        'headerOptions' => [
                            'class' => 'text-center'
                        ],
                        'contentOptions' => [
                            'class' => 'text-center'
                        ],
                        'value' => function($data) use ($optionsTypes) {
                            if ($optionsTypes && $data->type !== null)
                                return $optionsTypes[$data->type];
                            else
                                return $data->type;
                        },
                    ],
                    [
                        'attribute' => 'autoload',
                        'format' => 'html',
                        'filter' => SelectInput::widget([
                            'model' => $searchModel,
                            'attribute' => 'autoload',
                            'items' => $autoloadModes,
                            'options' => [
                                'class' => 'form-control'
                            ]
                        ]),
                        'headerOptions' => [
                            'class' => 'text-center'
                        ],
                        'contentOptions' => [
                            'class' => 'text-center'
                        ],
                        'value' => function($data) use ($autoloadModes) {

                            if ($autoloadModes && $data->autoload !== null)
                                $title = $autoloadModes[$data->autoload];
                            else
                                $title = '';

                            if ($data->autoload)
                                return '<span title="'.$title.'" class="fa fa-check text-success"></span>';
                            else
                                return '<span title="'.$title.'" class="fa fa-check text-muted"></span>';
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'visibleButtons' => [
                            'update' => function ($model, $key, $index) {
                                return !($model->protected);
                            },
                            'delete' => function ($model, $key, $index) use ($hasAutoload) {
                                return !(($model->autoload && $hasAutoload) || $model->protected);
                            }
                        ],
                        'buttons'=> [
                            'view' => function($url, $data, $key) use ($module) {
                                return Html::a('<span class="fa fa-eye"></span>', Url::to(['options/view', 'id' => $data['id']]), [
                                    'class' => 'option-details-link btn btn-xs btn-default',
                                    'title' => Yii::t('yii', 'View'),
                                    'data-toggle' => 'modal',
                                    'data-target' => '#optionDetails',
                                    'data-id' => $key,
                                    'data-pjax' => '1'
                                ]);
                            },
                            'update' => function($url, $data, $key) {
                                return Html::a('<i class="fa fa-pen"></i>', Url::to(['options/update', 'id' => $data['id']]), [
                                    'class' => 'btn btn-xs btn-warning',
                                    'title' => Yii::t('yii', 'Update'),

                                ]);
                            },

                        ],
                    ]
                ],
                'rowOptions' => function ($model, $index, $widget, $grid) {
                    if($model->value !== $model->default) {
                        return ['class' => 'changed warning'];
                    }
                },
                'pager' => [
                    'options' => [
                        'class' => 'pagination',
                    ],
                    'maxButtonCount' => 5,
                    'activePageCssClass' => 'active',
                    'prevPageCssClass' => '',
                    'nextPageCssClass' => '',
                    'firstPageCssClass' => 'previous',
                    'lastPageCssClass' => 'next',
                    'firstPageLabel' => Yii::t('app/modules/options', 'First page'),
                    'lastPageLabel'  => Yii::t('app/modules/options', 'Last page'),
                    'prevPageLabel'  => Yii::t('app/modules/options', '&larr; Prev page'),
                    'nextPageLabel'  => Yii::t('app/modules/options', 'Next page &rarr;')
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>

    <div class="card-footer">
        <?php echo getDataProviderSummary($dataProvider) ?>
    </div>
</div>





<?php $this->registerJs(<<< JS
$('body').delegate('.option-details-link', 'click', function(event) {
    event.preventDefault();
    $.get(
        $(this).attr('href'), 
        function (data) {
             $("#optionDetails .modal-header h4").after($("#optionDetails .modal-header button"));   
            $('#optionDetails .modal-body').html($(data).remove('.modal-footer'));
            if ($(data).find('.modal-footer').length > 0) {
                $('#optionDetails').find('.modal-footer').remove();
                $('#optionDetails .modal-content').append($(data).find('.modal-footer'));
            }
            $('#optionDetails').modal();
        }
    );
});
JS
); ?>



<div id="optionsImport" class="fade modal show" tabindex="-1" >
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pull-left"><?=Yii::t('app/modules/options', 'Options import');?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">

                <?php  echo $this->render('_import', ['model' => $importModel]); ?>

            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default pull-left" data-dismiss="modal"><?=Yii::t('app/modules/options', 'Close');?></a>
            </div>
        </div>
    </div>
</div>

<div id="optionDetails" class="fade modal show" tabindex="-1" >
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pull-left"><?=Yii::t('app/modules/options', 'Option details');?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">



            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default pull-left" data-dismiss="modal"><?=Yii::t('app/modules/options', 'Close');?></a>
            </div>
        </div>
    </div>
</div>

<?php echo $this->render('../_debug'); ?>
