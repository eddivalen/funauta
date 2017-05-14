<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-lg-6">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-lg-6">
    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verification_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>
</div>
