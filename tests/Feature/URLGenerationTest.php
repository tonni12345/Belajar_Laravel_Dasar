<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testURLCurrent()
    {
        $this->get('/url/current?name=Tonni')->assertSeeText('/url/current?name=Tonni');
    }

    public function testNamed()
    {
        $this->get('/url/named')->assertSeeText('/redirect/name/Tonni');
    }

    public function testAction(){
        $this->get('/url/action')->assertSeeText('/form');
    }
}
