<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
?>
<div class="representante-form">
    <div class="col-lg-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'cedula')->textInput() ?>

        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nacionalidad')->dropDownList([ 'V' => 'Venezolana', 'E' => 'Extranjera', ], ['prompt' => 'Seleccione nacionalidad']) ?>

        <?= $form->field($model, 'edad')->textInput() ?>

        <?= $form->field($model, 'edo_civil')->dropDownList([ 'S' => 'Soltero', 'C' => 'Casado', 'V' => 'Viudo', 'D' => 'Divorciado', ], ['prompt' => 'Seleccione Estado civil'])->label('Estado civil') ?>

        <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telefono_local')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-6">
            <?= $form->field($model, 'telefono_celular')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'empresa')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'horario_trabajo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'actividad')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'disponibilidad')->dropDownList([ 'Si' => 'Si', 'No' => 'No', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'nivel_socioeconomico')->dropDownList([ 'BAJA' => 'BAJA', 'MEDIA' => 'MEDIA', 'ALTA' => 'ALTA', ], ['prompt' => '']) ?>
            
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
</div>