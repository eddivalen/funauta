<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Historia */

$this->title = 'Create Historia';
$this->params['breadcrumbs'][] = ['label' => 'Historias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>