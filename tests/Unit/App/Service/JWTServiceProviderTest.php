<?php

use CodeExperts\App\Service\JWTServiceProvider;
use Silex\Application;

class JWTServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testIfProviderHasWorking()
    {
        $app = new Application();
        $app->register(new JWTServiceProvider(), [
            'iss'     => 'http://example.com',
            'secret'  => 'xyzxyz',
            'expires' => 3600,
            'signer'  => 'HMACS',
            'jti'     => '4f1g23a12aa'
        ]);

        $this->assertInstanceOf('CodeExperts\App\Security\Token', $app['jwt']);
    }
}
