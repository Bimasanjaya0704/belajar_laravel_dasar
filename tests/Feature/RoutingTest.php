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

    public function testRouteParameter() {
        $this->get("/product/1")
        ->assertSeeText("Products :1");
        $this->get("product/2")
        ->assertSeeText("Products :2");

        $this->get("/product/1/items/bola")
        ->assertSeeText("Products :1, Item :bola");
    }

    public function testRouteParametersRegex() {
        $this->get("/categories/1")
        ->assertSeeText("Category 1");

        $this->get("/categories/250")
        ->assertSeeText("Category 250");
    }

    public function testRouteParameterOptional() {
        $this->get("/guru/10")
        ->assertSeeText("Guru :10");

        $this->get("/guru")
        ->assertSeeText("Guru :1");
    }

    public function testRouteParameterConflict() {
        $this->get("/conflict/budi")
        ->assertSeeText("Conflict :budi");

        $this->get("/conflict/bima")
        ->assertSeeText("Conflict :Bima Sanjaya");
    }

}
