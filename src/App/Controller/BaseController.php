<?php
/**
 * Created by PhpStorm.
 * User: NandoKstroNet
 * Date: 15/03/17
 * Time: 14:21
 */

namespace CodeExperts\App\Controller;

use Silex\Application;

class BaseController
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}