<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\users\models\Users */

$this->title = Yii::t('app/modules/users', 'Create user');
$this->params['breadcrumbs'][] = ['label' => $this->context->module->name, 'url' => ['users/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title"><?= Html::encode($this->title) ?> </h5>
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

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>



    </div>
    <div class="card-footer">
        Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
        the plugin.
    </div>
</div>


