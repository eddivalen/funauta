<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="especialista-form">
            <div class="col-lg-6">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'cedula')->textInput() ?>

                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
</div>

