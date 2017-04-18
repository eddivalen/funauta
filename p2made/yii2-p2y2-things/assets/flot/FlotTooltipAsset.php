<?php
/**
 * FlotTooltipAsset.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-p2y2-things
 * @license MIT
 */

/**
 * Load this asset with...
 * p2made\assets\flot\FlotTooltipAsset::register($this);
 *
 * or specify as a dependency with...
 *     'p2made\assets\flot\FlotTooltipAsset',
 */

namespace p2made\assets\flot; /* edit this if using elsewhere */

class FlotTooltipAsset extends \p2made\assets\base\P2AssetBundle
{
	protected $version = '0.9.0';

	private $resourceData = array(
		'published' => [
			'sourcePath' => '@bower/flot.tooltip',
			'js' => [
				'js/jquery.flot.tooltip.min.js',
			],
		],
		'static' => [
			'baseUrl' => '//cdnjs.cloudflare.com/ajax/libs/flot.tooltip/##-version-##',
			'js' => [
				'jquery.flot.tooltip.min.js',
			],
		],
	);

	public function init()
	{
		$this->configureAsset($this->resourceData);
		parent::init();
	}
}
