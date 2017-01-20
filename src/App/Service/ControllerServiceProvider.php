<?php
namespace CodeExperts\App\Service;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use CodeExperts\App\Controller\HomeController;

class ControllerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['home'] = function() use ($app) {
            return new HomeController($app);
        };

    }
}