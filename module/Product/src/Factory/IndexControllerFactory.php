<?php

namespace Product\Factory;

use Product\Controller\IndexController;
use Interop\Container\ContainerInterface;
use Product\Model\ProductRepositoryInterface;
use Zend\ServeceManager\Factory\FactoryInterface;

class IndexControllerFactory
{
	/**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return IndexController
     */
	public function __invoke( ContainerInterface $container, $requestedName, array $options = null )
	{
		return new IndexController( $container->get(ProductRepositoryInterface::class) );
	}
}