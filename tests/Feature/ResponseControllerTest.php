<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
   
    public function testResponseController()
    {
        $this->get('/response/hello')
        ->assertStatus(200)
        ->assertSeeText('Hello Response');
    }

    public function testResponseHeader(){
        $this->get('/response/header')
        ->assertStatus(200)
        ->assertSeeText('Bima') 
        ->assertSeeText('Sanjaya')
        ->assertHeader('Conten-Type', 'application/json')
        ->assertHeader('Author','Praka')
        ->assertHeader('App','Belajar Laravel');
    }

    public function testView(){
        $this->get('/response/type/view')
        ->assertStatus(200)
        ->assertSeeText('Hello Bima');
    }

    public function testJson(){
        $this->get('/response/type/json')
        ->assertStatus(200)
        ->assertJson(['firstName' => 'Bima', 'lastName'=> 'Sanjaya']);
    }

    public function testViewFile(){
        $this->get('/response/type/file')
        ->assertHeader('Content-Type','image/png');
    }

    public function testDonwload(){
        $this->get('/response/type/download')
        ->assertDownload('ss.png');
    }
}
