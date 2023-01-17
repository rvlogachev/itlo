<?php

use common\components\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotLog */

$this->title = 'Update Bot Log: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bot Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-log-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
