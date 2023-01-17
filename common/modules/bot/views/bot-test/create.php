<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\bot\models\BotTest */

$this->title = 'Create Bot Test';
$this->params['breadcrumbs'][] = ['label' => 'Bot Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bot-test-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
