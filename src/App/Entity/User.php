<?php 
namespace CodeExperts\App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * 
 */
class User 
{
	/**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	private $id;

 	/**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
	private $name;

	/**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
	private $email;

	/**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=80)
     */
	private $username;

	/**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
	private $password;

	/**
     * @var string
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
	private $isActive;

	/**
     * @var string
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
	private $createdAt;
	
	/**
     * @var string
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
	private $updatedAt;
	

	public function getId()
	{
		return $this->id;
	}

	public function setId($id) 
	{
		$this->id = $id;
		return $this;
	}

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