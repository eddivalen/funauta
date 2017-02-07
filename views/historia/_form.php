<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tratamiento;
use app\models\Terapia;
use app\models\Especialista;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Historia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->widget(
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

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tto_id')->dropDownList(
        ArrayHelper::map(Tratamiento::find()->all(), 'id', 'descripcion'),
        ['prompt'=>'Elegir Tratamiento']
    )->label('Tratamiento')?>

    <?= $form->field($model, 'tta_tpa_id')->dropDownList(
        ArrayHelper::map(Terapia::find()->all(), 'id', 'descripcion'),
        ['prompt'=>'Elegir Terapia']
    )->label('Terapia')?>
    
    <?= $form->field($model, 'tta_eta_cedula')->dropDownList(
        ArrayHelper::map(Especialista::find()->all(), 'cedula', 'nombre'),
        ['prompt'=>'Elegir Especialista']
    )->label('Especialista')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
