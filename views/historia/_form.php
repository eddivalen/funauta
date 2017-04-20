<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tratamiento;
use app\models\Terapia;
use app\models\Especialista;
use dosamigos\datepicker\DatePicker;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de historia
            </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
    <!--<div class="historia-form">-->
                            <?php $form = ActiveForm::begin(); ?>
                            <?= $form->field($model, 'fecha')->widget(
                            DatePicker::className(), [
                                // inline too, not bad
                                'inline' => false, 
                                // modify template for custom rendering
                                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd'
                                ]
                            ]);?>

                            <?= $form->field($model, 'observaciones')->textarea(['rows' => '4']) ?>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form role="form">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--</div>-->
