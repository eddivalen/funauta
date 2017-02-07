<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NucleoFamiliar */

$this->title = 'Create Nucleo Familiar';
$this->params['breadcrumbs'][] = ['label' => 'Nucleo Familiars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nucleo-familiar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
