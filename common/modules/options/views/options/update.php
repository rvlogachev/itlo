<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\modules\users\models\Options */
$this->title = Yii::t('app/modules/options', 'Update option: {name}', [
    'name' => $model->param,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/options', 'All options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app/modules/options', 'Edit');
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
                    <?= Html::a(Yii::t('app/modules/options', 'Options'), ['/admin/options'], ['class' => 'dropdown-item btn btn-add btn-success pull-right']) ?>
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

        <div class="options-update">
            <?= $this->render('_form', [
                'model' => $model,
                'optionsTypes' => $optionsTypes,
                'autoloadModes' => $autoloadModes
            ]) ?>

        </div>



    </div>
    <div class="card-footer">

    </div>
</div>

