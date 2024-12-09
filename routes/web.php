<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pzn', function(){
    return "Hello Programmer Zaman Now";
});

Route::redirect('/youtube', '/pzn');

Route::fallback(function(){
    return "404 halaman tidak ada";
});


// bisa seperti ini 
// Route::view('/hello', 'hello', ['name' => 'Eko']);

// atau ini
Route::get('/hello', function(){
    $names['name'] = "Tonni";
    return view('hello', $names);
});

Route::get('/hello-again', function(){
    return view('hello', ['name' => 'Foo']);
});

Route::get('/hello-world', function(){
    return view('hello.world', ['name' => 'Kareen']);
});

Route::get('products/{id}', function($productId){
    return "product $productId";
});

Route::get('products/{product}/items/{item}', function($productId, $itemId){
    return "product $productId, Item $itemId";
});

Route::get('/categories/{id}', function($categoryId){
    return "Categories : ". $categoryId;
})->where('id', '[0-9]+'); 


Route::get('/users/{id?}', function($userId = '404'){
    return "Users : $userId";
});

