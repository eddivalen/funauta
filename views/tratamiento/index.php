<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\TratamientoSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Tratamientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tratamiento-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Crear Tratamiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'indicaciones',
            'dosis',
            'posologia',
            [
                'attribute'=>'mto_id',
                'label'=>'Medicamento',
            ],
            [
                'attribute'=>'pte_cedula',
                'label'=>'Paciente cedula',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
