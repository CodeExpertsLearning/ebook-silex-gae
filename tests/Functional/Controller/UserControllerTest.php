<?php
namespace CodeExperts\Functional\Controller;

use CodeExperts\App\FunctionalTestCase;

class UserControllerTest extends FunctionalTestCase
{
    public function testAInsertNewUser()
    {
        $client = $this->createClient();

        $data = array(
            'name' => 'User Test',
            'email' => 'emailTest@email.com',
            'username' => 'userTest',
            'password' => '123456'
        );

        $response = $client->request('POST', '/users', [
            'form_params' => $data
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('User created with success', json_decode($response->getBody())->msg);
    }

    public function testGetAllUsers()
    {
        $client = $this->createClient();

        $response = $client->request('GET', '/users');

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertObjectHasAttribute('name', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('email', json_decode($response->getBody())[0]);
        $this->assertObjectHasAttribute('username', json_decode($response->getBody())[0]);
    }

    public function testGetASpecificUser()
    {
        $client = $this->createClient();

        $users = $client->request('GET', '/users');

        $id    = json_decode($users->getBody())[0]->id;

        $response = $client->request('GET', '/users/' . $id);

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertObjectHasAttribute('name', json_decode($response->getBody()));
        $this->assertObjectHasAttribute('email', json_decode($response->getBody()));
        $this->assertObjectHasAttribute('username', json_decode($response->getBody()));
    }

    public function testUpdateAUser()
    {
        $client = $this->createClient();

        $users = $client->request('GET', '/users');

        $id    = json_decode($users->getBody())[0]->id;

        $dataUpdate = array(
            'name' => 'User Test Edited',
            'email' => 'emailTest@email.com',
            'username' => 'userTest',
            'password' => '123456',
            'id'       => $id
        );

        $response = $client->request('PUT', '/users', [
            'form_params' => $dataUpdate
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('User updated with success', json_decode($response->getBody())->msg);
    }

    public function testDeleteAUser()
    {
        $client = $this->createClient();


        $users = $client->request('GET', '/users');

        $id    = json_decode($users->getBody())[0]->id;


        $response = $client->request('DELETE', '/users/' . $id);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('User deleted with success', json_decode($response->getBody())->msg);
    }
}