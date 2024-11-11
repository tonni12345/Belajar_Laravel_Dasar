<?php

namespace Tests\Feature;

use App\Data\Foo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceContainerTest extends TestCase
{
    public function testDependencyInjection(){
        // yang biasa kita lakukan/ membuat object secara manual
        // $foo = new Foo();

        $foo1 = $this->app->make(Foo::class); //new Foo
        $foo2 = $this->app->make(Foo::class); //new Foo

        self::assertEquals("Foo", $foo1->foo());
        self::assertEquals("Foo", $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }
}
