<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tipo;
use app\models\Especialista;
?>

<!-- <div class="tipo-especialista-form"> -->
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de asignar especialidad
            </div>
                <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                        <form role="form">
                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'eta_cedula')->dropDownList(
                                ArrayHelper::map(Especialista::find()->all(), 'cedula', 'cedula'),
                                ['prompt'=>'Elegir Cedula']
                            )->label('Cedula Especialista')?>

                            <?= $form->field($model, 'tpo_id')->dropDownList(
                                ArrayHelper::map(Tipo::find()->all(), 'id', 'descripcion'),
                                ['prompt'=>'Elegir Especialidad']
                            )->label('Especialidad')?>

                            <div class="form-group">
                                <?= Html::submitButton($model->isNewRecord ? 'Asignar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
