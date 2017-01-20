<?php
namespace CodeExperts\App;

use Silex\Application;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class TestCase extends \PHPUnit_Framework_TestCase
{
	public function getDoctrineEntityManagerMock()
	{
		$em = $this->getMockBuilder(EntityManager::class)
                   ->disableOriginalConstructor()
                   ->setMethods(['persist', 'merge','remove','flush'])
                   ->getMock();

        $em->expects($this->any())
            ->method('persist')
            ->will($this->returnValue(null));

        $em->expects($this->any())
            ->method('merge')
            ->will($this->returnValue(null));

         $em->expects($this->any())
            ->method('remove')
            ->will($this->returnValue(null));

        $em->expects($this->any())
            ->method('flush')
            ->will($this->returnValue(null));

        return $em;
	}

    public function getDoctrineEntityRepositoryMock()
    {
        $er = $this->getMockBuilder(EntityRepository::class)
                   ->disableOriginalConstructor()
                   ->setMethods(['getRepository', 'find'])
                   ->getMock();

        return $er;
    }
}