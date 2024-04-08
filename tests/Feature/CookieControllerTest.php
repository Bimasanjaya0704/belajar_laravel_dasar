<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
   
    public function testCookie()
    {
        $this->get('/cookie/set')
        ->assertSeeText('Hello Cookie')
        ->assertCookie('User-Id','Bima')
        ->assertCookie('Is-Member','true');
    }

    public function testGetCookie(){
        $this->withCookie('User-Id','Bima')
        ->withCookie('Is-Member','true')
        ->get('/cookie/get')
        ->assertJson(
            [
            'UserId'=> 'Bima',
            'IsMember'=> 'true',
        ]);
    }
}
