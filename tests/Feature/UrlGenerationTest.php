<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlGenerationTest extends TestCase
{
    
    public function testUrlGeneration()
    {
        $this->get('/url/current?name=bima')
        ->assertSeeText('/url/current?name=bima');
    }

    public function testNamed(){
        $this->get('/url/named')
        ->assertSeeText('/redirect/name/bima');
    }
     
    public function testAction(){
        $this->get('/url/action')
        ->assertSeeText('/form');
    }
}
