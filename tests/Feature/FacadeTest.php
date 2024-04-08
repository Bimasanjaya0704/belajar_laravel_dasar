<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $firstName1= config("contoh.author.first");
        $firstName2 = Config::get("contoh.author.first");

        self::assertEquals($firstName1, $firstName2);
        // var_dump(Config::all());
    }

    public function testConfigDepedency()
    {
        $config = $this->app->make("config");

        $firstName1 = config("contoh.author.first");
        $firstName2 = Config::get("contoh.author.first");
        $firstName3 = $config->get("contoh.author.first");

        self::assertEquals($firstName1, $firstName2);
        self::assertEquals($firstName1, $firstName3);
        // var_dump($config->all());
    }

    public function testFacadeMocks(){
        Config::shouldReceive("get")
        ->with("contoh.author.first")
        ->andReturn("Bima Sanjaya");

        $firstName = Config::get("contoh.author.first");
        self::assertEquals("Bima Sanjaya", $firstName);
    }
}
