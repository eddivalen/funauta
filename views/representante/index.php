<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepresentanteSerch */
/* @var $dataProvider yii\data\Activ eDataProvider */

$this->title = 'Representantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inscribir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
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
            // 'nivel_socioeconomico',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
