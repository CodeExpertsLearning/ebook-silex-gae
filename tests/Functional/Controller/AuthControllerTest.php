<?php
namespace CodeExperts\Functional\Controller;

use CodeExperts\App\FunctionalTestCase;

class AuthControllerTest extends FunctionalTestCase
{
    public function testIfAuthenticationWorksWithSuccess()
    {
        $response = $this->makeLogin();
        
        $this->assertEquals(200, $response->getStatusCode());

        $this->assertObjectHasAttribute('token', json_decode($response->getBody()));

    }

    public function testSendTokenToAccessSpecificRouteNotAlowedWithoutToken()
    {
        $response = $this->makeLogin();

        $token = json_decode($response->getBody())->token;

        $client = $this->createClient();

        $data = array(
            'name' => 'User Test',
            'email' => 'emailTest@email.com',
            'username' => 'userTest',
            'password' => '123456'
        );

        $response = $client->request('POST', '/users', [
            'form_params' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('User created with success', json_decode($response->getBody())->msg);

    }

    public function testSendOfInvalidToken()
    {
        $token = "";
        $client = $this->createClient();        

        $data = array(
            'name' => 'User Test',
            'email' => 'emailTest@email.com',
            'username' => 'userTest',
            'password' => '123456'
        );

        $response = $client->request('POST', '/users', [
            'form_params' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals('Invalid Token!', json_decode($response->getBody())->msg);
    }

}