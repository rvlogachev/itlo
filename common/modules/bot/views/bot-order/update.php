<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotOrder */

$this->title = 'Update Bot Order: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bot Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-order-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
