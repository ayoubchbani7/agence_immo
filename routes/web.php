<?php

use App\Http\Controllers\Admin\AdminPropretyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::prefix('property')->name('property.')->group(function () {
    Route::get('/biens', [PropertyController::class, 'index']);
    Route::get('/{property}/{slug}', [PropertyController::class, 'show'])->name('show');
});

Route::post('/bien/{property}/contact',[PropertyController::class,'contact'])->name('property.contact');
Route::get('/login',[AuthController::class,'login'])->middleware('guest')->name('login');
Route::post('/doLogin',[AuthController::class,'doLogin'])->name('doLogin');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('property',AdminPropretyController::class)->except(['show']);
    Route::resource('option',OptionController::class)->except(['show']);
});
