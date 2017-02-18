<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Representante */

$this->title = 'Inscribir';
$this->params['breadcrumbs'][] = ['label' => 'Representantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representante-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
