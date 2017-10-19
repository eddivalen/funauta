<?php
/**
 * user-entry.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use yii\bootstrap\Html;
 use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

p2made\theme\sbAdmin\assets\SBAdmin2UserAsset::register($this);
p2made\assets\BootstrapSocialAsset::register($this);
appAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	
	<?= $this->render('_html-header.php', []) ?>
</head>
<body >

<?php $this->beginBody() ?>

	<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
