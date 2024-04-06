<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

class EnvirontmenTest extends TestCase
{
   public function testGetEnv(){
    $youtube = env('YOUTUBE');

    self::assertEquals('Programmer Zaman Now', $youtube);    
   }
   
   public function testDefaultEnv (){
    $author = env::get('AUTHOR', 'Bima');

    self::assertEquals('Bima', $author);
   }
}
