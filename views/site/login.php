<?php
/**
 * login.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use p2made\helpers\FA;
use p2made\helpers\BSocial;
use yii\helpers\Url;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Iniciar sesión';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback', 'autofocus' => 'autofocus'],
    'inputTemplate' => "{input}<i class='glyphicon glyphicon-envelope form-control-feedback'></i>",
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<i class='glyphicon glyphicon-lock form-control-feedback'></i>",
];
?>
<div class="sb-box">
    <div class="sb-logo">
        <?= Html::a('<h1>FUNAUTA</h1>', Yii::$app->homeUrl) ?>
    </div>
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Inicia sesión</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'enableClientValidation' => false
            ]); ?>
                <?= $form
                    ->field($model, 'username', $fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('usuario')])
                ?>

                <?= $form
                    ->field($model, 'password', $fieldOptions2)
                    ->label(false)
                    ->passwordInput(['placeholder' =>'Contraseña'])
                ?>

                <div class="row">
                    <div class="col-xs-8">
                        <?= $form->field($model, 'rememberMe')->checkbox()
                            ->label('Recordar sesión')?>
                    </div>
                    <div class="col-xs-4">
                        <?= Html::submitButton('Iniciar sesión', [
                            'class' => 'btn btn-success btn-block btn-flat',
                            'name' => 'login-button'
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class=""><a href="/funauta/web/index.php?r=site/register">Registrarse</a></p>
                    </div>
                    <div class="col-xs-6">
                        <p style="margin-left:30px;"class=""><a href="/funauta/web/index.php?r=site/recoverpass">Olvidaste tu contraseña?</a></p>
                    </div>  
                </div>
            
            <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>
