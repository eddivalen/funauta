<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Morosos';
$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-1">
    <p>
        <?= Html::a('PDF', ['representantesmorosos'],
        ['class' => 'btn btn-primary',
        'data'=>[
            'method' => 'post',
            'confirm' => '¿Estás seguro?',
            'params'=>[
                'get'       => json_encode(Yii::$app->request->get()),
            ],
        ],
        'target' => '_blank',  
        ]);?>
    </p> 
</div>
<h4>Listado de morosos</h4>
  <br>
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        'cedula',
        'nombre',
        'apellido',
    ],
]); ?>




