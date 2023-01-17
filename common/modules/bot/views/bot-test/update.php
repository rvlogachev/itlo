<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotTest */

$this->title = 'Update Bot Test: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bot Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bot-test-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
