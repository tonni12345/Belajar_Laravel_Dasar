<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request):string
    {
        $name = $request->input('name');
        return "Hello " . $name;
    }

    public function helloFirstName(Request $request): string
    {
        $firstName = $request->input('name.first');

        return "Hello $firstName";
    }
}
