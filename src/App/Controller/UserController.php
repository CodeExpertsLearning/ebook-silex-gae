<?php
namespace CodeExperts\App\Controller;

use CodeExperts\App\Entity\User;
use CodeExperts\App\Service\EMService;
use CodeExperts\App\Service\PasswordService;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseController
{
    public function index()
    {
        $users = $this->app['orm.em']
                     ->getRepository('CodeExperts\App\Entity\User')
                     ->findAll();

        $build = SerializerBuilder::create()->build();

        return new Response($build->serialize(
            $users,
            'json',
            SerializationContext::create()->setGroups(array('list'))), 200);
    }

    public function get($id)
    {
        $id = (int) $id;

        $user = $this->app['orm.em']
            ->getRepository('CodeExperts\App\Entity\User')
            ->find($id);

        $build = SerializerBuilder::create()->build();

        return new Response($build->serialize(
            $user,
            'json',
            SerializationContext::create()->setGroups(array('list'))), 200);
    }

    public function save(Request $request)
    {
        $data = $request->request->all();

        $password = new PasswordService();
        $password = $password->setPassword($data['password'])
            ->generate();

        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setUsername($data['username']);
        $user->setPassword($password);
        $user->setIsActive(true);
        $user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        $em = new EMService($this->app['orm.em']);

        if(!$em->create($user)) {
            return $this->app->json(['msg' => 'Error to created a new user'], 401);
        }

        return $this->app->json(['msg' => 'User created with success'], 200);
    }

    public function update(Request $request)
    {
        $data = $request->request->all();

        $user = $this->app['orm.em']
                     ->getRepository('CodeExperts\App\Entity\User')
                     ->find($data['id']);

        foreach ($data as $key=>$value) {
            $set = "set" . ucfirst($key);

            if ($set == "setPassword") {

                $password = new PasswordService();
                $password = $password->setPassword($data['password'])
                    ->generate();

                $user->setPassword($password);

            } else {
                $user->$set($value);
            }
        }

        $em = new EMService($this->app['orm.em']);

        if(!$em->update($user)) {
            return $this->app->json(['msg' => 'Error to update user'], 401);
        }

        return $this->app->json(['msg' => 'User updated with success'], 200);
    }

    public function delete($id)
    {
        $id = (int) $id;

        $user = $this->app['orm.em']
            ->getRepository('CodeExperts\App\Entity\User')
            ->find($id);

        $em = new EMService($this->app['orm.em']);

        if(!$em->delete($user)) {
            return $this->app->json(['msg' => 'Error to delete user'], 401);
        }

        return $this->app->json(['msg' => 'User deleted with success'], 200);
    }
}