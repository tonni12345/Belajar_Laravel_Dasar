<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;

use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
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
        // self::assertNotSame($foo1, $foo2);
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

    public function testInstance(){

        $person = new Person("Nadyra Riak", "Pasifica");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); 
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Nadyra Riak", $person->firstName);
        self::assertEquals("Pasifica", $person1->lastName);
        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
        self::assertSame($person, $person2);
        
    }

    public function testDependencyInjectionServiceContainer(){
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app){
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class); //secara otomatisi mencocokkan dependency yang ada pada service container(app)
        $bar2 = $this->app->make(Bar::class);

        // jika tidak ada pengenalan pada service container itu juga akan otomatis di inject namun objectnya selalu baru
        
        self::assertEquals("Foo and Bar", $bar1->bar());
        self::assertEquals("Foo", $foo->foo());
        self::assertSame($foo, $bar1->foo);

        // self::assertNotSame($bar1, $bar2); //ini object yang berbeda sebelum membuat singleton pada kelas bar
        self::assertSame($bar1, $bar2);
    }

    public function testHelloService(){
        // melakukan binding interface
        // $this->app->bind(HelloService::class, HelloServiceIndonesia::class);
        // bisa menggunakan singleton
        // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        // bisa menggunakan closure jika classnya kompleks
        $this->app->singleton(HelloService::class, function($app){
            return new HelloServiceIndonesia();
        });

        // ketika kita make interface make yang dipanggilnya yang ngeimplementasinya, karena interface tidak bisa di instalsiasi
        $helloService = $this->app->make(HelloService::class);

        

        self::assertEquals("Hallo Tonni", $helloService->hello("Tonni"));
    }
}
