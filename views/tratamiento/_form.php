<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Medicamento;

/* @var $this yii\web\View */
/* @var $model app\models\Tratamiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tratamiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mto_id')->dropDownList(
    	ArrayHelper::map(Medicamento::find()->all(), 'id', 'nombre'),
    	['prompt'=>'Elegir Medicamento']
    )?>

    <?= $form->field($model, 'pte_cedula')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
