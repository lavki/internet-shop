<?php

namespace Product\Model;

class Product
{
    /**
     * @var int
     */
    private $article;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $size;

    /**
     * @var string
     */
    private $color;

    /**
     * @param string $name
     * @param string $size
     * @param int|null $article
     */
    public function __construct($name, $size, $article = null)
    {
        $this->name 	= $name;
        $this->size 	= $size;
        $this->article 	= $article;
    }

    /**
     * @return int|null
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}