<?php

use App\Http\Controllers\BedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware" => ['auth']], function () {
    /**create user */
    Route::resource('user', UserController::class);
    Route::get('user/status/{user_id}', [UserController::class, 'status'])->name('user.status');

    /**category */
    Route::resource('category', CategoryController::class);
    Route::get('category/status/{category_id}', [CategoryController::class, 'status'])->name('category.status');

    /**room */
    Route::resource('room', RoomController::class);
    Route::get('room/status/{room_id}', [RoomController::class, 'status'])->name('room.status');

    /**bed */
    Route::resource('bed', BedController::class);
    Route::get('bed/status/{bed_id}', [BedController::class, 'status'])->name('bed.status');

    /* web setting route */
    Route::get('/account-setting', [App\Http\Controllers\SettingController::class, 'account_setting'])->name('account-setting');
    Route::post('/account-update', [App\Http\Controllers\SettingController::class, 'account_update'])->name('account-update');
    Route::get('/profile', [App\Http\Controllers\SettingController::class, 'profile'])->name('profile');
    Route::get('/logouts', [App\Http\Controllers\SettingController::class, 'logouts'])->name('logouts');
});
