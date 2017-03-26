<?php
namespace CodeExperts\App\Service;

use CodeExperts\App\Entity\Contract\Entity;
use Doctrine\ORM\EntityManager;

class EMService
{
	/**
	 * @var EntityManager
	 */
	private $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function create($entity)
	{
		if(!$entity instanceof Entity)
			throw new \InvalidArgumentException("Parameter invalid must be a CodeExperts\App\Entity\Contract\Entity instance");
        $this->em->persist($entity);
		$this->em->flush();

        return $entity;
	}

	public function update($entity)
	{
		if(!$entity instanceof Entity)
			throw new \InvalidArgumentException("Parameter invalid must be a CodeExperts\App\Entity\Contract\Entity instance");

		$this->em->merge($entity);
		$this->em->flush();

		return $entity;
	}

	public function delete($entity)
	{
		if(!$entity instanceof Entity)
			throw new \InvalidArgumentException("Parameter invalid must be a CodeExperts\App\Entity\Contract\Entity instance");

        $this->em->remove($entity);
        $this->em->flush();

        return true;
	}

	public function addSubscription($user, $event)
    {
        return true;
    }
}