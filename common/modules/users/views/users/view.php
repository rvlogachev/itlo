<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use common\modules\helpers\src\DateAndTime;

/* @var $this yii\web\View */
/* @var $model common\modules\users\models\Users */

$this->title = Yii::t('app/modules/users', 'User').' - '.$model->username;
$this->params['breadcrumbs'][] = ['label' => $this->context->module->name, 'url' => ['users/index']];
$this->params['breadcrumbs'][] = ucfirst($this->title);
\yii\web\YiiAsset::register($this);

?>


<div class="card">
    <div class="card-header">
        <h5 class="card-title"><?=  Html::encode($this->title) ?> </h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <?= Html::a(Yii::t('app/modules/users', 'Users'), ['/admin/users'], ['class' => 'dropdown-item btn btn-add btn-success pull-right']) ?>
                    <a class="dropdown-divider"></a>
                    <a class="dropdown-item"><?= Html::encode($this->context->module->id) ?> [ v.<?= $this->context->module->version ?>]</a>
                </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="users-view">
            <div class="form-group">
                <?= Html::a(Yii::t('app/modules/users', '&larr; Back to list'), ['users/index'], ['class' => 'btn btn-default']) ?>
                <?= Html::a(Yii::t('app/modules/users', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app/modules/users', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger pull-right',
                    'data' => [
                        'confirm' => Yii::t('app/modules/users', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <hr/>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    [
                        'attribute' => 'auth_key',
                        'format' => 'html',
                        'value' => function($data) {
                            $string = $data->auth_key;
                            $length = strlen($string);
                            $sub_len = abs($length / 10);
                            if($string && $length > 6)
                                return substr($string, 0, $sub_len) . '…' . substr($string, -$sub_len, $sub_len) . ' <span class="text-muted pull-right">[length: '.$length.']</span>';
                            else
                                return $string;
                        }
                    ],
                    [
                        'attribute' => 'password_hash',
                        'format' => 'html',
                        'value' => function($data) {
                            $string = $data->password_hash;
                            $length = strlen($string);
                            $sub_len = abs($length / 10);
                            if($string && $length > 6)
                                return substr($string, 0, $sub_len) . '…' . substr($string, -$sub_len, $sub_len) . ' <span class="text-muted pull-right">[length: '.$length.']</span>';
                            else
                                return $string;
                        }
                    ],
                    [
                        'attribute' => 'password_reset_token',
                        'format' => 'html',
                        'value' => function($data) {
                            $string = $data->password_reset_token;
                            $length = strlen($string);
                            $sub_len = abs($length / 10);
                            if($string && $length > 6)
                                return substr($string, 0, $sub_len) . '…' . substr($string, -$sub_len, $sub_len) . ' <span class="text-muted pull-right">[length: '.$length.']</span>';
                            else
                                return $string;
                        }
                    ],
                    'email:email',
                    (Yii::$app->getAuthManager()) ? [
                        'attribute' => 'roles',
                        'format' => 'html',
                        'value' => function($data) {
                            $output = '<ul class="list-unstyled">';
                            foreach($data->roles as $role) {
                                $output .= "<li>" . Html::a($role->name, ['../rbac/roles/view', 'id' => $role->name], ['class' => '']) . "</li>";
                            }
                            return $output . "</ul>";
                        },
                    ] : ['visible' => false],
                    (Yii::$app->getAuthManager()) ? [
                        'attribute' => 'permissions',
                        'format' => 'html',
                        'value' => function($data) {
                            $output = '<ul class="list-unstyled">';
                            foreach($data->permissions as $permission) {
                                $output .= "<li>" . Html::a($permission->name, ['../rbac/roles/view', 'id' => $permission->name], ['class' => '']) . "</li>";
                            }
                            return $output . "</ul>";
                        },
                    ] : ['visible' => false],
                    (Yii::$app->getAuthManager()) ? [
                        'attribute' => 'assignments',
                        'format' => 'html',
                        'value' => function($data) {
                            $output = '<ul class="list-unstyled">';
                            foreach($data->assignments as $assignments) {
                                $output .= "<li>" . Html::a($assignments->roleName, ['../rbac/assignments/view', 'user_id' => $data->id, 'item_name' => $assignments->roleName], ['class' => '']) . "</li>";
                            }
                            return $output . "</ul>";
                        },
                    ] : ['visible' => false],
                    [
                        'attribute' => 'status',
                        'format' => 'html',
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

                        },
                    ],
                    [
                        'attribute' => 'lastseen_at',
                        'label' => Yii::t('app/modules/users', 'Is online?'),
                        'value' => function($data) {
                            if ($data->is_online)
                                return Yii::t('app/modules/users', 'User is online');
                            else
                                return Yii::t('app/modules/users', 'Last seen {last_seen}', [
                                    'last_seen' => Yii::$app->formatter->asDatetime($data->lastseen_at)
                                ]);
                        }
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => 'html',
                        'value' => function($data) {
                            return \Yii::$app->formatter->asDatetime($data->created_at) . DateAndTime::diff($data->created_at." ", null, [
                                    'layout' => '<small class="pull-right {class}">[ {datetime} ]</small>',
                                    'inpastClass' => 'text-danger',
                                    'futureClass' => 'text-success',
                                ]);
                        }
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => 'html',
                        'value' => function($data) {
                            return \Yii::$app->formatter->asDatetime($data->updated_at) . DateAndTime::diff($data->updated_at." ", null, [
                                    'layout' => '<small class="pull-right {class}">[ {datetime} ]</small>',
                                    'inpastClass' => 'text-danger',
                                    'futureClass' => 'text-success',
                                ]);
                        }
                    ],
                ],
            ]) ?>
        </div>



    </div>
    <div class="card-footer">

    </div>
</div>


