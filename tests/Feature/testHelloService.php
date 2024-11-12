<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class testHelloService extends TestCase
{
    public function testHelloService(){
        // melakukan binding interface
        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        // ketika kita make interface make yang dipanggilnya yang ngeimplementasinya, karena interface tidak bisa di instalsiasi
        $helloService = $this->app->make(HelloService::class);

        self::assertEquals("Hallo Tonni", $helloService->hello("Tonni"));
    }
}
