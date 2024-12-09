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
})->name('product.detail');

Route::get('products/{product}/items/{item}', function($productId, $itemId){
    return "product $productId, Item $itemId";
})->name('product.item.detail');

Route::get('/categories/{id}', function($categoryId){
    return "Categories : ". $categoryId;
})->where('id', '[0-9]+'); 


Route::get('/users/{id?}', function($userId = '404'){
    return "Users : $userId";
})->name('category.detail');

Route::get('/conflict/{name}', function($name){
    return "Conflict $name";
});

Route::get('/conflict/toni', function(){
    return "Conflict toni ramdani";
});

Route::get('/produk/{id}', function($id){
    $link = route('product.detail', ['id' => $id]);
    return "Link $link";
});

Route::get('/produk-redirect/{id}', function($id){
    return redirect()->route('product.detail', ['id' => $id]);
});



Route::get('/controller/hello/request', [\App\Http\Controllers\HelloController::class, 'request']);
Route::get('/controller/hello/{name}', [\App\Http\Controllers\HelloController::class, 'hello']);

Route::get('/input/hello', [\App\Http\Controllers\InputController::class, 'hello']);
Route::post('/input/hello', [\App\Http\Controllers\InputController::class, 'hello']);

Route::post('/input/hello/first', [\App\Http\Controllers\InputController::class, 'helloFirstName']);

Route::post('/input/hello/input', [\App\Http\Controllers\InputController::class, 'helloInput']);

