<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Conversation */

$this->title = 'Create Conversation';
$this->params['breadcrumbs'][] = ['label' => 'Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conversation-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
