<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\modules\widget\src\SelectInput;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\users\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->context->module->name;
$this->params['breadcrumbs'][] = $this->title;
?>


<?php //Pjax::begin(); ?>
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
                                <?= Html::a(Yii::t('app/modules/users', 'Add new user'), ['create'], ['class' => 'dropdown-item btn btn-add btn-success pull-right']) ?>
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
                    <?php echo Html::a(\rmrevin\yii\fontawesome\FAS::icon('user',['class'=>['nav-icon']]).'&nbsp;&nbsp;&nbsp;'.Yii::t('app/modules/users', 'Add new user'), ['/admin/users/users/create/'], ['class' => 'btn btn-primary' ]) ?>
                    <hr>
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            [
                                'attribute' => 'username',
                                'format' => 'html',
                                'value' => function($data) {

                                    if ($data->is_online)
                                        $badge = '<span class="fa fa-circle text-success" data-rel="tooltip" title="' . Yii::t('app/modules/users', 'User is online') . '"></span>';
                                    else
                                        $badge = '<span class="fa fa-circle text-muted" data-rel="tooltip" title="' . Yii::t('app/modules/users', 'Last seen {last_seen}', [
                                                'last_seen' => Yii::$app->formatter->asDatetime($data->lastseen_at)
                                            ]) . '"></span>';

                                    return $data->username .'&nbsp;'. $badge;
                                }
                            ],
                            'email:email',
                            (Yii::$app->getAuthManager()) ? [
                                'attribute' => 'role',
                                'format' => 'html',
                                'filter' => SelectInput::widget([
                                    'model' => $searchModel,
                                    'attribute' => 'role',
                                    'items' => $searchModel->getRolesList(true),
                                    'options' => [
                                        'id' => 'roleFilter',
                                        'class' => 'form-control'
                                    ]
                                ]),
                                'headerOptions' => [
                                    'class' => 'text-center'
                                ],
                                'contentOptions' => [
                                    'class' => 'text-center'
                                ],
                                'value' => function($data) {
                                    $role = $data->getDefaultRole(true);


                                    return isset($role)?Html::a($role->name, ['../rbac/roles/view', 'id' => $role->name]):'';
                                }
                            ] : ['visible' => false],
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
                                'attribute' => 'status',
                                'format' => 'html',
                                'filter' => SelectInput::widget([
                                    'model' => $searchModel,
                                    'attribute' => 'status',
                                    'items' => $searchModel->getStatusesList(true),
                                    'options' => [
                                        'id' => 'statusFilter',
                                        'class' => 'form-control'
                                    ]
                                ]),
                                'headerOptions' => [
                                    'class' => 'text-center'
                                ],
                                'contentOptions' => [
                                    'class' => 'text-center'
                                ],
                                'value' => function($data) {
                                    if ($data->status == $data::USR_STATUS_BLOCKED)
                                        return '<span class="badge bg-danger">'.Yii::t('app/modules/users','Blocked').'</span>';
                                    elseif ($data->status == $data::USR_STATUS_ACTIVE)
                                        return '<span class="badge bg-success">'.Yii::t('app/modules/users','Active').'</span>';
                                    elseif ($data->status == $data::USR_STATUS_DELETED)
                                        return '<span class="badge bg-default">'.Yii::t('app/modules/users','Deleted').'</span>';
                                    elseif ($data->status == $data::USR_STATUS_WAITING)
                                        return '<span class="badge bg-warning">'.Yii::t('app/modules/users','Waiting').'</span>';
                                    else
                                        return false;
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => Yii::t('app/modules/admin', 'Actions'),
                                'buttons'=> [
                                    'view' => function($url, $data, $key) {
                                        return Html::a('<i class="fa fa-eye"></i>', Url::to(['/users/users/view',  'id' => $data['id']]), [
                                            'class' => 'btn btn-xs btn-default',
                                            'title' => Yii::t('yii', 'View'),
                                        ]);
                                    },
                                    'delete' => function($url, $data, $key) {
                                        return Html::a('<span class="fa fa-times"></span>',
                                            Url::to(['/users/users/delete',      'id' => $data['id'],]),
                                            ['data' => [
                                                'method' => 'post',
                                            ],
                                            'class'=>'btn btn-xs btn-danger',
                                            'title' => Yii::t('yii', 'Delete'),
                                        ]);
                                    },
                                    'update' => function($url, $data, $key) {
                                        return Html::a('<i class="fa fa-pen"></i>', Url::to(['/users/users/update', 'id' => $data['id']]), [
                                            'class' => 'btn btn-xs btn-warning',
                                            'title' => Yii::t('yii', 'Update'),

                                        ]);
                                    },
                                ],
//                                'visibleButtons' => [
//                                    'update' => false,
//                                    'delete' => function ($model, $key, $index) {
//                                        return !($model->protected) && !($model->status == $model::MODULE_STATUS_NOT_INSTALL);
//                                    },
//                                    'view' => function ($model, $key, $index) {
//                                        return !(!($model->protected) && ($model->status == $model::MODULE_STATUS_NOT_INSTALL));
//                                    },
//                                    'clear' => function ($model, $key, $index) {
//                                        return !($model->protected) && ($model->status == $model::MODULE_STATUS_NOT_INSTALL);
//                                    }
//                                ],
                                'template' => '{view} {update} {delete}'
                            ]
                        ],
                        'pager' => [
                            'options' => [
                                'class' => 'pagination',
                            ],
                            'activePageCssClass' => 'active',
                            'linkContainerOptions' => [
                                'class' => 'linkContainerOptions',
                            ],
                            'linkOptions' => [
                                'class' => 'linkOptions',
                            ],
                            'maxButtonCount' => 5,
                            'prevPageCssClass' => 'prev',
                            'nextPageCssClass' => 'next',
                            'firstPageCssClass' => 'first',
                            'lastPageCssClass' => 'last',
                            'firstPageLabel' => Yii::t('app/modules/users', 'First page'),
                            'lastPageLabel'  => Yii::t('app/modules/users', 'Last page'),
                            'prevPageLabel'  => Yii::t('app/modules/users', '&larr; Prev page'),
                            'nextPageLabel'  => Yii::t('app/modules/users', 'Next page &rarr;')
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>


<?php //Pjax::end(); ?>

<?php echo $this->render('../_debug'); ?>