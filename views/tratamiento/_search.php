<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\TratamientoSerch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tratamiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre_tratamiento') ?>

    <?= $form->field($model, 'indicaciones') ?>

    <?= $form->field($model, 'dosis') ?>

    <?= $form->field($model, 'posologia') ?>

    <?= $form->field($model, 'mto_id') ?>

    <?= $form->field($model, 'pte_cedula') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
