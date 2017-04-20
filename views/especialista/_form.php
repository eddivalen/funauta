<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de evaluación del paciente
            </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
<!-- <div class="especialista-form"> -->

                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'cedula')->textInput() ?>

                            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form role="form">
                            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

                            <div class="form-group">
                                <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
