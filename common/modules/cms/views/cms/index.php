<?php
/**
 * @author Logachev Roman <rlogachev@itlo.ru>
 * @link http://itlo.ru/
 * @copyright 2021 ITLO (CMS)
 * @date 17.11.2021
 */
/* @var $this yii\web\View */
$this->title = 'Система управления сайтом: ITLO CMS';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="card">
    <div class="card-header">
        <h3 class="card-title">Система управления сайтом: <?= \yii\helpers\Html::a("ITLO CMS", \Yii::$app->cms->descriptor->homepage, [
                'target' => '_blank'
            ]); ?></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        Template Block for admin backend views.
        <br>
        This system developed by Roman Logachev <a href="https://itlo.ru/docs" target="_blank" rel="noopener noreferrer">ITLO Official Docs</a> in Online.
        <br><br>
        Start creating your wonderfull travelling to crypto earth with CryptoParrot!
    </div>
    <!-- /.card-body -->
    <div class="card-footer" style="display: block;">
        <p>@author <?= \yii\helpers\Html::a("ITLO", "https://itlo.ru", [
                'target' => '_blank'
            ]); ?></p>
    </div>
    <!-- /.card-footer-->
</div>


