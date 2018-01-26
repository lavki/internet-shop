<?php

namespace Product\Model;

use Zend\Db\Adapter\Driver\ResultInterface;

use Zend\Db\ResultSet\HydratingResultSet;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Hydrator\HydratorInterface;

use InvalidArgumentException;
use Zend\Db\Sql\Expression;

use RuntimeException;
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
     * @var Post
     */
    private $productPrototype;

    /**
     * @param AdapterInterface $db
     * @param HydratorInterface $hydrator
     * @param Product $productPrototype
     */
    public function __construct( AdapterInterface $db, HydratorInterface $hydrator, Product $productPrototype )
    {
        $this->db               = $db;
        $this->hydrator         = $hydrator;
        $this->productPrototype = $productPrototype;
    }

	/**
     * Return a set of all products that we can iterate over.
     *
     * Each entry should be a Product instance.
     *
     * @return Product[]
     */
    public function getProducts()
    {
        $sql    = new Sql($this->db);

        $select = $sql->select('product')
                      ->columns(['id', 'name', 'price'])
                      ->join(
                        'modification', 
                        'id = product_id', 
                        [
                            'size'  => new Expression("GROUP_CONCAT(DISTINCT `size` SEPARATOR ', ')"), 
                            'color' => new Expression("GROUP_CONCAT(DISTINCT `color` SEPARATOR ', ')"),
                        ], 
                        'left')
                      ->group('product_id')
                      ->order('id');
        
        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if (! $result instanceof ResultInterface || ! $result->isQueryResult())
        {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->productPrototype);
        $resultSet->initialize($result);

        return $resultSet;
    }

    /**
     * Return an unique article of the product.
     *
     * @param  int $id Identifier of the product to return.
     * @param  string $size Size of the product to return.
     * @return Product
     */
    public function getArticleBySize( $id, $size )
    {
    	$sql    = new Sql($this->db);

        $select = $sql->select('modification')
                      ->columns(['article'])
                      ->where(['product_id' => $id, 'size' => $size])
                      ->limit(1);
        
        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if (! $result instanceof ResultInterface || ! $result->isQueryResult())
        {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->productPrototype);
        $resultSet->initialize($result);

        return $resultSet;
    }

    public function getArticleByModification( $id, $size, $color )
    {
        $sql    = new Sql($this->db);

        $select = $sql->select('modification')
                      ->columns(['article'])
                      ->where(['product_id' => $id, 'size' => $size, 'color' => $color])
                      ->limit(1);
        
        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if (! $result instanceof ResultInterface || ! $result->isQueryResult())
        {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->productPrototype);
        $resultSet->initialize($result);

        return $resultSet;
    }
}