<?php

namespace Tests\Feature;

use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;
use Illuminate\Foundation\Testing\WithFaker;

use function PHPUnit\Framework\assertNotNull;
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

    public function testBind(){
        // memberitahu kalau membuat object person tuh harus kayak gini
        $this->app->bind(Person::class, function($app){
            return new Person("Tonni", "Ramdani");
        });

        $person = $this->app->make(Person::class);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        
        self::assertNotNull($person);
        self::assertEquals("Tonni", $person1->firstName);
        self::assertEquals("Ramdani", $person->lastName);
        self::assertNotSame($person1, $person2);
    }

    public function testSingleton(){
        $this->app->singleton(Person::class, function($app){
            return new Person("Tonni", "Ramdani");
        });

        $person1 = $this->app->make(Person::class); 
        $person2 = $this->app->make(Person::class); // object yang sama dengan yang atas

        self::assertSame($person1, $person2);
        self::assertEquals("Tonni", $person1->firstName);
        self::assertEquals("Ramdani", $person2->lastName);
    }
}
