<?php
/**
 * SBAdmin2UserAsset.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

/**
 * Load this asset with...
 * p2made\theme\sbAdmin\assets\SBAdmin2UserAsset::register($this);
 *
 * or specify as a dependency with...
 *     'p2made\theme\sbAdmin\assets\SBAdmin2UserAsset',
 */

namespace p2made\theme\sbAdmin\assets;

class SBAdmin2UserAsset extends \p2made\assets\base\P2AssetBundle
{
	protected $version = '0.0.0';

	private $resourceData = array(

		'published' => [
			'sourcePath' => '@vendor/p2made/yii2-sb-admin-theme/assets/lib',
			'css' => [
				'css/sb-admin-2-user.min.css',
			],
			'js' => [],
		],

		'depends' => [
			'p2made\assets\P2CoreAsset',
		],

	);

	public function init()
	{
		$this->configureAsset($this->resourceData);
		parent::init();
	}
}
