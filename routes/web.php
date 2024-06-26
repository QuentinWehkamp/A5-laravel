<?php

use App\Http\Controllers\BandController;
use Illuminate\Support\Facades\Route;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return redirect('/');
});

// account routes
Route::resource('/account', App\Http\Controllers\AccountController::class);
Route::get('change-password', [App\Http\Controllers\AccountController::class, 'changePassword'])->name('change-password');
Route::post('change-password', [App\Http\Controllers\AccountController::class, 'updatePassword'])->name('update-password');


//band routes
Route::resource('/band', App\Http\Controllers\BandController::class, ['except' => ['edit']]);
Route::resource('/band', App\Http\Controllers\BandController::class, ['only' => ['edit']])->middleware('isAdmin');

// Route::post('/epk', [App\Http\Controllers\BandController::class, 'store'])->name("band.store");
