<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use app\models\Paciente;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteEvaluacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-evaluacion-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'fecha')->widget(
    DatePicker::className(), [
        'inline' => false, 
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->label('Fecha de Evaluacion')?>
    <?= $form->field($model, 'pte_cedula')->dropDownList(
        ArrayHelper::map(Paciente::find()->all(), 'cedula', 'cedula'),
        ['prompt'=>'Elegir Paciente']
    )->label('Cedula del Paciente')?>

    <?= $form->field($model, 'motivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
