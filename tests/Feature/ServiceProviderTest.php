<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Services\HelloService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {

        $foo = $this->app->make(Foo::class); //singleton karena di register di service provider FooBarServiceProvider
        $foo1 = $this->app->make(Foo::class);

        $bar = $this->app->make(Bar::class);
        $bar1 = $this->app->make(Bar::class);

        self::assertSame($foo, $foo1);
        self::assertSame($bar, $bar1);

        self::assertEquals("Foo and Bar", $bar->bar());
        self::assertEquals("Foo and Bar", $bar1->bar());

        self::assertSame($foo, $bar->foo);
        self::assertSame($foo1, $bar1->foo);
    }

    public function testPropertySingletons()
    {
        $helloService1 = $this->app->make(HelloService::class);
        $helloService2 = $this->app->make(HelloService::class);

        self::assertEquals("Hallo Tonni", $helloService1->hello("Tonni"));

        self::assertSame($helloService1, $helloService2);
    }
}
