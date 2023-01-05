<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReqTripController;

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



// Route::get('/requestTrip', [ReqTripController::class, 'showProv']);

Route::get('/requestTrip/{id}', function () {
    $province = App\Models\Province::all();
    return view('requestTrip',['province' => $province]);
});

Route::get('getPlace/{id}', function ($id) {
    $place = App\Models\Place::where('province_id',$id)->get();
    return response()->json($place);
});
Route::post('/requestTrip/{id}', [ReqTripController::class, 'store']);

Route::get('/addTour', function () {
    return view('addTour');
});

Route::get('/addDestination', [DestinationController::class, 'showProvince']);
Route::post('/addDestination', [DestinationController::class, 'store']);

Route::get('/inbox/{id}', [InboxController::class, 'toInbox']);

Route::post('/inbox/{id}/filter', [InboxController::class, 'filter']);

Route::get('/cart/{id}', [CartController::class, 'index']);

Route::get('/purchase', [TransactionController::class, 'purchase']);


