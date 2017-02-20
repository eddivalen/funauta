<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Institucion;
use kartik\select2\Select2;
use app\models\Representante;
use app\models\NucleoFamiliar;
use p2made\helpers\FA;

p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $paciente app\pacientes\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Formulario de Inscripción
                </div>
                <div class="panel-body">
                    <div class="row">
                    <div class="col-lg-6">
                    <form role="form">
                       <!-- <div class="paciente-form">-->

                        <?php $form = ActiveForm::begin(); ?>
                        <div class="form-group">
                        <?= $form->field($paciente, 'cedula')->textInput() ?>
                        </div>
                        <?= $form->field($paciente, 'nombre')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($paciente, 'apellido')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($paciente, 'fecha_nacimiento')->widget(
                        DatePicker::className(), [
                            'inline' => false, 
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ])->label('Fecha de Nacimiento')?>

                        <?= $form->field($paciente, 'lugar_nacimiento')->textInput(['maxlength' => true])->label('Lugar de Nacimiento') ?>

                        <?= $form->field($paciente, 'edad')->textInput() ?>

                        <?= $form->field($paciente, 'sexo')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>
                        </form>
                        </div>
                        <div class="col-lg-6">

                        <?= $form->field($paciente, 'rte_cedula')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Representante::find()->all(),'cedula','cedula'),
                            'language' => 'en',
                            'options' => ['placeholder' => 'Elegir Cedula'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label('Cedula Representante')?>

                        <?= $form->field($paciente, 'ico_id')->dropDownList(
                            ArrayHelper::map(Institucion::find()->all(), 'id', 'nombre'),
                            ['prompt'=>'Elegir Institucion']
                        )->label('Institucion')?>

                        <h1>Nucleo Familiar</h1>
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                            <?= $form->field($nucleo_fam, 'madre')->textInput() ?>
                            </div>
                            <div class="col-lg-3">
                            <?= $form->field($nucleo_fam, 'padre')->textInput() ?>
                            </div>
                            <div class="col-lg-3">
                            <?= $form->field($nucleo_fam, 'compmadre')->textInput() ?>
                            </div>
                            <div class="col-lg-3">
                            <?= $form->field($nucleo_fam, 'comppadre')->textInput() ?>
                            </div>
                           
                            <div class="col-lg-3">
                            <?= $form->field($nucleo_fam, 'hermanos')->textInput() ?>
                            </div>
                            <div class="col-lg-3">
                            <?= $form->field($nucleo_fam, 'hermanas')->textInput() ?>
                            </div>
                            <div class="col-lg-3">
                            <?= $form->field($nucleo_fam, 'tias')->textInput() ?>
                            </div>
                            <div class="col-lg-3">
                             <?= $form->field($nucleo_fam, 'tios')->textInput() ?>
                            </div>

                            <div class="col-lg-3">
                             <?= $form->field($nucleo_fam, 'abuelo')->textInput() ?>
                            </div>
                            <div class="col-lg-3">
                            <?= $form->field($nucleo_fam, 'otros')->textInput() ?>
                            </div>
                            <div class="col-lg-3">
                             <?= $form->field($nucleo_fam, 'descripcion')->textInput(['maxlength' => true]) ?>
                            </div>
                         </div>
                                                                                                                           
                                                                    
                        <p>Historial de terapias que el paciente ha tenido</p>

                        <?= $form->field($hisTerapias, 'tiempo')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($hisTerapias, 'descripcion')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton($paciente->isNewRecord ? 'Inscribir' : 'Actualizar', ['class' => $paciente->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>