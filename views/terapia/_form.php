<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
 <div class="terapia-form"> 
	<div class="col-lg-8">
		    <?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>
		    <?php ActiveForm::end(); ?>
	</div>
</div>
			
