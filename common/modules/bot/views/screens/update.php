<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Screens */

$this->title = 'Редактирование экрана: ' .   $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Экраны', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="screens-update">

                <?php echo $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</section>


