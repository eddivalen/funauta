<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tratamiento;
use app\models\Terapia;
use app\models\Especialista;
use kartik\date\DatePicker;
?>
<div class="historia-form">
    <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>
            <?=$form->field($model, 'fecha')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Introduce la fecha'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        <?= $form->field($model, 'observaciones')->textarea(['rows' => '4']) ?>
    </div>
    <div class="col-lg-6">
            <?= $form->field($model, 'tto_id')->dropDownList(
                ArrayHelper::map(Tratamiento::find()->all(), 'id', 'descripcion'),
                ['prompt'=>'Elegir Tratamiento']
            )->label('Tratamiento')?>

            <?= $form->field($model, 'tta_tpa_id')->dropDownList(
                ArrayHelper::map(Terapia::find()->all(), 'id', 'descripcion'),
                ['prompt'=>'Elegir Terapia']
            )->label('Terapia')?>
            
            <?= $form->field($model, 'tta_eta_cedula')->dropDownList(
                ArrayHelper::map(Especialista::find()->all(), 'cedula', 'nombre'),
                ['prompt'=>'Elegir Especialista']
            )->label('Especialista')?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>
             