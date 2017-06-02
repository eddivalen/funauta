<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Paciente;
use app\models\Especialista;
?>
<div class="paciente-evaluacion-form">
    <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>    
            <?=$form->field($model, 'fecha')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Introduce la fecha'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                ]
            ])->label('Fecha de Evaluación');?>
            
            <?= $form->field($model, 'pte_cedula')->dropDownList(
                ArrayHelper::map(Paciente::find()->all(), 'cedula', 'cedula'),
                ['prompt'=>'Elegir Paciente']
            )->label('Cedula del Paciente')?>
            <?= $form->field($model, 'eta_cedula')->dropDownList(
                ArrayHelper::map(Especialista::find()->all(), 'cedula', 'cedula'),
                ['prompt'=>'Elegir Especialista']
            )->label('Cedula del Especialista')?>
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
        
