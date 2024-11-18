<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RountingTest extends TestCase
{
    public function testBasicRouting(){
        // test routing tanpa menjalankan aplikasinya

        $this->get('/pzn')
             ->assertStatus(200)
             ->assertSeeText("Hello Programmer Zaman Now");
    }
}
