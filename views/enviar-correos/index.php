<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Enviar Correos';
$this->params['breadcrumbs'][] = ['label' => 'Envio de Correos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h4>Enviar correos</h4>






