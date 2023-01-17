<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Conversation */

$this->title = 'Update Conversation: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conversation-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
