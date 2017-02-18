<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Institucion;
use kartik\select2\Select2;
use app\models\Representante;
use app\models\NucleoFamiliar;

/* @var $this yii\web\View */
/* @var $paciente app\pacientes\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($paciente, 'cedula')->textInput() ?>

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

    <p>Nucleo familiar</p>

    <?= $form->field($nucleo_fam, 'madre')->textInput() ?>

    <?= $form->field($nucleo_fam, 'padre')->textInput() ?>

    <?= $form->field($nucleo_fam, 'compmadre')->textInput() ?>

    <?= $form->field($nucleo_fam, 'comppadre')->textInput() ?>

    <?= $form->field($nucleo_fam, 'hermanos')->textInput() ?>

    <?= $form->field($nucleo_fam, 'hermanas')->textInput() ?>

    <?= $form->field($nucleo_fam, 'tias')->textInput() ?>

    <?= $form->field($nucleo_fam, 'tios')->textInput() ?>

    <?= $form->field($nucleo_fam, 'abuelo')->textInput() ?>

    <?= $form->field($nucleo_fam, 'otros')->textInput() ?>

    <?= $form->field($nucleo_fam, 'descripcion')->textInput(['maxlength' => true]) ?>

    <p>Historial de terapias que el paciente ha tenido</p>
    
    <?= $form->field($hisTerapias, 'tiempo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($hisTerapias, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($paciente->isNewRecord ? 'Inscribir' : 'Actualizar', ['class' => $paciente->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
