<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!-- <div class="medicamento-form"> -->
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
        	<div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de medicamentos
            </div>
            	<div class="panel-body">
            	<div class="row">
            		<div class="col-lg-8">
                    	<form role="form">
						    <?php $form = ActiveForm::begin(); ?>

						    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

						    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

						    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

						    <div class="form-group">
						        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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

<!-- </div> -->
