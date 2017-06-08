<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->registerCssFile("../web/css/style.css");
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\MensualidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Mensualidad';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensualidad-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_pago',
            'fecha',
            'banco',
            'rte_cedula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>