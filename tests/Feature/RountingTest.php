<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RountingTest extends TestCase
{
    public function testBasicRouting(){
        // test routing tanpa menjalankan aplikasinya

        $this->get("/pzn")
             ->assertStatus(200)
             ->assertSeeText("Hello Programmer Zaman Now");
    }

    public function testRedirectRouting(){
        $this->get("/youtube")->assertRedirect("/pzn");
    }

    public function testFallBack(){
        $this->get("/tidakada")->assertSeeText("404");
        $this->get("/oops")->assertSeeText("404");
        $this->get("/oalah")->assertSeeText("404");
    }

    public function testRouteParameter(){
        $this->get('/products/1')->assertSeeText('product 1');

        $this->get('/products/2')->assertSeeText('product 2');


        $this->get('products/1/items/yyy')->assertSeeText('product 1, Item yyy');

    }

    public function testRouteRegex(){
        $this->get('/categories/1')->assertSeeText("Categories : 1");

        $this->get('/categories/ss')->assertSeeText("404 halaman tidak ada");
    }

    public function testRouteOpsional(){
        $this->get('/users/404')->assertSeeText('Users : 404');

        $this->get('/users/toni')->assertSeeText('Users : toni');
    }


    public function testConflictParameterRoute(){
        //$this->get('/conflict/toni')->assertSeeText("Conflict toni ramdani"); // terjadi conflict route paramater karena yang ini berada di bawah route /conflict/{name}
        $this->get('/conflict/toni')->assertSeeText("Conflict toni");
    }

}
