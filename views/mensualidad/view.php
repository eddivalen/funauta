<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\MensualidadMeses;
use yii\grid\GridView;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Mensualidad */
$this->title = $mensualidad->id_pago;
$this->params['breadcrumbs'][] = ['label' => 'Mensualidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensualidad-view">
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $mensualidad->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $mensualidad->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $mensualidad,
        'attributes' => [
            'id_pago',
            'fecha',
            'banco',
            [
                'attribute'=>'rte_cedula',
                'value'=>$mensualidad->rteCedula->cedula,
                'label'=>'Cedula Representante',
            ], 
            [
                'value'=>$mensualidad->rteCedula->nombre.' '.$mensualidad->rteCedula->apellido,
                'label'=>'Representante',
            ],
        ],
    ]) ?>
    <h3>Pago</h3>
     <?= DetailView::widget([
        'model' => $mensualidad_meses,
        'attributes' => [
            [
                'attribute'=>'mss_id',
                'value'=>$mensualidad_meses->mss->mes,
                'label'=>'Mes',
            ],
            [
                'value'=>$mensualidad_meses->mss->anio,
                'label'=>'Año',
            ],
            'monto',
        ],
    ]) ?>
</div>
