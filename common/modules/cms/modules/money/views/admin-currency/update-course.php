<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\Game */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<?php \common\modules\cms\modules\admin\widgets\ActiveForm::begin([
    'method' => 'post'
]); ?>
    <p><?= \Yii::t('skeeks/money', 'Get data from the Central Bank of Russia') ?></p>
    <button class="btn btn-primary"><?= \Yii::t('skeeks/money', 'Get data') ?></button>
<?php \common\modules\cms\modules\admin\widgets\ActiveForm::end(); ?>