<?php
/**
 * MorrisAsset.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-p2y2-things
 * @license MIT
 */

/**
 * Load this asset with...
 * p2made\assets\MorrisAsset::register($this);
 *
 * or specify as a dependency with...
 *     'p2made\assets\MorrisAsset',
 */

namespace p2made\assets;

class MorrisAsset extends \p2made\assets\base\P2AssetBundle
{
	protected $version = '0.5.1';

	private $resourceData = array(
		'published' => [
			'sourcePath' => '@p2m@/morris.js-##-version-##',
			'css' => [
				'morris.css',
			],
			'js' => [
				'morris.min.js',
			],
		],
		'static' => [
			'baseUrl' => '//cdnjs.cloudflare.com/ajax/libs/morris.js/##-version-##',
			'css' => [
				'morris.css',
			],
			'js' => [
				'morris.min.js',
			],
		],
		'depends' => [
			'p2made\assets\RaphaelAsset',
		],
	);

	public function init()
	{
		$this->configureAsset($this->resourceData);
		parent::init();
	}
}
