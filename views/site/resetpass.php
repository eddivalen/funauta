<?php
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Reiniciar contraseña';
?>
 
<h3><?= $msg ?></h3>
 
<h1>Resetear Contraseña</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>

<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>  
</div>
 
<div class="form-group">
 <?= $form->field($model, "password")->input("password") ?>  
</div>
 
<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password") ?>  
</div>

<div class="form-group">
 <?= $form->field($model, "verification_code")->input("text") ?>  
</div>

<div class="form-group">
 <?= $form->field($model, "recover")->input("hidden")->label(false) ?>  
</div>
 
<?= Html::submitButton("Resetear Contraseña", ["class" => "btn btn-primary"]) ?>
 
<?php $form->end() ?>