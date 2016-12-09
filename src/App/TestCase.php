<?php
namespace CodeExperts\App;

use Silex\Application;

class TestCase extends \PHPUnit_Framework_TestCase
{
	private $app;

	public function setUp()
	{
		$this->app =  new Application();
	}

	public function getDoctrineEntityManagerMock()
	{
		$em = $this->getMockBuilder("Doctrine\ORM\EntityManager")
                   ->disableOriginalConstructor()
                   ->setMethods(['persist', 'flush'])
                   ->getMock();

        $em->expects($this->any())
            ->method('persist')
            ->will($this->returnValue(null));

        $em->expects($this->any())
            ->method('flush')
            ->will($this->returnValue(null));

        return $em;
	}
}