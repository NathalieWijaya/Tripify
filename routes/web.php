<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('aboutUs');
});
Route::get('/tourDetail/{id}', [TourController::class, 'show']);
// Route::get('/home', [HomeController::class, 'index']);
Auth::routes();

Route::group(['middleware' => ['auth', 'verified', 'user']], function () {

    Route::get('/requestTrip', [ReqTripController::class, 'showProvince']);
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

Route::get('/adminInbox', function () {
    return view('adminInbox');
});






Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/addDestination', [DestinationController::class, 'showProvince']);
    Route::post('/addDestination', [DestinationController::class, 'store']);
    Route::get('/addTour', [ProvinceController::class, 'showProvince']);
    Route::get('/addTour', [TourController::class, 'showProvinceAndCategory']);
    Route::get('getPlaceTour/{id}', [TourController::class, 'showPlace']);
    Route::post('/addTour', [TourController::class, 'store']);
    Route::get('/editTour/{id}', [ProvinceController::class, 'showProvince']);
    Route::get('/editTour/{id}', [TourController::class, 'edit']);
    Route::get('editPlaceTour/{id}', [TourController::class, 'showPlace']);
    Route::patch('/editTour/{id}', [TourController::class, 'update']);
});


Route::get('/inbox/{id}', [InboxController::class, 'toInbox']);

Route::post('/inbox/{id}/filter', [InboxController::class, 'filter']);

// Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
// Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback']);
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);



// View All
Route::get('/tour', [TourController::class, 'index']);

// Filter by Province
Route::get('/tour-bali', [TourController::class, 'filterBali']);
Route::get('/tour-jakarta', [TourController::class, 'filterJakarta']);
Route::get('/tour-yogyakarta', [TourController::class, 'filterYogyakarta']);
Route::get('/tour-ntt', [TourController::class, 'filterNTT']);

// Filter by Category
Route::get('/tour-beach', [TourController::class, 'filterBeach']);
Route::get('/tour-camping', [TourController::class, 'filterCamping']);
Route::get('/tour-daytrip', [TourController::class, 'filterDayTrip']);
Route::get('/tour-hiking', [TourController::class, 'filterHiking']);
Route::get('/tour-island', [TourController::class, 'filterIsland']);
Route::get('/tour-longtrip', [TourController::class, 'filterLongTrip']);
Route::get('/tour-mountain', [TourController::class, 'filterMountain']);
Route::get('/tour-park', [TourController::class, 'filterPark']);
Route::get('/tour-shorttrip', [TourController::class, 'filterShortTrip']);
Route::get('/tour-snorkeling', [TourController::class, 'filterSnorkeling']);
Route::get('/tour-temple', [TourController::class, 'filterTemple']);
