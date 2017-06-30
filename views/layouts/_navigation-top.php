<?php
/**
 * navigation-top.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use app\models\Users;
use app\models\User;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this \yii\web\View */
/* @var $content string */
$options = ['class' => ['fa', 'fa-sign-out','fa-fw']];
$admin = false;
    $simple = false;
    if(!Yii::$app->user->isGuest){
        $admin = (Yii::$app->user->identity->role == 2) ? true : false ;
        $simple = (Yii::$app->user->identity->role == 1) ? true : false ;
    }

?>
<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<?= Html::a('<b>FUNAUTA</b>', Yii::$app->homeUrl, ['class' => 'navbar-brand']) ?>
</div>

<ul class="nav navbar-top-links navbar-right">
	<?php if($simple){ ?> 
		<a class="navbar-brand" style="margin-right: 20px;" href="">Usuario</a> <?php } ?>
	<?php if($admin){ ?> 
		<a class="navbar-brand" href="">Administrador</a> <?php } ?>
	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
		</a>
		<ul class="dropdown-menu dropdown-user">
			<!--<li><a href=""><i class="fa fa-user fa-fw"></i> Perfil  </a>
			</li>
			<li><i class="fa fa-gear fa-fw"></i> Settings</a>
			</li>
			<li class="divider"></li>-->
			<li>
			 <?php  if(Yii::$app->user->isGuest){
				['label' => 'Login', 'url' => ['/site/login']];
				}else{ ?>
					<?=
					Html::beginForm(['/site/logout'], 'post') 
			 		. Html::submitButton( 
                    'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                	)
            	  	. Html::endForm()
					  ?> 
				<?php } ?>	  
			</li>
		</ul><!-- /.dropdown-user -->
		<!-- /.dropdown-user -->
	</li>
	<!-- /.dropdown -->
</ul>
