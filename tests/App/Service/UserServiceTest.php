<?php
namespace CodeExperts\App\Service;

use CodeExperts\App\TestCase;
use CodeExperts\App\Entity\User;

class UserServiceTest extends TestCase
{
	public function testInsertANewUser()
    {
        $user = new User();

        $user->setName("Son Goku");
        $user->setEmail("goku@dbz.jp");
        $user->setUsername("goku");
        $user->setPassword("123456");
        $user->setIsActive(true);
        $user->setCreatedAt(new \DateTime("now"));
        $user->setUpdatedAt(new \DateTime("now"));

        $userService = new UserService($this->getDoctrineEntityManagerMock());
        $insert = $userService->create($user);

        $this->assertInstanceOf("CodeExperts\App\Entity\User", $insert);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Parameter invalid must be a CodeExperts\App\Entity\User instance
     */
    public function testInvalidUserCreate()
    {
     	$user = (object) [];

        $userService = new UserService($this->getDoctrineEntityManagerMock());

        $insert = $userService->create($user);
    }
}