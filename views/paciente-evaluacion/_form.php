<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use app\models\Paciente;
?>
<div class="paciente-evaluacion-form">
    <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>
        	
        	<?= $form->field($model, 'fecha')->widget(
            DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label('Fecha de Evaluacion')?>
            <?= $form->field($model, 'pte_cedula')->dropDownList(
                ArrayHelper::map(Paciente::find()->all(), 'cedula', 'cedula'),
                ['prompt'=>'Elegir Paciente']
            )->label('Cedula del Paciente')?>
    </div>
    <div class="col-lg-6">
            <?= $form->field($model, 'motivo')->textarea(['rows' => '4']) ?>

            <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>
        
