<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Buttons */

$this->title = 'Create Buttons';
$this->params['breadcrumbs'][] = ['label' => 'Buttons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buttons-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
