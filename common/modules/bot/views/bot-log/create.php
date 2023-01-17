<?php

use common\components\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotLog */

$this->title = 'Create Bot Log';
$this->params['breadcrumbs'][] = ['label' => 'Bot Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-log-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
