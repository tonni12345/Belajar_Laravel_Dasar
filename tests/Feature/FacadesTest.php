<?php

namespace Tests\Feature;

use Tests\TestCase;
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
        var_dump(Config::all());
    }
}
