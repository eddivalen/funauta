<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
?>
<h1>Reportes</h1>
<br>
<h4>Listado de todos los pagos para un periodo de fecha dado</h4>
<?=Html::a('Generar', ['/reporte/pagosperiodo'], ['class'=>'btn btn-primary']) ?>

<h4>Listado de los pacientes atendidos por terapista</h4>
<?=Html::a('Generar', ['/reporte/terapiaspaciente'], ['class'=>'btn btn-primary']) ?>

