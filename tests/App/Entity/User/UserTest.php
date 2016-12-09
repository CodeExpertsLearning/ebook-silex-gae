<?php 
namespace CodeExperts\App\Entity;

use CodeExperts\App\Entity\User;
use CodeExperts\App\TestCase;

class UserTest extends TestCase
{
	private $user;

	public function setUp()
	{
		$this->user = new User();
	}

	public function assertPreConditions()
	{
 		$this->assertTrue(
            class_exists($class = 'CodeExperts\App\Entity\User'),
            'Class not found: ' . $class
        );
    }

    public function testIfSetterAndGetterHasWork()
    {
    	$dataSet = [
    		'name'      => "Son Goku",
    		'email'     => "goku@dbz.jp",
    		'username'  => "goku",
    		'password'  => "123456",
    		'isActive'  => true,
    		'createdAt' => new \DateTime("now"),
    		'updatedAt' => new \DateTime("now"),
    	];

    	foreach($dataSet as $key => $value)
    	{
    		$set = "set" . ucfirst($key);
    		$set = $this->user->$set($value);

    		$this->assertInstanceOf('CodeExperts\App\Entity\User', $set);

    		$get = "get" . ucfirst($key); 
    		
    		$this->assertEquals($this->user->$get(), $dataSet[$key]);

    	}
    }

   
}