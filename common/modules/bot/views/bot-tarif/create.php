<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotTarif */

$this->title = 'Create Bot Tarif';
$this->params['breadcrumbs'][] = ['label' => 'Bot Tarifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-tarif-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
