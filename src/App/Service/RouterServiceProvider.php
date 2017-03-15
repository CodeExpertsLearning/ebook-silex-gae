<?php
namespace CodeExperts\App\Service;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouterServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app->after(function(Request $request, Response $response) {
            $response->headers->set('Content-Type', 'application/json');
        });

        /**
         * Retorna Todos os Usuários
         */
        $app->get('/', 'home:index');

        /**
         * User Routes
         */
        $app->get('/users', 'user:index');
        $app->get('/users/{id}', 'user:get');
        $app->post('/users', 'user:save');
        $app->put('/users', 'user:update');
        $app->delete('/users/{id}', 'user:delete');

        /**
         * User Routes
         */
        $app->get('/events', 'event:index');
        $app->get('/events/{id}', 'event:get');
        $app->post('/events', 'event:save');
        $app->put('/events', 'event:update');
        $app->delete('/events/{id}', 'event:delete');
    }
}