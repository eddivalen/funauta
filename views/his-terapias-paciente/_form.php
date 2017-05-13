<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Paciente;
?>
<div class="his-terapias-paciente-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pte_cedula')->dropDownList(
    	ArrayHelper::map(Paciente::find()->all(), 'cedula', 'cedula'),
    	['prompt'=>'Elegir Cedula']
    )->label('Cedula del Paciente')?>

    <?= $form->field($model, 'tiempo')->textInput(['maxlength' => true],['placeholder' => 'Ej: 2 meses']) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

