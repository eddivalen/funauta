<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Paciente;
use app\models\Especialista;
use kartik\select2\Select2;
?>
<div class="paciente-evaluacion-form">
    <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>    
            <?=$form->field($model, 'fecha')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Introduce la fecha'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                ]
            ])->label('Fecha de Evaluación');?>
            

            <?= $form->field($model, 'pte_cedula')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Paciente::find()->all(),'cedula','cedula','fullName'),
            'language' => 'en',
            'options' => ['placeholder' => 'Elegir Paciente'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            ])->label('Cedula del Paciente')?>

            <?= $form->field($model, 'eta_cedula')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Especialista::find()->all(),'cedula','cedula','fullName'),
            'language' => 'en',
            'options' => ['placeholder' => 'Elegir Especialista'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            ])->label('Cedula del Especialista')?>

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
        
