<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
?>
 
<h3><?= $msg ?></h3>
 
<h1>Recuperar Contraseña</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>
 
<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>  
</div>
 
<?= Html::submitButton("Recuperar Contraseña", ["class" => "btn btn-primary"]) ?>
 
<?php $form->end() ?>