<?php

use App\Http\Controllers\Ajax\EventController;
use App\Http\Controllers\Ajax\LatestEventController;
use App\Http\Controllers\Ajax\CourseController;
use App\Http\Controllers\Ajax\MonthEventController;
use App\Http\Controllers\Ajax\SearchEventController;
use App\Http\Controllers\Ajax\MylistController;






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

// Route::get('event', 'EventController@index');


Auth::routes();


Route::get('api/event', [EventController::class, 'index']);
Route::get('api/event/latest', [LatestEventController::class, 'index']);
Route::get('api/event/course/{courseName}', [CourseController::class, 'show']);
Route::get('api/event/month/{yearMonth}', [MonthEventController::class, 'show']);
Route::get('api/event/search', [SearchEventController::class, 'index']);


Route::group(['middleware' => 'auth'], function () {
  Route::post('api/event/post-mylist', [MylistController::class, 'store']);
  Route::post('api/event/delete-mylist', [MylistController::class, 'destroy']);
  Route::get('api/event/get-mylist', [MylistController::class, 'index']);
});


Route::get('/login-success', [App\Http\Controllers\LoginSuccessController::class, 'index'])->name('login_success');


Route::get('/{any}', function () {
    return view('welcome'); 
})->where('any','.*');
