<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Institucion;

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
        // inline too, not bad
        'inline' => false, 
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]);?>

    <?= $form->field($paciente, 'lugar_nacimiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($paciente, 'edad')->textInput() ?>

    <?= $form->field($paciente, 'sexo')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>

    <?= $form->field($paciente, 'rte_cedula')->textInput() ?>

    <?= $form->field($institucion, 'id')->dropDownList(
        ArrayHelper::map(Institucion::find()->all(), 'id', 'nombre'),
        ['prompt'=>'Elegir Institucion']
    )?>

    <div class="form-group">
        <?= Html::submitButton($paciente->isNewRecord ? 'Create' : 'Update', ['class' => $paciente->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
