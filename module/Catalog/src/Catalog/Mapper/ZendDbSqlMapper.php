<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2016, Alpha-Hydro
 *
 */

namespace Catalog\Mapper;
use Catalog\Model\ProductInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;


class ZendDbSqlMapper implements ProductMapperInterface
{
    /**
     * @var \Zend\Db\Adapter\AdapterInterface
     */
    protected $dbAdapter;

    /**
     * @param AdapterInterface  $dbAdapter
     */
    public function __construct(AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * @param int|string $id
     *
     * @return ProductInterface
     * @throws \InvalidArgumentException
     */
    public function find($id)
    {
    }

    /**
     * @return array|ProductInterface[]
     */
    public function findAll()
    {
        $sql    = new Sql($this->dbAdapter);
        $select = $sql->select('products');

        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        \Zend\Debug\Debug::dump($result);die();

    }
}