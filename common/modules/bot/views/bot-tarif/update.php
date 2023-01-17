<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotTarif */

$this->title = 'Update Bot Tarif: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bot Tarifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-tarif-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
