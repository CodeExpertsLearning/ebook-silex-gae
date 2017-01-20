<?php 
namespace CodeExperts\App\Service;

class PasswordService
{
	private $password;

	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}

	public function generate()
	{
		$opt = ['cost' => 11, 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)];

		return password_hash($this->password, PASSWORD_BCRYPT, $opt);
	}

	public function isValidPassword($password, $hash)
	{
		return password_verify($password, $hash);
	}
}
