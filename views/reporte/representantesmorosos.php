<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use app\models\Representante;
use app\models\Pagosperiodo;
use p2made\helpers\FA;
use kartik\field\FieldRange;
use yii\helpers\ArrayHelper;
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




