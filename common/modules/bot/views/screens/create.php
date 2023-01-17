<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Screens */

$this->title = 'Добавление экрана';
$this->params['breadcrumbs'][] = ['label' => 'Экраны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="screens-create">

                <?php echo $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>

        </div>
    </div>
</section>



