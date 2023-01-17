<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\cms\models\AuthItem */

?>
<div class="auth-item-update">

    <!--<h1><?php /*= Html::encode($this->title) */ ?></h1>-->
    <?php
    echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>
