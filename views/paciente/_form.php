<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\NucleoFamiliar;
use kartik\select2\Select2;
use app\models\Representante;
use app\models\Institucion;
?>
<!-- <div class="paciente-form"> -->
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de los pacientes
            </div>
                <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form">
                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'cedula')->textInput() ?>

                            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'fecha_nacimiento')->widget(
                            DatePicker::className(), [
                                'inline' => false, 
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd'
                                ]
                            ]);?>

                            <?= $form->field($model, 'lugar_nacimiento')->textInput(['maxlength' => true])->label('Lugar de Nacimiento') ?>
                        </form>
                    </div> 
                    <div class="col-lg-6">
                        <form role="form">   
                            <?= $form->field($model, 'edad')->textInput() ?>

                            <?= $form->field($model, 'sexo')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>

                            <?= $form->field($model, 'rte_cedula')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Representante::find()->all(),'cedula','cedula'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Elegir Cedula'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])->label('Cedula Representante')?>

                            <?= $form->field($model, 'ico_id')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Institucion::find()->all(),'id','nombre'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Elegir institución'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])->label('Institución')?>

                            <?= $form->field($model, 'nca_id')->dropDownList(
                                ArrayHelper::map(NucleoFamiliar::find()->all(), 'id', 'id'),
                                ['prompt'=>'Elegir Nucleo Familiar']
                            )->label('ID de Nucleo Familiar')?>

                            <div class="form-group">
                                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
