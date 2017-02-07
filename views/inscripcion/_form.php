<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $institucionForm->errorSummary($form); ?>

    <fieldset>
        <legend>Institucion</legend>
        <?= $form->field($institucionForm->institucion, 'nombre')->textInput() ?>
    </fieldset>

    <fieldset>
        <legend>Paciente</legend>
        <?= $form->field($institucionForm->paciente, 'nombre')->textInput() ?>
        <?= $form->field($institucionForm->paciente, 'apellido')->textInput() ?>
    </fieldset>

    <?= Html::submitButton('Save'); ?>
    <?php ActiveForm::end(); ?>

</div>

