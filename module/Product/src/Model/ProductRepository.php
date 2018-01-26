<?php

namespace Product\Model;

use DomainException;

class ProductRepository implements ProductRepositoryInterface
{
	private $products = [
		1 => [
			'id'	 => 1,
			'name'   => 'Shirt Classic',
			'price'  => '150.00',
			'sizes'  => 's, m, l',
			'colors' => 'white',
			'article' => '1001, 1002, 1003'
		],
		2 => [
			'id'	 => 2,
			'name'   => 'Jacket',
			'price'  => '300.00',
			'sizes'  => 'xl',
			'colors' => 'black, dark navy',
			'article' => '1004, 1005'
		],
		3 => [
			'id'	 => 3,
			'name'   => 'Shoes',
			'price'  => '499.99',
			'sizes'  => '43',
			'colors' => 'black',
			'article' => '1006'
		],
		4 => [
			'id'	 => 4,
			'name'   => 'Belt',
			'price'  => '100.00',
			'sizes'  => 'l',
			'colors' => 'red',
			'article' => '1007'
		],
	];

	public function getProducts()
	{
		$query = "SELECT `id`, `name`, `price`, 
				  GROUP_CONCAT(DISTINCT `size` ORDER BY `size` DESC SEPARATOR ', ') AS `sizes`, 
				  GROUP_CONCAT(DISTINCT `color` ORDER BY `color` DESC SEPARATOR ', ') AS `colors` 
				  FROM `product` 
				  LEFT JOIN `modification` 
				  ON `id` = `product_id` 
				  GROUP BY `product_id`";

		return array_map( function ( $product ) 
			{
				return new Product(
					$product['id'], 
					$product['name'], 
					$product['sizes'], 
					$product['colors'], 
					$product['price'],
					$product['article'] );
			}, $this->products 
		);
	}

	public function getArticleBySize( int $id, string $size = null )
	{
		$query = "SELECT `article` 
				  FROM `modification` 
				  WHERE `product_id` = ? AND `size` = ? 
				  LIMIT 1";
		
		if( !isset($this->products[$id]) )
		{
			throw new DomainException( sprintf('Product by id "%d" is not found', $id) );
		}

		return new Product(
			$this->products[$id]['id'],
			$this->products[$id]['name'], 
			$this->products[$id]['sizes'], 
			$this->products[$id]['colors'], 
			$this->products[$id]['price'],
			$this->products[$id]['article']
		);
	}
}