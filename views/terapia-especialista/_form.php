<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Terapia;
use app\models\Especialista;
use app\models\Paciente;
?>
<div class="terapia-especialista-form">
    <div class="col-lg-8">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tpa_id')->dropDownList(
            ArrayHelper::map(Terapia::find()->all(), 'id', 'descripcion'),
            ['prompt'=>'Elegir Terapia']
        )->label('Terapia')?>

    	<?= $form->field($model, 'pte_cedula')->dropDownList(
            ArrayHelper::map(Paciente::find()->all(), 'cedula', 'cedula','apellido'),
            ['prompt'=>'Elegir Paciente']
        )->label('Paciente')?>

        <?= $form->field($model, 'eta_cedula')->dropDownList(
            ArrayHelper::map(Especialista::find()->all(), 'cedula', 'cedula','apellido'),
            ['prompt'=>'Elegir Especialista']
        )->label('Especialista')?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Asignar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
              
