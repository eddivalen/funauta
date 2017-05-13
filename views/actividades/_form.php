<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="actividades-form">
	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'nombre_act')->textInput(['maxlength' => true])->label('Nombre') ?>

	<?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

	<div class="form-group">
	    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>

</div>
	