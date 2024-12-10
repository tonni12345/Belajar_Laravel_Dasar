<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileStorageTest extends TestCase
{
    public function testStorageLocal()
    {
        $filesystem = Storage::disk("local");

        $filesystem->put('file.txt', 'Tonni Ramdani Mubaroq');

        $content = $filesystem->get('file.txt');

        self::assertEquals("Tonni Ramdani Mubaroq", $content);

    }

    public function testStoragePublic()
    {
        $filesystem = Storage::disk("public");

        $filesystem->put('file.txt', 'Tonni Ramdani Mubaroq');

        $content = $filesystem->get('file.txt');

        self::assertEquals("Tonni Ramdani Mubaroq", $content);

    }
}
