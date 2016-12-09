<?php
namespace CodeExperts\App\Service;

use Doctrine\ORM\EntityManager;
use CodeExperts\App\Entity\User;

class UserService
{
	/**
	 * @var Doctrine\ORM\EntityManager
	 */
	private $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function create($user)
	{
		if(!$user instanceof User)
			throw new \InvalidArgumentException("Parameter invalid must be a CodeExperts\App\Entity\User instance");

		$this->em->persist($user);
		$this->em->flush();

		return $user;
	}
}