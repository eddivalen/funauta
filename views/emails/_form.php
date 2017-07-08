<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Representante;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Emails */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="emails-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' =>'multipart/form-data']]); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attachment')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Enviar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
