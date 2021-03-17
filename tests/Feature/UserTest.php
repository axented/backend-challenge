<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_blogger_profile(){
        $response = $this->get('/api/blogger/profile/2');
        $response->assertJson([
            'status'=>200
        ]);
    }

    public function test_api_blogger_list(){
        $response = $this->get('/api/blogger/list/2');
        $response->assertJson([
            'status'=>200
        ]);
    }

    public function test_api_blogger_favorite(){
        $response = $this->get('/api/blogger/favorite/2');
        $response->assertJson([
            'status'=>200
        ]);
    }

    public function test_api_blogger_store(){
        $response = $this->post('/api/blogger/store',[
            'name'=>'Miguel',
            'email'=>'miguel@gmail.com',
            'website'=>'miguel.io',
            'picture_url'=>'https:\/\/cdn.pinkermoda.com\/pinkermoda\/2020\/12\/auronplay-825x442.jpg'
        ]);
        $response->assertOK();
    }

    public function test_api_blogger_addFriend(){
        $response = $this->post('/api/blogger/addFriend',[
            'id_blogger'=>'2',
            'id_friend'=>'1'
        ]);
        $response->assertOK();
    }

    public function test_api_blogger_deleteFriend(){
        $response = $this->post('/api/blogger/deleteFriend',[
            'id_blogger'=>'2',
            'id_friend'=>'1'
        ]);
        $response->assertOK();
    }

    public function test_api_blogger_search(){
        $response = $this->post('/api/blogger/search',[
            'search'=>'2'
        ]);
        $response->assertOK();
    }
}
