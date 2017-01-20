<?php
namespace CodeExperts\App\Controller;

use Silex\Application;

class HomeController
{
    /**
     * @var Application
     */
     private $app;
     
	 public function __construct(Application $app) 
	 {
	     $this->app = $app;
	 }
	 
    public function index()
    {
        return 'Controller AS Service Installed!';
    }
}