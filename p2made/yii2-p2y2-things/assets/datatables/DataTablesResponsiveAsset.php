<?php
/**
 * DataTablesResponsiveAsset.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-p2y2-things
 * @license MIT
 */

/**
 * Load this asset with...
 * p2made\assets\datatables\DataTablesResponsiveAsset::register($this);
 *
 * or specify as a dependency with...
 *     'p2made\assets\datatables\DataTablesResponsiveAsset',
 */

namespace p2made\assets\datatables;

class DataTablesResponsiveAsset extends \p2made\assets\base\P2AssetBundle
{
	protected $version = '2.1.0';

	private $resourceData = array(
		'published' => [
			'sourcePath' => '@bower/datatables-responsive',
			'css' => [
				'css/responsive.bootstrap.min.css',
			],
			'js' => [
				'js/dataTables.responsive.min.js',
				'js/responsive.bootstrap.min.js',
			],
		],
		'static' => [
			'baseUrl' => 'https://cdn.datatables.net/responsive/##-version-##',
			'css' => [
				'css/responsive.bootstrap.min.css',
			],
			'js' => [
				'js/dataTables.responsive.min.js',
				'js/responsive.bootstrap.min.js',
			],
		],
		'depends' => [
			'p2made\assets\JqueryAsset',
			'p2made\assets\datatables\DataTablesBootstrapAsset',
		],
	);

	public function init()
	{
		$this->configureAsset($this->resourceData);
		parent::init();
	}
}
