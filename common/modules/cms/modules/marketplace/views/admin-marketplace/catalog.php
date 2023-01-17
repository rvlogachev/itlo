<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 24.06.2015
 */
/* @var $this yii\web\View */

/* @var $packageModel PackageModel */

use \skeeks\cms\marketplace\models\PackageModel;
use \skeeks\cms\models\CmsExtension;

$self = $this;

?>

<?php if ($code = \Yii::$app->request->get("code")) : ?>
    <div class="sx-box sx-p-10 sx-mb-10">

        <?php if ($packageModel = PackageModel::fetchByCode($code)) : ?>

            <?= $this->render('catalog-package', [
                'packageModel' => $packageModel
            ]) ?>

        <?php else: ?>
            <?= \Yii::t('skeeks/marketplace', 'The extension is not found') ?>
        <?php endif; ?>

    </div>
<?php else : ?>
    <?php $alert = \yii\bootstrap\Alert::begin([
        'options' => [
            'class' => 'alert-info',
        ]
    ]); ?>
    <p><?= \Yii::t('skeeks/marketplace', 'You can choose the suitable solution for your project and install it.') ?></p>
    <p><?= \Yii::t('skeeks/marketplace',
            'Future versions will be integrated {market} here. For now, simply click the link below.',
            ['market' => \Yii::t('skeeks/marketplace', 'Marketplace')]) ?></p>
    <?php $alert::end(); ?>

    <div class="sx-marketplace">
        <a href="https://cms.skeeks.com/marketplace" target="_blank">cms.SkeekS.com/marketplace</a>
        — <?= \Yii::t('skeeks/marketplace', 'catalog of available solutions') ?>
    </div>

    <?
    $this->registerCss(<<<CSS
.sx-marketplace
{
    text-align: center;
    font-size: 30px;
    color: #e74c3c;
}
    .sx-marketplace a
    {
        font-size: 30px;
        color: #e74c3c;
    }
CSS
    );
    ?>

<?php endif; ?>

