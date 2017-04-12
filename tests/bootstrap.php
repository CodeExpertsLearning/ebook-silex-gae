<?php
require __DIR__ . '/../bootstrap.php';

/**
 * E-book Doctrine na Prática
 * @author Elton Minetto <eminetto@gmail.com>
 */
use Doctrine\ORM\EntityManager;

$dbParams = array(
    'driver'   => 'pdo_sqlite',
    'memory'   => true,
    'path'     => 'memory'
);

return $entityManager = EntityManager::create($dbParams, $config);