<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Representante;
use app\models\MensualidadMeses;
use p2made\helpers\FA;
use kartik\select2\Select2;
use kartik\field\FieldRange;
/* @var $this yii\web\View */
/* @var $model app\models\Mensualidad */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mensualidad-form">
	<div class="col-lg-6">
	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($mensualidad, 'id_pago')->textInput(['maxlength' => true]) ?>

	    <?=$form->field($mensualidad, 'fecha')->widget(DatePicker::classname(), [
	            'options' => ['placeholder' => 'Introduce la fecha'],
	            'pluginOptions' => [
	                'autoclose'=>true,
	                'format' => 'yyyy-mm-dd',
	                'todayHighlight' => true
	                ]
	            ])->label('Fecha del pago');?>

	    <?= $form->field($mensualidad, 'banco')->dropDownList([ 
		'Banco de Venezuela' => 'Banco de Venezuela', 
		'Banco Bicentenario' => 'Banco Bicentenario', 
		'Banesco'            => 'Banesco', 
		'BOD' => 'BOD', 
		'BBVA Provincial' => 'BBVA Provincial', 
		'Banco Sofitasa' => 'Banco Sofitasa',
		'Banco Mercantil' => 'Banco Mercantil', 
		'Banco Exterior' => 'Banco Exterior', 
		'BNC' => 'BNC', 
		'Banco Fondo Común' => 'Banco Fondo Común',
		'Banco Activo' => 'Banco Activo',
		'100% Banco' => '100% Banco',
		],['prompt'           => 'Seleccione el banco']) ?> 
	</div>
	<div class="col-lg-6">
	    

	    <?= $form->field($mensualidad, 'rte_cedula')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Representante::find()->all(),'cedula','cedula','fullName'),
        'language' => 'en',
        'options' => ['placeholder' => 'Elegir cedula representante'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    	])->label('Cedula Representante')?>
	

	    <?=$form->field($mensualidad_meses, 'mes')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Elige el mes'],
            'pluginOptions' => [
                'autoclose'=>true,
                'minViewMode'=>'months',
                'format' => 'yyyy-mm-dd',
               // 'multidate' => true,
        		//'multidateSeparator' => ' ; ',
                ]
            ])->label('Mes de pago');?>
	            
	    <?= $form->field($mensualidad, 'monto')->textInput() ?>

	    <div class="form-group">
	        <?= Html::submitButton($mensualidad->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $mensualidad->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
	</div>
</div>
