<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepresentanteSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Representantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Representante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cedula',
            'nombre',
            'apellido',
            'nacionalidad',
            'edad',
            // 'edo_civil',
            // 'direccion',
            // 'telefono_local',
            // 'telefono_celular',
            // 'correo',
            // 'ocupacion',
            // 'empresa',
            // 'horario_trabajo',
            // 'actividad',
            // 'disponibilidad',
            // 'nvo_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
