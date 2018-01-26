<?php

namespace Product\Model;

class Product
{
	private $id;
	private $name;
	private $size;
	private $color;
	private $price;
	private $article;

	public function __construct( $id, $name, $size, $color, $price, $article = null )
	{
		$this->id 	   = $id;
		$this->name    = $name;
		$this->size    = $size;
		$this->color   = $color;
		$this->price   = $price;
		$this->article = $article;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getSize()
	{
		return $this->size;
	}

	public function getSizes()
	{
		return $this->convertToArray($this->size);
	}

	public function getColor()
	{
		return $this->color;
	}

	public function getColors()
	{
		return $this->convertToArray($this->color);
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getArticle()
	{
		return $this->article;
	}

	private function convertToArray( $data )
	{
		if( !is_string($data) )
		{
			(string) $data;
		}

		$sizes = explode(', ', $data);

		return $sizes;
	}
}