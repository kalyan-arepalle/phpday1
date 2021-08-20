<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerTest extends TestCase
{

    public function test_insertUser()
    {
        $response = $this->json('POST','/contact',[
            'name'=>'pqr', 'email'=>'pqr@r1z.com', 'mobile' =>1312111211]);
        $response
        -> assertStatus(200)
        ->assertJsonStructure([
            "Contact",
            "Message",
        ]);
    }

    public function test_getUserByInput()
    {
        $response = $this->json('GET','/contact/?name=abc');

        $response->assertStatus(200);

        $response = $this->json('GET','/contact/?email=a12@paw.com');

        $response->assertStatus(200);

        $response = $this->json('GET','/contact/?mobile=1241241231');

        $response->assertStatus(200);
    }

    public function test_getUsers()
    {
        $response = $this->get('/contacts');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'List of users in db' =>[
               '*' => [
                    'name',
                    'mobile',
                ]]]);
    }

    public function test_deleteUserByName()
    {
        $response = $this->json('DELETE','/contact/byName',["name"=>"pqr"]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'These user(s) were deleted' =>[
                '*' => [
                    'id',
                    'name',
                    'email',
                    'mobile',
                ]]]);
    }
}
