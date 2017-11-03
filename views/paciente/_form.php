<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\NucleoFamiliar;
use kartik\select2\Select2;
use app\models\Representante;
use app\models\Institucion;
use kartik\date\DatePicker;
?>
 <div class="paciente-form"> 
    <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'cedula')->textInput() ?>

            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

           <?=$form->field($model, 'fecha_nacimiento')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Introduce la fecha'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                ]
            ])->label('Fecha de nacimiento');?>

            <?= $form->field($model, 'lugar_nacimiento')->textInput(['maxlength' => true])->label('Lugar de nacimiento') ?>
    </div> 
    <div class="col-lg-6"> 
            <?= $form->field($model, 'edad')->textInput() ?>

            <?= $form->field($model, 'sexo')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'rte_cedula')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Representante::find()->all(),'cedula','cedula','fullName'),
                'language' => 'en',
                'options' => ['placeholder' => 'Elegir Cedula'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Cedula Representante')?>

            <?= $form->field($model, 'ico_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Institucion::find()->all(),'id','nombre'),
                'language' => 'en',
                'options' => ['placeholder' => 'Elegir institución'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Institución')?>

            <?= $form->field($model, 'nca_id')->dropDownList(
                ArrayHelper::map(NucleoFamiliar::find()->all(), 'id', 'id'),
                ['prompt'=>'Elegir Nucleo Familiar']
            )->label('ID de Nucleo Familiar')?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>
    