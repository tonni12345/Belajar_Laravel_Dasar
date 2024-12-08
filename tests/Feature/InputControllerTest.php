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
   
}
