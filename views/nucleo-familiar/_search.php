<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NucleoFamiliarSerch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nucleo-familiar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'madre') ?>

    <?= $form->field($model, 'padre') ?>

    <?= $form->field($model, 'compmadre') ?>

    <?= $form->field($model, 'comppadre') ?>

    <?php // echo $form->field($model, 'hermanos') ?>

    <?php // echo $form->field($model, 'hermanas') ?>

    <?php // echo $form->field($model, 'tias') ?>

    <?php // echo $form->field($model, 'tios') ?>

    <?php // echo $form->field($model, 'abuelo') ?>

    <?php // echo $form->field($model, 'otros') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
