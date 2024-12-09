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
}
