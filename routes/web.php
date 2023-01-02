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
    return view('home');
});

Route::get('/inbox/admin', function () {
    return view('adminInbox');
});

Route::get('/inbox/user', function () {
    return view('userInbox');
});

Route::get('/purchase', function () {
    return view('purchase');
});
