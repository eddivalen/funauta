<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HisTerapiasPaciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="his-terapias-paciente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pte_cedula')->textInput() ?>

    <?= $form->field($model, 'hpa_id')->textInput() ?>

    <?= $form->field($model, 'tiempo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
