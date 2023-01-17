<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ReadNews */

$this->title = 'Create Read News';
$this->params['breadcrumbs'][] = ['label' => 'Read News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-news-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
