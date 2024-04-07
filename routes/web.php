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

Route::get('/bimas', function () {
    return "Hallo Bima Sanjaya";
});

route::redirect("/yuhu", "/bimas");

route::fallback(function () {
    return ("404 Not Found ya");
});

route::view("/hello", 'hello', ['name'=> 'Bima']);

Route::get('/hello2', function () {
    return view('hello', ['name'=> 'Sanjaya']);
});

route::get('/admin', function () {
    return view('admin.admin', ['admin'=> 'ADMIN PRAKA']);
});

route::get('/product/{id}', function ($productId) {
    return "Products :" . $productId;
}) ->name("product.detail");

route::get("/product/{product}/items/{item}", function ($productId, $itemId) {
    return "Products :". $productId .", Item :". $itemId;
}) ->name("product.item.detail");

Route::get("/categories/{id}", function (string $categoryId) {
    return "Category $categoryId";
} ) ->where("id", '[0-9]+') ->name('category.detail');

route::get('/guru/{id?}', function ( string $guruId = "1" ) {
    return "Guru :$guruId";
}) ->where("id","[0-9]+") -> name("guru.detail");

Route::get("/conflict/bima", function ( ) {
    return "Conflict :Bima Sanjaya";
});

route::get("/conflict/{name}", function ( string $name ) {
    return "Conflict :$name";
});

route::get("/produk/{id}", function ( string $produkId ) {
    $link = route("product.detail", ["id"=> $produkId ] );
    return "Link $link";
});

route::get("/produk-redirect/{id}", function ( $produktId) {
    return redirect() -> route("product.detail", ["id"=> $produktId ] );
}   );
