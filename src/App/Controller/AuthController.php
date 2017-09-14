<?php
namespace CodeExperts\App\Controller;

use CodeExperts\App\Service\PasswordService;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AuthController
{
	private $app;

	/**
	 * AuthController constructor.
	 * @param Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	public function login(Request $request)
	{
		$data = $request->request->all();

		#validations

		$user = $this->app['orm.em']
			->getRepository('CodeExperts\App\Entity\User')
			->findOneByEmail($data['email']);
			
		if(!$user
		   || $data['email'] != $user->getEmail()) {
			return $this->app->json(['msg' => 'Usuário ou senha incorretos!'],
				401);
		}

		$passwdService = new PasswordService();

		if(!$passwdService->isValidPassword($data['password'], $user->getPassword())) {
			return $this->app->json(json_encode(['msg' => 'Usuário ou senha incorretos!']), 401);
		}

		$jwt = $this->app['jwt'];

		$jwt->setApplication($this->app);

		$jwt->setPayloadData([
			'username' => $user->getEmail()
		]);

		return $this->app->json(['token' => (string) $jwt->generateToken()]);
	}
}