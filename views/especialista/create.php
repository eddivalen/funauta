<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Especialista */

$this->title = 'Agregar';
$this->params['breadcrumbs'][] = ['label' => 'Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especialista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
