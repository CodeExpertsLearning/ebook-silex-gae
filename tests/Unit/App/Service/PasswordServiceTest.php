<?php
namespace CodeExperts\App\Service;

use CodeExperts\App\TestCase;
use CodeExperts\App\Service\PasswordService;

class PasswordServiceTest extends TestCase
{
    private $password;

    public function setup()
    {
        $this->password = new PasswordService();
    }

	public function testIfPasswordHasBeenGeneratedWithSuccess()
    {
        $password = 'CodeExpertsApps';

        $proccess = $this->password->setPassword($password);

        $hash = $proccess->generate();

        $this->assertTrue($proccess->isValidPassword($password, $hash));
    }
}