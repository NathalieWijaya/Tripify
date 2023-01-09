<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => ['auth', 'verified', 'user']], function () {

    Route::get('/requestTrip/{id}', [ReqTripController::class, 'showProvince']);
    Route::get('getPlace/{id}', [ReqTripController::class, 'showPlace']);
    Route::post('/requestTrip/{id}', [ReqTripController::class, 'store']);

    Route::get('/cart/{id}', [CartController::class, 'index']);

    Route::get('/purchase', [TransactionController::class, 'purchase']);
    
});
Auth::routes(['verify' => true]);

//Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/payment', function () {
    return view('paymentHistory');
});




Route::get('/addTour', [TourController::class, 'showProvince']);
Route::get('getPlaceTour/{id}', [TourController::class, 'showPlace']);
Route::post('/addTour', [TourController::class, 'store']);


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/addDestination', [DestinationController::class, 'showProvince']);
    Route::post('/addDestination', [DestinationController::class, 'store']);
});


Route::get('/inbox/{id}', [InboxController::class, 'toInbox'])->middleware('auth');

Route::post('/inbox/{id}/filter', [InboxController::class, 'filter'])->middleware('auth');

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/cart/{id}', [CartController::class, 'index'])->middleware('user');
    Route::post('/purchase', [CartController::class, 'getCheckedCart'])->middleware('user');
    
});

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);


