<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request):string
    {
        $name = $request->input('name'); 
        // $name = $request->query('name'); //ini buat array query param

        $name = $request->name; 
        

        return "Hello " . $name;
    }

    public function helloFirstName(Request $request): string
    {
        $firstName = $request->input('name.first');

        return "Hello $firstName";
    }

    public function helloInput(Request $request): string
    {
        $input = $request->input(); // method input tanpa parameter mengambil semua request yang ada

        return json_encode($input);
    }

    public function helloArray(Request $request): string {
        $names = $request->input("products.*.name");

        return json_encode($names);
    }
}
