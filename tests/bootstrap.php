<?php
require __DIR__ . '/../bootstrap.php';

use Doctrine\ORM\EntityManager;

$dbParams = array(
    'driver'   => 'pdo_sqlite',
    'memory'   => true,
    'path'     => 'memory'
);

return $entityManager = EntityManager::create($dbParams, $config);