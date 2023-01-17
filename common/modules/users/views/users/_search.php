<?php

use common\modules\widget\src\SelectInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\users\models\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-secondary collapsed-card">
            <div class="card-header">
                <h3 class="card-title"><?= Yii::t('app/modules/users', 'Users search') ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div  id="usersSearch" class="users-search">

                    <?php $form = ActiveForm::begin([
                        'action' => ['index'],
                        'method' => 'get',
                        'options' => [
                            'data-pjax' => 1
                        ],
                    ]); ?>
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <?= $form->field($model, 'id') ?>


                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 col-md-3">
                            <?= $form->field($model, 'username') ?>


                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 col-md-3">
                            <?= $form->field($model, 'auth_key') ?>


                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 col-md-3">
                            <?= $form->field($model, 'password_hash') ?>


                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <?= $form->field($model, 'password_reset_token') ?>


                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 col-md-3">
                            <?= $form->field($model, 'email') ?>


                        </div>
                        <div class="col-sm-4 col-md-3">
                            <?= $form->field($model, 'status')->widget(SelectInput::class, [
                                'items' => $model->getStatusesList(true),
                                'options' => [
                                    'class' => 'form-control'
                                ]
                            ]); ?>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 col-md-3">

                        </div>

                    </div>


                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app/modules/users', 'Search'), ['class' => 'btn btn-primary']) ?>
                        <?= Html::resetButton(Yii::t('app/modules/users', 'Reset'), ['class' => 'btn btn-default']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>


