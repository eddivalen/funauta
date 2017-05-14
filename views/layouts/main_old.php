<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\filters\AccessControl;
use app\assets\AppAsset;
use app\models\Users;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    //$model = Yii::app()->getModule('user');
    $admin = false;
    $simple = false;
    if(!Yii::$app->user->isGuest){
        $admin = (Yii::$app->user->identity->role == 2) ? true : false ;
        $simple = (Yii::$app->user->identity->role == 1) ? true : false ;
    }
    
    NavBar::begin([
        'brandLabel' => 'FUNAUTA',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-down',
        ],
    ]);
   
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Acerca', 'url' => ['/site/about'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Contacto', 'url' => ['/site/contact'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Registrarse', 'url' => ['/site/register'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Inscripcion', 'url' => ['/inscripcion'],'visible'=>$simple],
            ['label' => 'Actividades', 'url' => ['/actividades'],'visible'=>$admin],
            ['label' => 'Representante', 'url' => ['/representante'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Actividades del Representante', 'url' => ['/act-rep'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Evaluacion Paciente', 'url' => ['/paciente-evaluacion'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Terapia Especialista', 'url' => ['/terapia-especialista'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Historial Terapias Paciente', 'url' => ['/his-terapias-paciente'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Historia', 'url' => ['/historia'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Tratamiento', 'url' => ['/tratamiento'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Especialista', 'url' => ['/especialista'],'visible'=>$admin],
            ['label' => 'Historia', 'url' => ['/historia'],'visible'=>$admin],
            ['label' => 'Historial Terapias Paciente', 'url' => ['/his-terapias-paciente'],'visible'=>$admin],
            ['label' => 'Institucion', 'url' => ['/institucion'],'visible'=>$admin],
            ['label' => 'Medicamento', 'url' => ['/medicamento'],'visible'=>$admin],
            ['label' => 'Nucleo Familiar', 'url' => ['/nucleo-familiar'],'visible'=>$admin],
            ['label' => 'Paciente', 'url' => ['/paciente'],'visible'=>$admin],
            ['label' => 'Terapia', 'url' => ['/terapia'],'visible'=>$admin],
            
            ['label' => 'Tipo', 'url' => ['/tipo'],'visible'=>$admin],
            ['label' => 'Tipo Especialista', 'url' => ['/tipo-especialista'],'visible'=>$admin],
            
           
            

            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']]
            :
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
