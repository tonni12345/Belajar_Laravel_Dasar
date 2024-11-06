<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppEnvironmentTest extends TestCase
{
    public function testAppEnv(){
        // harusnya local isi dari app env nya tpi karena kita menjalankan aplikasi nya menggunakan unit test jadi isi dari env nya di override di phpunit.xml
        if(App::environment('testing')){
            self::assertTrue(true);
        }
    }
}
