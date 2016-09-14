<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2016, Alpha-Hydro
 *
 */

namespace Catalog\Model;


interface ProductInterface
{
    /**
     * Will return the ID of the catalog product
     *
     * @return int
     */
    public function getId();

    /**
     * Will return the TITLE of the catalog product
     *
     * @return string
     */
    public function getTitle();

    /**
     * Will return the TEXT of the catalog product
     *
     * @return string
     */
    public function getText();
}