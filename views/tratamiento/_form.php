<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Medicamento;
use app\models\Paciente;
use kartik\select2\Select2;
?>
<div class="tratamiento-form"> 
    <div class="col-lg-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nombre_tratamiento')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'indicaciones')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dosis')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-6">
     <?= $form->field($model, 'posologia')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mto_id')->dropDownList(
            ArrayHelper::map(Medicamento::find()->all(), 'id', 'nombre'),
            ['prompt'=>'Elegir Medicamento']
        )->label('Medicamento')?>
        

         <?= $form->field($model, 'pte_cedula')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Paciente::find()->all(),'cedula','cedula','fullName'),
                'language' => 'es',
                'options' => ['placeholder' => 'Elegir Paciente'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Cedula del Paciente')?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>