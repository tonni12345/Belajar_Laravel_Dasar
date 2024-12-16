<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    public function redirectTest()
    {
        $this->get('/redirect/from')->assertRedirect('/redirect/to');
    }

    public function testRedirectName()
    {
        $this->get('/redirect/name')->assertRedirect('/redirect/name/Tonni');
    }

    public function testRedirectAction()
    {
        $this->get('/redirect/action')->assertRedirect('/redirect/name/Nadyra');
    }

   
}
