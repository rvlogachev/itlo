<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\widget\src\SelectInput;

/* @var $this yii\web\View */
/* @var $model common\modules\users\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row users-form">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group">
            <?php
            if ($model->id == Yii::$app->user->id || Yii::$app->user->can('admin')) {
                echo $form->field($model, 'password')->textInput(['maxlength' => true]);
                echo $form->field($model, 'password_confirm')->textInput(['maxlength' => true]);
            }
            ?>
        </div>
    </div>
    <div class="col-12 col-sm-6">

        <?php if ($model->id && Yii::$app->user->can('admin')) { ?>
            <div class="form-group">
                <?php  echo $form->field($model, 'auth_key')->textInput(['readonly' => true]); ?>
            </div>
            <div class="form-group">
                <?php echo $form->field($model, 'password_hash')->textInput(['readonly' => true]); ?>
            </div>
        <?php }            ?>

        <div class="form-group">
            <?php
            if (Yii::$app->getAuthManager() && Yii::$app->user->can('admin')) {
                echo $form->field($model, 'role')->widget(SelectInput::class, [
                    'items' => $model->getRolesList(false),
                    'options' => [
                        'class' => 'form-control'
                    ]
                ]);
            }
            ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'status')->widget(SelectInput::class, [
                'items' => $model->getStatusesList(false),
                'options' => [
                    'class' => 'form-control'
                ]
            ]); ?>
        </div>
    </div>
    <hr/>
    <div class="form-group">
        <?= Html::a(Yii::t('app/modules/users', '&larr; Back to list'), ['users/index'], ['class' => 'btn btn-default pull-left']) ?>&nbsp;
        <?= Html::submitButton(Yii::t('app/modules/users', 'Save'), ['class' => 'btn btn-success pull-right']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

