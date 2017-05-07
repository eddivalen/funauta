<?php
/**
 * index.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use yii\bootstrap\Html;
use yii\bootstrap\Button;
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\ActiveForm;
use p2made\helpers\FA;

p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
p2made\assets\TimelineAsset::register($this);
p2made\assets\MorrisAsset::register($this);

// DEMO ONLY _DON'T_ use this in your production copy.
p2made\demo\assets\MorrisDemoData::register($this);

/* @var $this yii\web\View */

$this->title = 'FUNAUTA';
/* @var $form yii\bootstrap\ActiveForm */
?>
 
