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
    public function findAllProducts();
}