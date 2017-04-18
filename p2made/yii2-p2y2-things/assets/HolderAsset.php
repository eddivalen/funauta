<?php
/**
 * HolderAsset.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-p2y2-things
 * @license MIT
 */

/**
 * Load this asset with...
 * p2made\assets\HolderAsset::register($this);
 *
 * or specify as a dependency with...
 *     'p2made\assets\HolderAsset',
 */

namespace p2made\assets;

class HolderAsset extends \p2made\assets\base\P2AssetBundle
{
	protected $version = '2.9.4';

	private $resourceData = array(
		'published' => [
			'sourcePath' => '@vendor/imsky/holderjs',
			'js' => [
				'holder.min.js',
			],
		],
		'static' => [
			'baseUrl' => '//cdnjs.cloudflare.com/ajax/libs/holder/##-version-##',
			'js' => [
				'holder.min.js',
			],
		],
	);

	public function init()
	{
		$this->configureAsset($this->resourceData);
		parent::init();
	}
}
