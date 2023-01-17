



<?php  $form = \kartik\form\ActiveForm::begin(); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->field($model, 'screen')->dropDownList(\yii\helpers\ArrayHelper::map(\common\modules\bot\models\BotScreens::find()->all(),'id','title'),['prompt'=>'Выберите экран']) ?>

<?php echo $form->field($model, 'users')->checkboxList(
   $arr,['item'=>function ($index, $label, $name, $checked, $value) {
        return '<div class="col-md-6">' . \yii\helpers\Html::checkbox($name, $checked, ['label' => $label, 'value' => $value]) . '</div>';
    }]
)->label('Какие планеты по вашему мнению обитаемы?');?>



<div class="pull-right">
    <div class="form-group">
        <?php echo \yii\helpers\Html::submitButton( 'Отправить', ['class' =>   'btn btn-primary'  ]) ?>
    </div>
</div>


<?php \kartik\form\ActiveForm::end(); ?>