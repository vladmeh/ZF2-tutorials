<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=blog;host=localhost',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Zend\Cache\StorageFactory' => function() {
                return \Zend\Cache\StorageFactory::factory(array(
                    'adapter' => array(
                        'name' => 'filesystem',
                        'options' => array(
                            'cache_dir' => __DIR__.'/../../data/cache'
                        ),
                    ),
                    'plugins' => array(
                        // Don't throw exceptions on cache errors
                        'exception_handler' => array(
                            'throw_exceptions' => false
                        ),
                    )
                ));
            },
        ),
        'aliases' => array(
            'cache' => 'Zend\Cache\StorageFactory',
        ),
    ),
);
