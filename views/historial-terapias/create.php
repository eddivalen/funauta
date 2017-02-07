<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HistorialTerapias */

$this->title = 'Create Historial Terapias';
$this->params['breadcrumbs'][] = ['label' => 'Historial Terapias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historial-terapias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
