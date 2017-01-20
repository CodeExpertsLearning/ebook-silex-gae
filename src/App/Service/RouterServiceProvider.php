<?php
namespace CodeExperts\App\Service;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RouterServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        /**
         * Retorna Todos os Usuários
         */
        $app->get('/', 'home:index');

    }
}