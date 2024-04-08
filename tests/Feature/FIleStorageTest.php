<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FIleStorageTest extends TestCase
{
    
    public function testStorage()
    {
    $fileSystem = Storage::disk("local");
    $fileSystem->put('file.txt','Nama saya Bima');

    $content = $fileSystem->get('file.txt');

    self::assertEquals("Nama saya Bima", $content);
    }

    public function testStoragePublic()
    {
    $fileSystem = Storage::disk("public");
    $fileSystem->put('file.txt','Nama saya Bima');

    $content = $fileSystem->get('file.txt');

    self::assertEquals("Nama saya Bima", $content);
    }
}
