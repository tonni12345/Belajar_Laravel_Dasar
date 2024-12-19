<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put('userId', 'Tonni');
        $request->session()->put('isMember', 'true');

        // bisa gini
        // Session::put()
        return "OK";
    }
}
