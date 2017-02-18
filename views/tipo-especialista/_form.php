<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tipo;
use app\models\Especialista;

/* @var $this yii\web\View */
/* @var $model app\models\TipoEspecialista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-especialista-form">

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

</div>
