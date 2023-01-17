<?php
$class = '';


//print_r(\Yii::$app->cms->getCurrentTree());
//die;


//if (\Yii::$app->cms->getCurrentTree()->id == $model->id)
//{
    $class = 'active';
//}
?>
<li><a href="<?= $model->url; ?>" title="<?= $model->name; ?>"><?= $model->name; ?></a></li>