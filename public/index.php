<?php
chdir(dirname(__DIR__));

/**
 * Arquivo de configurações do Doctrine e
 * require do nosso autoload
 */
require 'bootstrap.php';

use Silex\Application;


$app = new Application();

$app->get('/', function(Application $app){
    return $app->escape("Hello World");
});

$app->run();
