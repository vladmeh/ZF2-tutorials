<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2016, Alpha-Hydro
 *
 */

namespace Blog\Mapper;

use Blog\Model\PostInterface;


interface PostMapperInterface
{
    /**
     * @param int|string $id
     * @return PostInterface
     * @throws \InvalidArgumentException
     */
    public function find($id);

    /**
     * @return array|PostInterface[]
     */
    public function findAll();

    /**
     * @param PostInterface $postObject
     *
     * @param PostInterface $postObject
     * @return PostInterface
     * @throws \Exception
     */
    public function save(PostInterface $postObject);
}