<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
   public function testInput()
   {
        $this->get('/input/hello?name=Toni')->assertSeeText('Hello Toni');

        $this->post('/input/hello', [
            "name" => "Tonni"
        ])->assertSeeText('Hello Tonni');
   }

   public function testNestedInput()
   {
        $this->post('/input/hello/first', [
            "name" => [
                "first" => "Tonni",
                "last" => "Ramdani"
            ]
            ])->assertSeeText("Hello Tonni");
   }

   public function testNestedAll()
   {
        $this->post('/input/hello/input', [
            "name" => [
                "first" => "Tonni",
                "last" => "Ramdani"
            ]
            ])->assertSeeText("name")->assertSeeText("first")->assertSeeText("last")->assertSeeText("Tonni")->assertSeeText("Ramdani");
   }

   public function testArrayInput()
   {
        $this->post('/input/hello/array', [
            'products' => [
                [
                    'name' => 'Apple Mac Book Pro',
                    'price' => 25000000
                ],
                [
                    'name' => 'Samsung Galaxy S',
                    'price' => 25000000
                ]
            ]
        ])->assertSeeText('Apple Mac Book Pro')->assertSeeText('Samsung Galaxy S');
   }

   public function testInputType()
   {
        $this->post('/input/type', [
            'name' => 'Budi',
            'married' => 'true',
            'birth_date' => '1990-10-10'
        ])->assertSeeText('Budi')->assertSeeText('true')->assertSeeText('1990-10-10');
   }

   public function testFilterOnly()
   {
        $this->post('/input/filter/only', [
            "name" => [
                "first" => "Tonni",
                "middle" => "Ramdani",
                "last" => "Mubaroq"
            ]
        ])->assertSeeText("Tonni")->assertSeeText("Mubaroq")->assertDontSeeText("Ramdani");
   }

   public function testFilterExcept()
   {
        $this->post('/input/filter/except',[
            "name" => "Tonni",
            "username" => "true",
            "admin" => "true"
        ])->assertSeeText("Tonni")->assertSeeText("true")->assertDontSeeText("admin");
   }
   
}
