<?php
/**
 * DataTablesColReorderAsset.php
 *
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @author Pedro Plowman
 * @link https://github.com/p2made
 * @package p2made/yii2-p2y2-things
 * @license MIT
 */

/**
 * Load this asset with...
 * p2made\assets\datatables\DataTablesColReorderAsset::register($this);
 *
 * or specify as a dependency with...
 *     'p2made\assets\datatables\DataTablesColReorderAsset',
 */

namespace p2made\assets\datatables;

class DataTablesColReorderAsset extends \p2made\assets\base\P2AssetBundle
{
	protected $version = '1.3.2';

	private $resourceData = array(
		'published' => [
			'sourcePath' => '@bower/datatables-colreorder',
			'css' => [
				'css/colReorder.bootstrap.min.css',
			],
			'js' => [
				'js/dataTables.colReorder.min.js',
			],
		],
		'static' => [
			'baseUrl' => 'https://cdn.datatables.net/colreorder/##-version-##',
			'css' => [
				'css/colReorder.bootstrap.min.css',
			],
			'js' => [
				'js/dataTables.colReorder.min.js',
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
