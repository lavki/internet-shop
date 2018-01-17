<?php

namespace Product\Model;

use InvalidArgumentException;
use RuntimeException;
use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;

class ZendDbSqlRepository implements ProductRepositoryInterface
{
	/**
     * @var AdapterInterface
     */
    private $db;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var Product
     */
    private $productPrototype;

    public function __construct(
    	AdapterInterface $db,
        HydratorInterface $hydrator,
        Product $productPrototype)
    {
        $this->db            = $db;
        $this->hydrator      = $hydrator;
        $this->productPrototype = $productPrototype;
    }

    /**
     * {@inheritDoc}
     */
    public function findAllProducts()
    {
    	$sql       = new Sql($this->db);
        $select    = $sql->select('product')->group('name')->order('article');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if (! $result instanceof ResultInterface || ! $result->isQueryResult()) {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->productPrototype);
        $resultSet->initialize($result);

        return $resultSet;
    }

    public function getSize($name)
    {
        $sql       = new Sql($this->db);
        $select    = $sql->select('product')
            ->columns(['size', 'article'])
            ->where(['name' => $name])
            ->group('size')
            ->order('size DESC');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if (! $result instanceof ResultInterface || ! $result->isQueryResult()) {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->productPrototype);
        $resultSet->initialize($result);

        return $resultSet;
    }
}