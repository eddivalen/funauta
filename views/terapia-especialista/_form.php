<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Terapia;
use app\models\Especialista;
use app\models\Paciente;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de asignar terapia a especialista
            </div>
                <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                        <form role="form">
                        <!--<div class="terapia-especialista-form">-->
                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'tpa_id')->dropDownList(
                                ArrayHelper::map(Terapia::find()->all(), 'id', 'descripcion'),
                                ['prompt'=>'Elegir Terapia']
                            )->label('ID de Terapia')?>

                        	<?= $form->field($model, 'pte_cedula')->dropDownList(
                                ArrayHelper::map(Paciente::find()->all(), 'cedula', 'cedula'),
                                ['prompt'=>'Elegir Paciente']
                            )->label('Cedula del Paciente')?>

                            <?= $form->field($model, 'eta_cedula')->dropDownList(
                                ArrayHelper::map(Especialista::find()->all(), 'cedula', 'cedula'),
                                ['prompt'=>'Elegir Especialista']
                            )->label('Cedula del Especialista')?>

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
<!--</div>-->
