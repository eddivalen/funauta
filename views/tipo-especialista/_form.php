<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoEspecialista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-especialista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eta_cedula')->textInput() ?>

    <?= $form->field($model, 'tpo_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
