<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{

    public function testHello()
    {
       $this->get("/controller/hello/Bima")
       ->assertSeeText("Halo Bima");
    }

    public function testRequest(){
        $this->get("/controller/hello/request", [
            "accept"=> "plain/text",
        ])
        ->assertSeeText("controller/hello/request")
        ->assertSeeText("http://localhost/controller/hello/request")
        ->assertSeeText("GET")
        ->assertSeeText("plain/text");

    }
}
