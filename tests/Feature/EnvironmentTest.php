<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Env;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EnvironmentTest extends TestCase
{
    public function testGetEnv(){

        // cara mengambil nilai dari environment os, sayangnya saya menggunakan windows jadi mungkin berbeda.
        // $youtube = env('YOUTUBE');

        // cara mengambil dari .env laravel, ternyta sama saja cara nyarinya. mungkin jika tidak ada di .env trus nyari ke env di operasi sistem
        $youtube = env("YOUTUBE");

        self::assertEquals("Programmer Zaman Now", $youtube);
    }

    public function testDefaultValue(){
         // memasukan default value (menggunakan function)
        //  $author = env("AUTHOR", "Tonni Ramdani");

        //  menggunakan class dan static method
        $author = Env::get('AUTHOR', "Tonni Ramdani");

         self::assertEquals("Tonni Ramdani", $author);


    }
}
