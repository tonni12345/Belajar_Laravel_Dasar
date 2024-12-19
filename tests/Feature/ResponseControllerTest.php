<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
   public function testResponse()
   {
        $this->get('/response/hello')->assertStatus(200)->assertSeeText("hello response");
   }

   public function testHeader()
   {
        $this->get('/response/header')
             ->assertStatus(200)
             ->assertSeeText('Tonni')->assertSeeText('Mubaroq')
             ->assertHeader('Content-Type', 'application/json')
             ->assertHeader('Author', 'Programmer Zaman Now')
             ->assertHeader('App', 'Belajar Laravel');
   }

   public function testView()
   {
        $this->get('/response/type/view')->assertSeeText("Hello Tonni");
   }

   public function testJson()
   {
        $this->get('/response/type/json')->assertJson([
          'firstName' => 'Tonni',
          'lastName' => 'Mubaroq'
        ]);  
   }

//    public function testFile()
//    {
//           $this->get('/response/type/file')->assertHeader('Content-Type', 'image/png');
//    }

//    public function testDownload()
//    {
//           $this->get('/response/type/download')->assertDownload('Capture.png');
//    }
}
