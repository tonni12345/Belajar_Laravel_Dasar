<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfiguration(){
        $firstName = config("contoh.author.first");
        $lastName = config("contoh.author.last");
        $email = config("contoh.email");
        $web = config("contoh.web");

        self::assertEquals("Tonni", $firstName);
        self::assertEquals("Ramdani", $lastName);
        self::assertEquals("tonniramdani@gmail.com", $email);
        self::assertEquals("https://github.com/tonni12345", $web);    
    }
}
