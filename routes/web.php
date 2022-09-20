<?php

use App\Http\Controllers\CategoryController;
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
    /**category */
    Route::resource('category', CategoryController::class);
    Route::get('category/status/{category_id}', [CategoryController::class, 'status'])->name('category.status');

    /* web setting route */
    Route::get('/account-setting', [App\Http\Controllers\SettingController::class, 'account_setting'])->name('account-setting');
    Route::post('/account-update', [App\Http\Controllers\SettingController::class, 'account_update'])->name('account-update');
    Route::get('/profile', [App\Http\Controllers\SettingController::class, 'profile'])->name('profile');
    Route::get('/logouts', [App\Http\Controllers\SettingController::class, 'logouts'])->name('logouts');
});
