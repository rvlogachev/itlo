<?php

/**
 * @var yii\web\View $this
 * @var common\models\MedCompany $model
 */

$this->title = Yii::t('backend', 'Добавление компании');
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="med-company-create">

	<?php echo $this->render('_form', [
		'model' => $model,

	]) ?>

</div>
