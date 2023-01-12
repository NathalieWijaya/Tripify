<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentHistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReqTripController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Auth;


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
Route::get('/home', function () {
    return view('home');
});
// Route::get('/home', [HomeController::class, 'index']);
Auth::routes();

Route::group(['middleware' => ['auth', 'user']], function () {

    Route::get('/requestTrip', [ReqTripController::class, 'showProvince']);
    Route::get('getPlace/{id}', [ReqTripController::class, 'showPlace']);
    Route::post('/requestTrip/{id}', [ReqTripController::class, 'store']);

    Route::get('/cart/{id}', [CartController::class, 'index']);
    Route::post('/purchase', [CartController::class, 'getCheckedCart']);
    
    
});
Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/addDestination', [DestinationController::class, 'showProvince']);
    Route::post('/addDestination', [DestinationController::class, 'store']);
    Route::get('/addTour', [TourController::class, 'showProvinceAndCategory']);
    Route::get('getPlaceTour/{id}', [TourController::class, 'showPlace']);
    Route::post('/addTour', [TourController::class, 'store']);
    Route::get('/delete/cart/{id}', [CartController::class, 'delete']);
});


Route::get('/inbox/{id}', [InboxController::class, 'toInbox'])->middleware('auth');

Route::post('/inbox/{id}/filter', [InboxController::class, 'filter'])->middleware('auth');
Route::get('/payment/{id}', [PaymentHistoryController::class, 'index'])->middleware('auth');


Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);


