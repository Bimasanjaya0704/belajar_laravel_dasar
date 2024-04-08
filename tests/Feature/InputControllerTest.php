<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
      $this->get("input/hello?name=Bima")
      ->assertStatus(200)
      ->assertSeeText("Hello Bima");

      $this->post("input/hello", ["name"=> "Bima"])
      ->assertSeeText("Hello Bima");
    }

    public function testInputNested(){
        $this->post('/input/hello/first', 
        ['name'=> 
            ['first'=>'bima',
            'last'=> 'sanjaya']])
        ->assertSeeText('Hello bima');                                  
    }

    public function testInputAll(){
        $this->post('/input/hello/input', 
        ['name'=> [
            'first'=>'bima',
            'last'=> 'sanjaya']])
        ->assertSeeText('name') 
        ->assertSeeText('first') 
        ->assertSeeText('last')
        ->assertSeeText('bima')                                  
        ->assertSeeText('sanjaya');
    }

    public function testInputArray(){
        $this->post('/input/hello/array', [
            'products' => [
            [
                'name'=> 'Apple Macbook 14',
                'price' =>120000],
            [
                'name'=> 'Iphone 13 XR', 
                'price' => 32000],
        ]])
        ->assertSeeText('Apple Macbook 14')->assertSeeText('Iphone 13 XR');
    }

    public function testInputType(){
        $this->post('/input/type', [
            'name' => "bima",
            'married' => 'true',
            'birth_date' => '2002-04-07'
        ])
        ->assertSeeText('bima')
        ->assertSeeText('true')
        ->assertSeeText('2002-04-07');
    }
}
