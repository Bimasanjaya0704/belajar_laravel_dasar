<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

route::get("/controller/hello/request", [\App\Http\Controllers\HelloController::class, 'request']);
route::get("/controller/hello/{name}", [\App\Http\Controllers\HelloController::class,"hello"]);

route::get('/input/hello', [\App\Http\Controllers\InputController::class,'hello']);
route::post('/input/hello', [\App\Http\Controllers\InputController::class,'hello']);
route::post('/input/hello/first', [\App\Http\Controllers\InputController::class, 'helloFirst']);
route::post('/input/hello/input', [\App\Http\Controllers\InputController::class, 'helloInput']);
route::post('/input/hello/array', [\App\Http\Controllers\InputController::class, 'helloArray']);

route::post('/input/type', [\App\Http\Controllers\InputController::class, 'inputType']);
route::post('/input/filter/only', [\App\Http\Controllers\InputController::class, 'filterOnly']);
route::post('/input/filter/except', [\App\Http\Controllers\InputController::class, 'filterExcept']);
route::post('input/filter/merge', [\App\Http\Controllers\InputController::class, 'filterMerge']);

route::post('/file/upload', [\App\Http\Controllers\FileController::class,'upload'])
->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

route::get('/response/hello', [\App\Http\Controllers\ResponseController::class,'response']);
route::get('/response/header', [\App\Http\Controllers\ResponseController::class,'header']);

route::get('/response/type/view', [\App\Http\Controllers\ResponseController::class,'responseView']);
route::get('/response/type/json', [\App\Http\Controllers\ResponseController::class,'responseJson']);
route::get('/response/type/file', [\App\Http\Controllers\ResponseController::class,'responseFile']);
route::get('/response/type/download', [\App\Http\Controllers\ResponseController::class,'responseDownload']);

route::get('/cookie/set', [\App\Http\Controllers\CookieController::class, 'createCookie']);
route::get('/cookie/get', [App\Http\Controllers\CookieController::class,'getCookie']);
route::get('/cookie/delete', [App\Http\Controllers\CookieController::class,'deleteCookie']);

route::get('/redirect/from', [App\Http\Controllers\RedirectResponse::class,'redirectFrom']);
route::get('/redirect/to', [App\Http\Controllers\RedirectResponse::class,'redirectTo']);

route::get('/redirect/name', [App\Http\Controllers\RedirectResponse::class, 'redirectName']);
route::get('/redirect/name/{name}', [App\Http\Controllers\RedirectResponse::class,'redirectHello'])
->name('redirect-hello');
route::get('/redirect/action', [App\Http\Controllers\RedirectResponse::class,'redirectAction']);
route::get('/redirect/bims', [App\Http\Controllers\RedirectResponse::class, 'redirectAway']);

route::get('/middleware/api', function(){
    return "OK";
})->middleware(['contoh:BS,401']);

route::get('/middleware/group', function(){
    return "GROUP";
})->middleware(['BS']);

route::get('/form', [App\Http\Controllers\FormController::class,'form']);
route::post('/form', [App\Http\Controllers\FormController::class,'submitForm']);

route::get('/url/current', function (){
    return URL::full();
});

route::get('/url/named', function(){
    return route('redirect-hello', ['name' => 'bima']);
});
route::get('/url/action', function(){
    return action([\App\Http\Controllers\FormController::class,'form'], []);
});

route::get('/sesion/create', [App\Http\Controllers\SesionController::class,'createSesion']);
route::get('/sesion/get', [App\Http\Controllers\SesionController::class,'getSession']);

route::get('/error/sample', function(){
    throw new \Exception('Sample Error');
});
route::get('/error/manual', function(){
    report(new Exception('Sample Error'));
    return 'OK';
});
route::get('/error/validation', function(){
    throw new \App\Exceptions\ValidationException('Validation Error');
});

route::get('/abort/400', function(){
    abort(400,'Upss Validation Error');
});
route::get('/abort/401', function(){
    abort(401);
});
route::get('/abort/500', function(){
    abort(500);
});
