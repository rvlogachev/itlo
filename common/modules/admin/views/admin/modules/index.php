<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = Yii::t('app/modules/admin', 'Modules');
$this->params['breadcrumbs'][] = $this->title;

?>



<?php Pjax::begin([
    'id' => "adminModulesAjax",
    'timeout' => 5000
]);

?>





<div class="row">
    <div class="col-lg-12">
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
                            <a href="/admin/admin/index" class="dropdown-item"><?=Yii::t('app/modules/admin','Dashboard');?></a>
                            <a class="dropdown-divider"></a>
                            <a class="dropdown-item"><?= Html::encode($this->context->module->id) ?> [ v.<?= $this->context->module->version ?>]</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => '{summary}<br\/>{items}<br\/>{summary}<br\/><div class="text-center">{pager}</div>',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'module',
                        'name',
                        [
                            'attribute' => 'description',
                            'value' => function($data) use ($module) {
                                return Yii::t('app/modules/'.$data->module, $data->description);
                            }
                        ],
                        'class',

                        [
                            'attribute' => 'version',
                            'format' => 'raw',
                            'value' => function($data) use ($module) {

                                if ($new_version = $module->checkUpdates($data->name, $data->version))
                                    return $data->version . ' <label class="label label-danger">Available update to ' . $new_version . '</label>';
                                else
                                    return $data->version;

                            }
                        ], [
                            'attribute' => 'priority',
                            'format' => 'raw',
                            'headerOptions' => [
                                'class' => 'text-center'
                            ],
                            'contentOptions' => [
                                'class' => 'text-center'
                            ],
                        ], [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'headerOptions' => [
                                'class' => 'text-center'
                            ],
                            'contentOptions' => [
                                'class' => 'text-center'
                            ],
                            'value' => function($data) {
                                if ($data->protected) {

                                    if ($data->status == $data::MODULE_STATUS_ACTIVE)
                                        $status = '<span class="badge bg-success">' . Yii::t('app/modules/admin', 'Active') . '</span>';
                                    elseif ($data->status == $data::MODULE_STATUS_DISABLED)
                                        $status = '<span class="badge bg-default">' . Yii::t('app/modules/admin', 'Disabled') . '</span>';
                                    else
                                        $status = '<span class="badge bg-danger">' . Yii::t('app/modules/admin', 'Deleted') . '</span>';

                                    return $status . ' <span class="badge bg-danger">' . Yii::t('app/modules/admin', 'Protected') . '</span>';

                                } else {
                                    if ($data->status == $data::MODULE_STATUS_ACTIVE) {
                                        return '<div id="switcher-' . $data->id . '" data-value-current="' . $data->status . '" data-id="' . $data->id . '" data-toggle="button-switcher" class="btn-group btn-toggle"><button data-value="0" class="btn btn-xs btn-default">OFF</button><button data-value="1" class="btn btn-xs btn-primary">ON</button></div>';
                                    } else if ($data->status == $data::MODULE_STATUS_DISABLED) {
                                        return '<div id="switcher-' . $data->id . '" data-value-current="' . $data->status . '" data-id="' . $data->id . '" data-toggle="button-switcher" class="btn-group btn-toggle"><button data-value="0" class="btn btn-xs btn-danger">OFF</button><button data-value="1" class="btn btn-xs btn-default">ON</button></div>';
                                    } else {
                                        return '<span class="badge bg-default">' . Yii::t('app/modules/admin', 'Deleted') . '</span>';
                                    }
                                }
                            }
                        ],



                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => Yii::t('app/modules/admin', 'Actions'),
                            'buttons'=> [
                                'view' => function($url, $data, $key) {
                                    return Html::a('<i class="fa fa-eye"></i>', Url::to(['admin/modules', 'action' => 'view', 'id' => $data['id']]), [
                                        'class' => 'admin-modules-details-link btn btn-xs btn-default',
                                        'title' => Yii::t('yii', 'View'),
                                        'data-toggle' => 'modal',
                                        'data-target' => '#moduleDetails',
                                        'data-id' => $key,
                                        'data-pjax' => '1'
                                    ]);
                                },
                                'delete' => function($url, $data, $key) {
                                    return Html::a('<span class="fa fa-times"></span>', Url::to(['admin/modules', 'action' => 'delete', 'id' => $data['id']]), [
                                        'class'=>'btn btn-xs btn-danger',
                                        'title' => Yii::t('yii', 'Delete'),
                                        'data-id' => $key,
                                        'data-pjax' => '0'
                                    ]);
                                },
                                'clear' => function($url, $data, $key) {
                                    return Html::a(
                                        '<span class="fa fa-clear"></span> ' . Yii::t('app/modules/admin', 'Clear'),
                                        Url::to(['admin/modules', 'action' => 'clear', 'id' => $data['id']]),
                                        [
                                            'title' => Yii::t('app/modules/admin', 'Clear data'),
                                            'class' => 'btn btn-xs btn-warning',
                                            'data-id' => $key,
                                            'data-pjax' => '0',
                                            'data' => [
                                                'confirm' => Yii::t(
                                                    'app/modules/admin',
                                                    'Are you sure you want to permanently remove the `{module}` module and clear all its options?',
                                                    ['module' => $data->module]),
                                                'method' => 'post',
                                            ]
                                        ]
                                    );
                                },
                            ],
                            'visibleButtons' => [
                                'update' => false,
                                'delete' => function ($model, $key, $index) {
                                    return !($model->protected) && !($model->status == $model::MODULE_STATUS_NOT_INSTALL);
                                },
                                'view' => function ($model, $key, $index) {
                                    return !(!($model->protected) && ($model->status == $model::MODULE_STATUS_NOT_INSTALL));
                                },
                                'clear' => function ($model, $key, $index) {
                                    return !($model->protected) && ($model->status == $model::MODULE_STATUS_NOT_INSTALL);
                                }
                            ],
                            'template' => '{view} {update} {delete} {clear}'
                        ]
                    ],
                    'pager' => [
                        'options' => [
                            'class' => 'pagination',
                        ],
                        'maxButtonCount' => 5,
                        'activePageCssClass' => 'active',
                        'prevPageCssClass' => 'prev',
                        'nextPageCssClass' => 'next',
                        'firstPageCssClass' => 'first',
                        'lastPageCssClass' => 'last',
                        'firstPageLabel' => Yii::t('app/modules/admin', 'First page'),
                        'lastPageLabel'  => Yii::t('app/modules/admin', 'Last page'),
                        'prevPageLabel'  => Yii::t('app/modules/admin', '&larr; Prev page'),
                        'nextPageLabel'  => Yii::t('app/modules/admin', 'Next page &rarr;')
                    ],
                ]); ?>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= Yii::t('app/modules/admin', 'Available modules'); ?></h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>


            <div class="card-body">
                <?php $form = ActiveForm::begin([
                    'action' => ['admin/modules'],
                    'options' => [
                        'class' => 'form  '
                    ]
                ]); ?>




                <div class="row">
                    <div class="col-sm-4 col-md-4">

                        <?php $listData=\yii\helpers\ArrayHelper::map($extensions,'name','name');
                        echo $form->field($model, 'extensions')->dropDownList($listData )->label(false) ?>


<!--                        --><?php //echo $form->field($model, 'extensions', [
//                            'options' => [
//                                'tag' => false
//                            ]])->label(false)->widget(SelectInput::class, [
//                            'items' => $extensions,
//                            'options' => [
//                                'style'=>'width:500px;',
//                                'class' => 'form-control',
//                                'disabled' => (count($extensions) == 0) ? true : false
//                            ],
//                            'pluginOptions' => [
//                                'dropdownClass' => '.dropdown .btn-block',
//                                'toggleClass' => '.btn .btn-default .dropdown-toggle .btn-block',
//                                'toggleText' => Yii::t('app/modules/admin', 'Modules')
//                            ]
//                        ]); ?>
                    </div>

                    <div class="col-sm-3 col-md-3">
                        <?= $form->field($model, 'autoActivate')->checkbox([
                            'checked' => true,
                            'style' => 'margin-top:10px;',
                            'disabled' => (count($extensions) == 0) ? true : false
                        ]); ?>

                    </div>
                    <div class="col-sm-2 col-md-2">

                        <?= Html::submitButton(Yii::t('app/modules/admin', 'Add module'), [
                            'class' => 'btn btn-add btn-success',
                            'disabled' => (count($extensions) == 0) ? true : false
                        ]) ?>
                    </div>
                    <div class="col-sm-3 col-md-3">


                    </div>


                </div>


                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
<?php echo $this->render('../../_debug'); ?>
<?php Pjax::end(); ?>



<?php $this->registerJs(
    'var $container = $("#adminModulesAjax");
    var requestURL = window.location.href;
    if ($container.length > 0) {
        $container.delegate(\'[data-toggle="button-switcher"] button\', \'click\', function() {
            let id = $(this).parent(\'.btn-group\').data(\'id\');
            let value = $(this).data(\'value\');
            let url = new URL(requestURL);
            url.searchParams.set(\'change\', \'status\');            
            $.ajax({
                type: "POST",
                url: url.toString(),
                dataType: \'json\',
                data: {\'id\': id, \'value\': value},
                complete: function(data) {
                    $.pjax.reload({type:\'POST\', container:\'#adminModulesAjax\'});
                }
            });
        });
    }', \yii\web\View::POS_READY
); ?>
<?php $this->registerJs(<<< JS
$('body').delegate('.admin-modules-details-link', 'click', function(event) {
    event.preventDefault();
    $.get(
        $(this).attr('href'),
        function (data) {
            $("#moduleDetails .modal-header h4").after($("#moduleDetails .modal-header button"));   
            $('#moduleDetails .modal-body').html($(data).remove('.modal-footer'));
            if ($(data).find('.modal-footer').length > 0) {
                $('#moduleDetails').find('.modal-footer').remove();
                $('#moduleDetails .modal-content').append($(data).find('.modal-footer'));
            }
            $('#moduleDetails').modal();
        }  
    );
});
JS
); ?>

<div id="moduleDetails" class="fade modal" role="dialog" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title pull-left"><?=Yii::t('app/modules/admin','Module details');?></h4>
            </div>
            <div class="modal-body">



            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default pull-left" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<?php //Modal::begin([
//    'id' => 'moduleDetails',
//   // 'header' => '<h4 class="modal-title">'.Yii::t('app/modules/admin', 'Module details').'</h4>',
//    'footer' => '<a href="#" class="btn btn-default pull-left" data-dismiss="modal">'.Yii::t('app/modules/admin', 'Close').'</a>',
//    'clientOptions' => [
//        'show' => false
//    ]
//]); ?>
<?php //Modal::end(); ?>
