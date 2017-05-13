<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="institucion-form"> 
	<div class="col-lg-8">
		    <?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
		    <?php ActiveForm::end(); ?>
	</div>
</div>

