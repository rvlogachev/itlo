<?php
/* @var $this yii\web\View */
/* @var $rootViewFile string */
/* @var $model \common\modules\cms\models\forms\ViewFileEditModel */
$this->registerCss(<<<CSS
.CodeMirror
{
    height: auto;
}
CSS
)
?>


<?php $form =   \common\modules\cms\modules\admin\widgets\form\ActiveFormStyled::begin([
    'useAjaxSubmit' => true,
    'usePjax' => false,
    'enableAjaxValidation' => false
]); ?>

<?= $form->field($model, 'source')->label($model->rootViewFile)->widget(
    common\modules\cms\modules\codemirror\CodemirrorWidget::className(),
    [
        'preset' => 'htmlmixed',
        'assets' =>
            [
                common\modules\cms\modules\codemirror\CodemirrorAsset::THEME_NIGHT
            ],
        'clientOptions' =>
            [
                'theme' => 'night'
            ],
        'options' => ['rows' => 40],
    ]
); ?>

<?= $form->buttonsStandart($model); ?>

<?php common\modules\cms\modules\admin\widgets\form\ActiveFormStyled::end(); ?>
