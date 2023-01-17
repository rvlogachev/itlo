<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 28.08.2015
 */

/* @var $this yii\web\View */
/* @var $model \skeeks\cms\shop\models\ShopOrder */
?>

<?php if ($model->paid_at) : ?>
<a href="#" data-toggle="modal" data-target="#sx-payment-container-close" class="btn btn-primary">Изменить<a>
<?php else : ?>
<a href="#" data-toggle="modal" data-target="#sx-payment-container" class="btn btn-primary">Отметить оплату<a>
<?php endif; ?>

