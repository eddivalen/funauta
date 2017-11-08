<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Registrarse';
?>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    'method' => 'post',
 'id' => 'formulario',
 'enableClientValidation' => false,
 'enableAjaxValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "username")->input("text")->label('Nombre de usuario') ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "email")->input("email")->label('Correo electrónico') ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password")->label('Contraseña') ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password")->label('Repetir contraseña') ?>   
</div>

<?= Html::submitButton("Registrarse", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>