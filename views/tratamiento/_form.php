<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Medicamento;
use app\models\Paciente;

/* @var $this yii\web\View */
/* @var $model app\models\Tratamiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tratamiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mto_id')->dropDownList(
    	ArrayHelper::map(Medicamento::find()->all(), 'id', 'nombre'),
    	['prompt'=>'Elegir Medicamento']
    )->label('Medicamento')?>
    <?= $form->field($model, 'pte_cedula')->dropDownList(
        ArrayHelper::map(Paciente::find()->all(), 'cedula', 'nombre','cedula'),
        ['prompt'=>'Elegir Paciente']
    )->label('Nombre del paciente')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
