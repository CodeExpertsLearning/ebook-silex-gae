<?php
namespace CodeExperts\App\Service;

use CodeExperts\App\Controller\EventController;
use CodeExperts\App\Controller\SubscriptionController;
use CodeExperts\App\Controller\UserController;
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

        $app['user'] = function() use ($app) {
            return new UserController($app);
        };

        $app['event'] = function() use ($app) {
            return new EventController($app);
        };

        $app['subscription'] = function() use ($app) {
            return new SubscriptionController($app);
        };
    }
}