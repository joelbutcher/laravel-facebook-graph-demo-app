<?php

use Illuminate\Support\Facades\Route;
use JoelButcher\Facebook\Facades\Facebook;

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

Route::get('/redirect', fn () => redirect(Facebook::getRedirect()));

Route::get('/return', function () {
    return [
        'token' => Facebook::getToken(),
        'user' => Facebook::getUser()->asArray(),
    ];
});
