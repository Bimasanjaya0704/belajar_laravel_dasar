<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SesionControllerTest extends TestCase
{
   
    public function testCreateSesion()
    {
    $this->get('/sesion/create')
    ->assertSeeText('OK')
    ->assertSessionHas('userId', 'bima')
    ->assertSessionHas('isMember','true');
    }

    public function testGetSession(){
        $this->withSession(['userId'=> 'bima','isMember'=> 'true'])
        ->get('/sesion/get')
        ->assertSeeText('User Id : bima, Is Member : true');
    }
}
