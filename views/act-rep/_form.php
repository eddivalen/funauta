<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Actividades;
use app\models\Representante;
use kartik\select2\Select2;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de asignación de actividades
            </div>
                <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                        <form role="form">
                        <!--<div class="act-rep-form">-->
                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'ate_id')->dropDownList(
                            	ArrayHelper::map(Actividades::find()->all(), 'id', 'nombre_act'),
                            	['prompt'=>'Elegir Actividad']
                            )->label('Actividad')?>

                            <?= $form->field($model, 'rte_cedula')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Representante::find()->all(),'cedula','cedula'),
                                'language' => 'en',
                                'options' => ['placeholder' => 'Elegir Cedula'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])->label('Cedula Representante')?>

                            <div class="form-group">
                                <?= Html::submitButton($model->isNewRecord ? 'Asignar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
