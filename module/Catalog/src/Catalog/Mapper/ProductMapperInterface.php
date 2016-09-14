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


interface ProductMapperInterface
{
    /**
     * @param int|string $id
     * @return ProductInterface
     * @throws \InvalidArgumentException
     */
    public function find($id);

    /**
     * @return array|ProductInterface[]
     */
    public function findAll();
}