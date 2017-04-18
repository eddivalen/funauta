<?php
/**
 * FlagIconsDemoAsset.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-p2y2-things-demo
 * @license MIT
 */

namespace p2made\demo\assets;

class FlagIconsDemoAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@vendor/p2made/yii2-p2y2-things-demo/assets/lib';

	public $css = [
		'css/flag-icon-demo.css',
	];
	public $js = [
		'js/flag-icon-demo.js',
	];
}
