<?php

use App\Http\Controllers\InboxController;
use App\Http\Controllers\StatusController;
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

Route::get('/adminInbox', function () {
    return view('adminInbox');
});
Route::get('/requestTrip', function () {
    return view('requestTrip');
});
Route::get('/addDestination', function () {
    return view('addDestination');
});

Route::get('/inbox/{id}', [InboxController::class, 'toInbox']);

Route::post('/inbox/{id}/filter', [InboxController::class, 'filter']);

Route::get('/purchase', function () {
    return view('purchase');
});
