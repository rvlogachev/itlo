<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\MedTerminals $model
 */

$this->title = 'Терминалы просмотр';
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Терминалы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-terminals-view">
    <div class="card">
        <div class="card-header">
					<div class="float-right">
	          <?php echo Html::a('К списку терминалов', ['index'], ['class' => 'btn btn-primary']) ?>
					</div>
            <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Вы действительно хотите удалить элемент?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'terminal_id',

                    'adderss:ntext',
                    'fio',

                    'phone',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
