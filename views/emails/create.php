<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Emails */

$this->title = 'Módulo para enviar correos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emails-create">

    <h1>Enviar correo a representantes</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
