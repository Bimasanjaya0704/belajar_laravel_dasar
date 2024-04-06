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