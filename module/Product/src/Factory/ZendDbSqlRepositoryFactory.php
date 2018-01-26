<?php

namespace Product\Factory;

use Product\Model\Product;
use Zend\Db\Adapter\AdapterInterface;
use Product\Model\ZendDbSqlRepository;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Hydrator\Reflection as ReflectionHydrator;

class ZendDbSqlRepositoryFactory implements FactoryInterface
{
	/**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return ZendDbSqlRepository
     */
	public function __invoke( ContainerInterface $container, $requestedName, array $options = null )
    {
        return new ZendDbSqlRepository(
            $container->get(AdapterInterface::class),
            new ReflectionHydrator(),
            new Product('', '', '', '', '', '')
        );
    }
}