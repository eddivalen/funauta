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
 <?= $form->field($model, "username")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password") ?>   
</div>

<?= Html::submitButton("Registrarse", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>