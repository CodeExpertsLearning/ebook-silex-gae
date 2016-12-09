<?php 
namespace CodeExperts\App\Entity;


class User 
{
	private $name;

	private $email;

	private $username;

	private $password;

	private $isActive;

	private $createdAt;

	private $updatedAt;

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setIsActive($isActive)
	{
		$this->isActive = $isActive;
		return $this;
	}

	public function getIsActive()
	{
		return $this->isActive;
	}

	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	public function setUpdatedAt($updatedAt)
	{
		$this->updatedAt = $updatedAt;
		return $this;
	}

	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}
}