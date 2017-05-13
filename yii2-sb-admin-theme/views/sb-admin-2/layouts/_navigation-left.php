<?php
/**
 * navigation-left.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

use p2made\widgets\MetisNav;
use p2made\helpers\FA;
use app\models\Users;
use app\models\User;
$arrowIcon = FA::i('arrow')->tag('span');
	$admin = false;
    $simple = false;
    if(!Yii::$app->user->isGuest){
        $admin = (Yii::$app->user->identity->role == 2) ? true : false ;
        $simple = (Yii::$app->user->identity->role == 1) ? true : false ;
    }
?>

<section class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<!-- Dashboard -->
			<li><?= Html::a( 
				FA::fw('dashboard') . ' Inicio',
				Yii::$app->homeUrl
			) ?></li>
			<li><?php if(Yii::$app->user->isGuest){?><!-- Login -->
				<?= Html::a(
				FA::fw('users') . 'Iniciar sesión',
				Url::to("/basic/web/index.php?r=site/login"))
				?><?php } ?>
			</li>
			<li><?php if($simple){ ?> <!-- Inscripcion -->
				<?= Html::a(
				FA::fw('users') . 'Inscripcion',
				Url::to(['/inscripcion', 'view' => 'inscripcion'])) 
				?><?php } ?>
			</li>
			<li><?php if($admin){ ?> <!-- Actividades -->
				<?= Html::a(
				FA::fw('list-alt') . 'Actividades',
				Url::to(['/actividades', 'view' => 'actividades'])) 
				?><?php } ?>
			</li>
			<li><?php if(!Yii::$app->user->isGuest){ ?> <!-- Representante -->
				<?= Html::a(
				FA::fw('user') . 'Representante',
				Url::to(['/representante', 'view' => 'representante'])) 
				?><?php } ?>
			</li>
			<li><?php if(!Yii::$app->user->isGuest){ ?> <!-- Actividades-Rep -->
				<?= Html::a(
				FA::fw('list-ul') . 'Actividades del Representante',
				Url::to(['/act-rep', 'view' => 'act-rep'])) 
				?><?php } ?>
			</li>
			<li><?php if($admin){ ?> <!-- Paciente -->
				<?= Html::a(
				FA::fw('user') . 'Paciente',
				Url::to(['/paciente', 'view' => 'paciente'])) 
				?><?php } ?>
			</li>
			<li><?php if(!Yii::$app->user->isGuest){ ?> <!-- Evaluación Paciente -->
				<?= Html::a(
				FA::fw('stethoscope') . 'Evaluación Paciente',
				Url::to(['/paciente-evaluacion', 'view' => 'paciente-evaluacion'])) 
				?><?php } ?>
			</li>
			<li><?php if(!Yii::$app->user->isGuest){ ?> <!-- Historial Terapias Paciente -->
				<?= Html::a(
				FA::fw('folder') . 'Historial Terapias Paciente',
				Url::to(['/his-terapias-paciente', 'view' => 'his-terapias-paciente'])) 
				?><?php } ?>
			</li>
			<li><?php if(!Yii::$app->user->isGuest){ ?> <!-- Historia -->
				<?= Html::a(
				FA::fw('history') . 'Historia',
				Url::to(['/historia', 'view' => 'historia'])) 
				?><?php } ?>
			</li>
			<li><?php if(!Yii::$app->user->isGuest){ ?> <!-- Tratamiento -->
				<?= Html::a(
				FA::fw('support') . 'Tratamiento',
				Url::to(['/tratamiento', 'view' => 'tratamiento'])) 
				?><?php } ?>
			</li>

			<li><?php if($admin){ ?> <!-- Institución -->
				<?= Html::a(
				FA::fw('institution') . 'Institución',
				Url::to(['/institucion', 'view' => 'institucion'])) 
				?><?php } ?>
			</li>
			<li><?php if($admin){ ?> <!-- Medicamento -->
				<?= Html::a(
				FA::fw('shield') . 'Medicamento',
				Url::to(['/medicamento', 'view' => 'medicamento'])) 
				?><?php } ?>
			</li>
			<li><?php if($admin){ ?> <!-- Terapia -->
				<?= Html::a(
				FA::fw('medkit') . 'Terapia',
				Url::to(['/terapia', 'view' => 'terapia'])) 
				?><?php } ?>
			</li>
			<li><?php if(!Yii::$app->user->isGuest){ ?> <!-- Terapia Especialista -->
				<?= Html::a(
				FA::fw('plus-square') . 'Terapia Especialista',
				Url::to(['/terapia-especialista', 'view' => 'terapia-especialista'])) 
				?><?php } ?>
			</li>
			<li><?php if($admin){ ?> <!-- Especialista -->
				<?= Html::a(
				FA::fw('user-md') . 'Especialista',
				Url::to(['/especialista', 'view' => 'especialista'])) 
				?><?php } ?>
			</li>
			<li><?php if($admin){ ?> <!-- Tipo -->
				<?= Html::a(
				FA::fw('arrow-circle-right') . 'Tipo de Especialidad',
				Url::to(['/tipo', 'view' => 'tipo'])) 
				?><?php } ?>
			</li>
			<li><?php if($admin){ ?> <!-- Tipo Especialista -->
				<?= Html::a(
				FA::fw('arrow-circle-up') . 'Asignar Especialista',
				Url::to(['/tipo-especialista', 'view' => 'tipo-especialista'])) 
				?><?php } ?>
			</li>				
		</ul>
	</div>
</section>
