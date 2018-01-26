<?php

namespace Product\Model;

interface ProductRepositoryInterface
{
	/**
     * Return a set of all products that we can iterate over.
     *
     * Each entry should be a Product instance.
     *
     * @return Product[]
     */
	public function getProducts();

	/**
     * Return an unique article of the product.
     *
     * @param  int $id Identifier of the product to return.
     * @param  string $size Size of the product to return.
     * @return Product article
     */
	public function getArticleBySize( int $id, string $size );

     /**
     * Return an unique article of the product.
     *
     * @param  int $id Identifier of the product to return.
     * @param  string $size Size of the product to return.
     * @param  string $color Size of the product to return.
     * @return Product article
     */
     public function getArticleByModification( int $id, string $size, string $color );
}