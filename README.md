Zend Framework 2 tutorials code
===============================

"Album" Module
------------
User Guide

<http://zf2.readthedocs.io/en/latest/user-guide/overview.html>

Using Zend\Navigation in your Album Module

<http://zf2.readthedocs.io/en/latest/tutorials/tutorial.navigation.html>

Using Zend\Paginator in your Album Module

<http://zf2.readthedocs.io/en/latest/tutorials/tutorial.pagination.html>


"Blog" Module
------------
In-depth tutorial for beginners
<http://zf2.readthedocs.io/en/latest/in-depth-guide/first-module.html>

#### Error

The tutorial is missing this part.

The tutorial only says:

> As you know from previous chapters, whenever we have a required parameter we need to write a factory for the class. Go ahead and create a factory for our mapper implementation.

<http://zf2.readthedocs.io/en/latest/in-depth-guide/zend-db-sql-zend-stdlib-hydrator.html#writing-the-mapper-implementation>

You need to create a factory for the ZendDbSqlMapper: Create /Blog/src/Blog/Factory/ZendDbSqlMapperFactory.php

```php
<?php
// Filename: /Blog/src/Blog/Factory/ZendDbSqlMapperFactory.php
namespace Blog\Factory;

use Blog\Mapper\ZendDbSqlMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ZendDbSqlMapperFactory implements FactoryInterface
{
    /**
    * Create service
    *
    * @param ServiceLocatorInterface $serviceLocator
    *
    * @return mixed
    */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ZendDbSqlMapper($serviceLocator->get('Zend\Db\Adapter\Adapter'));
    }
}
```
