<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_signin()
    {
        $response = $this->post('/api/logueo/signin',[
            'email'=>'miguel@gmail.com'
        ]);

        $response->assertJson([
            'status'=>200
        ]);
    }
    public function test_api_signout()
    {
        $response = $this->post('/api/logueo/signout',[
            'email'=>'miguel@gmail.com'
        ]);

        $response->assertJson([
            'status'=>200
        ]);
    }
}
