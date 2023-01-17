<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\MedSettings $model
 */

$this->title =Yii::t('backend', 'Настройки');
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];

?>
<div class="med-settings-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--            --><?php //echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
//                'class' => 'btn btn-danger',
//                'data' => [
//                    'confirm' => 'Вы действительно хотите удалить элемент?',
//                    'method' => 'post',
//                ],
//            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [

                    'reference_temp_ot',
                    'reference_temp_do',
                    'reference_bpp_up_ot',
                    'reference_bpp_up_do',
                    'reference_bpp_lower_ot',
                    'reference_bpp_lower_do',
                    'reference_bpp_pulse_ot',
                    'reference_bpp_pulse_do',
                    'reference_alco_ot',
                    'reference_alco_do',
                    'rate:currency',
                    'all_phone',
                    'printer_count',
                ],
            ]) ?>
        </div>
    </div>
</div>
