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

// here is the first thing the video talked about gb
// welcome can be found under views under resources. whatever i change this to will display as the homepage gb

Route::get('/', function () {
    return "Main Page";
});

Route::get('/hello', function () {
    return "hello";
});

Route::get('/greet/{name}', function ($name) {
    return 'hello ' . $name . '!';
});

Route::get('/hallo', function () {
    return redirect('/hello');
});

// php artisan route:list