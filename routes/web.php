<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PrivateTourController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReqTripController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TourController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('aboutUs');
});

Route::get('/tour/{id}', [TourController::class, 'show']);
Route::get('/tour', [TourController::class, 'index']);
Route::get('/tour/province/{id}', [TourController::class, 'filterProvince']);
Route::get('/tour/sort/{sort}', [TourController::class, 'sort']);

Route::get('/guide', function () {
    return view('guide');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'user']], function () {

    Route::get('/requestTrip/{id}', [ProvinceController::class, 'showProvince']);
    Route::get('/requestTrip/{id}', [ReqTripController::class, 'showProvinces']);
    // Route::get('/requestTrip', [ReqTripController::class, 'showProvince']);
    // Route::get('getPlace/{id}', [ReqTripController::class, 'showPlace']);
    Route::post('/requestTrip/{id}', [ReqTripController::class, 'store']);
    Route::get('/requestTripView/{id}', [ProvinceController::class, 'showProvince']);
    Route::get('/requestTripView/{id}', [ReqTripController::class, 'edit']);

    Route::get('/cart/{id}', [CartController::class, 'index']);
    Route::post('/cart/add/{tour}/{qty}', [CartController::class, 'store']);

    Route::post('/cart/update/{id}/{qty}', [CartController::class, '']);
    Route::delete('/cart/delete/{id}', [CartController::class, 'destroy']);

    Route::post('/purchase', [CartController::class, 'getCheckedCart']);
    Route::post('/tour/purchase', [TourController::class, 'purchase']);

});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/addDestination', [DestinationController::class, 'showProvince']);
    Route::post('/addDestination', [DestinationController::class, 'store']);

    Route::get('/addTour/private/{id}', [ProvinceController::class, 'showProvince']);
    Route::get('/addTour/private/{id}', [PrivateTourController::class, 'showProvinceAndCategory']);
    Route::post('/addTour/private/{id}', [PrivateTourController::class, 'store']);
    Route::get('/addTour', [ProvinceController::class, 'showProvince']);
    Route::get('/addTour', [TourController::class, 'showProvinceAndCategory']);
    Route::get('getPlaceTour/{id}', [TourController::class, 'showPlace']);
    Route::post('/addTour', [TourController::class, 'store']);

    Route::get('/editTour/{id}', [ProvinceController::class, 'showProvince']);
    Route::get('/editTour/{id}', [TourController::class, 'edit']);
    Route::get('editPlaceTour/{id}', [TourController::class, 'showPlace']);
    Route::patch('/editTour/{id}', [TourController::class, 'update']);

    // Route::patch('/approve/{id}/{status}/{note}', [InboxController::class, 'approve']);

});


Route::get('/inbox/{id}', [InboxController::class, 'toInbox'])->middleware('auth');
Route::post('/inbox/{id}/filter', [InboxController::class, 'filter'])->middleware('auth');
Route::get('/payment/{id}', [PaymentHistoryController::class, 'index'])->middleware('auth');

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);