<?php

namespace Goods\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Platform\PlatformInterface;

class Goods
{
	private $article;
	private $name;
	private $price;
	private $size;
	private $color;
	private $adapter;

	public function __construct()
	{
		$this->adapter = new Adapter($this->configArray());
	}

	public function getGoods()
	{
		$query = $this->adapter->query("
			SELECT `name`, `price`, 
			GROUP_CONCAT(DISTINCT `size` ORDER BY `size` DESC SEPARATOR ', ') AS `sizes`, 
			GROUP_CONCAT(DISTINCT `color` ORDER BY `color` DESC SEPARATOR ', ') AS `colors` 
			FROM `product` 
			LEFT JOIN `modification` 
			ON `id` = `product_id` 
			GROUP BY `product_id`", 

			Adapter::QUERY_MODE_EXECUTE
		);
		$statement = $adapter->createStatement($sql);
		$result    = $statement->execute();

		return $result;
	}

	private function configArray()
	{
		return [
			'driver'   => 'Pdo_Mysql',
			'database' => 'internet-shop',
			'username' => 'root',
			'password' => 'password',
			'charset'  => 'utf8'
		];
	}
}