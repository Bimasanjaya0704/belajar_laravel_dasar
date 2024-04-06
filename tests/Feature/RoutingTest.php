<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{

    public function testRouting()
    {
    $this->get("/bimas")
    ->assertStatus(200)
    ->assertSeeText('Hallo Bima Sanjaya');
    }
    
    public function testRedirect(){
        $this->get('/yuhu')
        ->assertRedirect('/bimas');
    }

    public function testFallback() {
        $this->get('/nema')
        ->assertSeeText("404 Not Found ya");

        $this->get("/yuu")
        ->assertSeeText("404 Not Found ya");

        $this->get("/guta")
        ->assertSeeText("404 Not Found ya");
    }
}
