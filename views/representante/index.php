<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\RepresentanteSerch */
/* @var $dataProvider yii\data\Activ eDataProvider */
$this->title = 'Representantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representante-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute'=>'nacionalidad',
                'value'=>function($model){
                    switch ($model->nacionalidad) {
                        case 'V':
                             return 'Venezolana'; 
                        break;
                        case 'E':
                             return 'Extranjera'; 
                        break;
                    } 
                    },
                'filter' => array("V"=>"Venezolana","E"=>"Extranjera"),
                'label'=>'Nacionalidad',
            ],
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
