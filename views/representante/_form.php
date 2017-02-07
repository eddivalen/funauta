<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\NivelSocioeconomico;

/* @var $this yii\web\View */
/* @var $model app\models\Representante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="representante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nacionalidad')->dropDownList([ 'V' => 'V', 'E' => 'E', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'edo_civil')->dropDownList([ 'S' => 'S', 'C' => 'C', 'V' => 'V', 'D' => 'D', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_local')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'empresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario_trabajo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disponibilidad')->dropDownList([ 'SI' => 'SI', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nvo_id')->dropDownList(
        ArrayHelper::map(NivelSocioeconomico::find()->all(),'id','vivienda', 'ingresos'),
        ['prompt'=>'Elegir Actividad']
    )?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
