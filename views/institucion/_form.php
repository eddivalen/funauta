<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!-- <div class="institucion-form"> -->
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
        	<div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de instituciones
            </div>
            	<div class="panel-body">
            	<div class="row">
            		<div class="col-lg-8">
                    	<form role="form">
						    <?php $form = ActiveForm::begin(); ?>

						    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

						    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

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
