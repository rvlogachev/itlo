<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\tickets\models\Tickets */

$this->title = Yii::t('app/modules/tickets', 'Update ticket: {name}', [
    'name' => $model->subject,
]);
$this->params['breadcrumbs'][] = ['label' => $this->context->module->name, 'url' => ['list/all']];
$this->params['breadcrumbs'][] = ['label' => $model->subject, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/modules/tickets', 'Update');

?>
<div class="tickets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
