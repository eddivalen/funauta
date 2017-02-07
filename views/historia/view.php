<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Historia */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Historias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que desea eliminar este dato?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fecha',
            'observaciones',
            'tto_id',
            'tta_tpa_id',
            'tta_eta_cedula',
        ],
    ]) ?>

</div>
