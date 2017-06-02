<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Medicamento;
use app\models\Paciente;
?>
<div class="tratamiento-form"> 
    <div class="col-lg-8">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'indicaciones')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'dosis')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'posologia')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mto_id')->dropDownList(
            ArrayHelper::map(Medicamento::find()->all(), 'id', 'nombre'),
            ['prompt'=>'Elegir Medicamento']
        )->label('Medicamento')?>
        <?= $form->field($model, 'pte_cedula')->dropDownList(
            ArrayHelper::map(Paciente::find()->all(), 'cedula', 'nombre','cedula'),
            ['prompt'=>'Elegir Paciente']
        )->label('Nombre del paciente')?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>