<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', function () {
        return view('admin.dashboard');
    })->name('home')->middleware('can:dashboard');
    Route::get('profile', function () {
        return view('admin.profile');
    })->name('profile')->middleware('can:dashboard');

    Route::resource('user', UserController::class);
});
