<?php

require 'bootstrap.php';

use Silex\Application;


$app = new Application();

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new CodeExperts\App\Service\RouterServiceProvider());
$app->register(new CodeExperts\App\Service\ControllerServiceProvider());

return $app;