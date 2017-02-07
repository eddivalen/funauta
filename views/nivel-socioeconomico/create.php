<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NivelSocioeconomico */

$this->title = 'Create Nivel Socioeconomico';
$this->params['breadcrumbs'][] = ['label' => 'Nivel Socioeconomico', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-socioeconomico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
