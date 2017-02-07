<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoEspecialista */

$this->title = 'Create Tipo Especialista';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-especialista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
