<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacadesTest extends TestCase
{
    public function testConfig(){
        // menggunakan helper function                                            
        $firstName = config("contoh.author.firstName");

        // menggunakan facades
        $firstName1 = Config::get("contoh.author.firstName");

        self::assertEquals($firstName, $firstName1);

        // print semua config
        // var_dump(Config::all());
    }

    public function testConfigDependency(){
        // menggunakan service container
        $config = $this->app->make("config");
        $firstName3 = $config->get("contoh.author.first");
        
        // menggunkanan helper function
        $firstName1 = config("contoh.author.first");
        // menggunakan facades
        $firstName2 = Config::get("contoh.author.first");

        self::assertEquals($firstName3, $firstName1);
    }

    public function testFacadesMock(){
        // mocking test adalah teknik pengujian perangkat lunak yang menggunakan objek tiruan untuk menggantikan object asli
        // contoh, semua facades ada should receivenya
        Log::shouldReceive();
        App::shouldReceive();
        Crypt::shouldReceive();
        Config::shouldReceive('get')
            // parameter 
            ->with('contoh.author.first')
            ->andReturn("Tonni gg");
        
        $firstName = Config::get("contoh.author.first");

        self::assertEquals("Tonni gg", $firstName);
    }
}
