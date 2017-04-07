<?php
namespace CodeExperts\App\Service;

use CodeExperts\App\Entity\Contract\Entity;
use CodeExperts\App\Entity\Event;
use CodeExperts\App\Entity\User;
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

	public function addSubscription($user = null, $event = null)
    {
        if(is_null($user) || is_null($event)) {
            throw new \Exception("Invalid Parameters");
        }

        $user->setEventsCollection($event);
        $event->setUsersCollection($user);

        $this->em->persist($user);
        $this->em->persist($event);

        $this->em->flush();

        return true;
    }
}