<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
   
    public function testConfig()
    {
        $firstName = config("contoh.author.first");
        $lastName = config("contoh.author.last");
        $email = config("contoh.email");
        $website= config("contoh.web");

        self::assertEquals("Bima", $firstName);
        self::assertEquals("Sanjaya", $lastName);
        self::assertEquals("bima@mail.com", $email);
        self::assertEquals("bimasanjaya.me", $website);
    }
}
