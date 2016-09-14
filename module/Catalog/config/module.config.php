<?php
return array(
    /*
    // Set is filename: /config/autoload/db.local.php
    'db' => array(
        'driver'         => 'Pdo',
        'username'       => 'SECRET_USERNAME',  //edit this
        'password'       => 'SECRET_PASSWORD',  //edit this
        'dsn'            => 'mysql:dbname=blog;host=localhost',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
    */
    'service_manager' => array(
        'factories' => array(
            'Catalog\Mapper\ProductMapperInterface' => 'Catalog\Factory\ZendDbSqlMapperFactory',
            'Catalog\Service\ProductServiceInterface' => 'Catalog\Factory\ProductServiceFactory',
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
        )
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'Catalog\Controller\Index' => 'Catalog\Factory\IndexControllerFactory'
        )
    ),

    'router' => array(
        // Open configuration for all possible routes
        'routes' => array(
            // Define a new route called "post"
            'catalog' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type' => 'literal',
                // Configure the route itself
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/catalog',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Catalog\Controller\Index',
                        'action'     => 'index',
                    )
                )
            )
        )
    )
);