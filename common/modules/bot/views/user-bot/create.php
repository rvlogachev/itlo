<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Userbot */

$this->title = 'Create Userbot';
$this->params['breadcrumbs'][] = ['label' => 'Userbots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userbot-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
