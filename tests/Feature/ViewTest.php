<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
  
    public function testView()
    {
    $this->get("/hello")
        ->assertSeeText("Hello Bima");
    $this->get("/hello2")
        ->assertSeeText("Hello Sanjaya");
    }
    
    public function testNested(){
        $this->get("/admin")
        ->assertSeeText("Dashboard ADMIN PRAKA");
    }
}
