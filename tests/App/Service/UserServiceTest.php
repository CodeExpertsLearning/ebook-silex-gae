<?php
namespace CodeExperts\App\Service;

use CodeExperts\App\TestCase;
use CodeExperts\App\Entity\User;
use CodeExperts\App\Service\PasswordService;


class UserServiceTest extends TestCase
{
    private $er;

    public function setUp()
    {
        $this->er = $this->getDoctrineEntityRepositoryMock();
        

        $this->er->expects($this->any())
                 ->method('getRepository')
                 ->will($this->returnValue($this->er));

        $this->er->expects($this->any())
                 ->method('find')
                 ->will($this->returnValue(new User()));
    }

	public function testInsertANewUser()
    {
        $password = new PasswordService();
        $password = $password->setPassword('123456')
                             ->generate();

        $user = new User();

        $user->setName("Son Goku");
        $user->setEmail("goku@dbz.jp");
        $user->setUsername("goku");
        $user->setPassword($password);
        $user->setIsActive(true);
        $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

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

    public function testUpdateANewUser()
    {
        $password = new PasswordService();
        $password = $password->setPassword('123456')
                             ->generate();

        $user = $this->er->getRepository('CodeExperts\App\Entity\User')->find(1);

        $user->setName("Son Goku Edited");
        $user->setEmail("goku@dbz.jp");
        $user->setUsername("goku");
        $user->setPassword($password);
        $user->setIsActive(true);
        $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        $userService = new UserService($this->getDoctrineEntityManagerMock());
        $update      = $userService->update($user);

        $this->assertInstanceOf("CodeExperts\App\Entity\User", $update);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Parameter invalid must be a CodeExperts\App\Entity\User instance
     */
    public function testInvalidUserUpdate()
    {
        $user = (object) [];

        $userService = new UserService($this->getDoctrineEntityManagerMock());

        $insert = $userService->update($user);
    }

    public function testIfDeletedUserHasBeenSuccess()
    {
        $user = $this->er->getRepository('CodeExperts\App\Entity\User')->find(1);

        $userService = new UserService($this->getDoctrineEntityManagerMock());

        $this->assertTrue($userService->delete($user));
    }


    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Parameter invalid must be a CodeExperts\App\Entity\User instance
     */
    public function testInvalidUserDelete()
    {
        $user = (object) [];

        $userService = new UserService($this->getDoctrineEntityManagerMock());

        $insert = $userService->delete($user);
    }
}