<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaEspecialista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terapia-especialista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tpa_id')->textInput() ?>

    <?= $form->field($model, 'eta_cedula')->textInput() ?>

    <?= $form->field($model, 'pte_cedula')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
