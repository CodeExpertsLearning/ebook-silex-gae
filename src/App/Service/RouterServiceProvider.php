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
        $verifyToken = function(Request $request, Container $app){
            $token =  $request->headers->get('Authorization');
            $token = str_replace('Bearer ', '', $token);

            try {
                $app['jwt']->validateToken($token);
            } catch (\Exception $e) {
                return $app->json(['msg'=> 'Invalid Token!'], 401);
            }
        };

        $app->after(function(Request $request, Response $response) {
            $response->headers->set('Content-Type', 'application/json');
        });
        
	    /**
	     * Auth
	     */
	    $app->post('/auth/login', 'auth:login');

        /**
         * Retorna Todos os Usuários
         */
        $app->get('/', 'home:index');

        /**
         * User Routes
         */
        $app->get('/users', 'user:index');
        $app->get('/users/{id}', 'user:get');
        $app->post('/users', 'user:save')->before($verifyToken);
        $app->put('/users', 'user:update');
        $app->delete('/users/{id}', 'user:delete');

        /**
         * Events Routes
         */
        $app->get('/events', 'event:index');
        $app->get('/events/{id}', 'event:get');
        $app->post('/events', 'event:save')->before($verifyToken);
        $app->put('/events', 'event:update');
        $app->delete('/events/{id}', 'event:delete');

        /**
         * Subscription
         */
        $app->post('/events/{event_id}/subscription', 'subscription:index');
    }
}