<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2016, Alpha-Hydro
 *
 */

namespace Catalog\Service;

use Catalog\Mapper\ProductMapperInterface;
use Catalog\Model\Product;


class ProductService implements ProductServiceInterface
{
    /**
     * @var ProductMapperInterface
     */
    protected $productMapper;

    /**
     * ProductService constructor.
     * @param ProductMapperInterface $productMapper
     */
    public function __construct(ProductMapperInterface $productMapper)
    {
        $this->productMapper = $productMapper;
    }

    /**
     * @return array
     */
    public function findAllProducts()
    {
        return $this->productMapper->findAll();
    }

    /**
     * @param $id
     * @return Product
     */
    public function findProduct($id)
    {
        return $this->productMapper->find($id);
    }
}