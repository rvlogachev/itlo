<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotOrder */

$this->title = 'Create Bot Order';
$this->params['breadcrumbs'][] = ['label' => 'Bot Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-order-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
