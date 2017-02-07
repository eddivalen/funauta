<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NucleoFamiliar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nucleo-familiar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'madre')->textInput() ?>

    <?= $form->field($model, 'padre')->textInput() ?>

    <?= $form->field($model, 'compmadre')->textInput() ?>

    <?= $form->field($model, 'comppadre')->textInput() ?>

    <?= $form->field($model, 'hermanos')->textInput() ?>

    <?= $form->field($model, 'hermanas')->textInput() ?>

    <?= $form->field($model, 'tias')->textInput() ?>

    <?= $form->field($model, 'tios')->textInput() ?>

    <?= $form->field($model, 'abuelo')->textInput() ?>

    <?= $form->field($model, 'otros')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
