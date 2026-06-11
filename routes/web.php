<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/login');

});

/*
|--------------------------------------------------------------------------
| LOGOUT MANUAL
|--------------------------------------------------------------------------
*/

Route::get('/logout-manual', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/login');

});

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])

    ->middleware(['auth', 'verified'])

    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| TAMBAH ROOMMATE
|--------------------------------------------------------------------------
*/

Route::get('/roommate/create', [DashboardController::class, 'create'])

    ->middleware(['auth']);

Route::post('/roommate/store', [DashboardController::class, 'store'])

    ->middleware(['auth']);

Route::get('/roommate/edit/{id}', [DashboardController::class, 'edit'])

    ->middleware(['auth']);

Route::post('/roommate/update/{id}', [DashboardController::class, 'update'])

    ->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| CHAT
|--------------------------------------------------------------------------
|
| SEKARANG CHAT BERBASIS USER ID
| BUKAN IKLAN ID
|
*/

Route::get('/chat/{id}', [ChatController::class, 'index'])

    ->middleware(['auth']);

Route::post('/chat/send/{id}', [ChatController::class, 'send'])

    ->middleware(['auth']);

Route::get('/chat-list', [ChatController::class, 'chatList'])

    ->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| MATCH ROOMMATE
|--------------------------------------------------------------------------
*/

Route::post('/match/{id}', [ChatController::class, 'match'])

    ->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| ACCEPT MATCH
|--------------------------------------------------------------------------
*/

Route::post('/match/accept/{id}', [ChatController::class, 'acceptMatch'])

    ->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| REJECT MATCH
|--------------------------------------------------------------------------
*/

Route::post('/match/reject/{id}', [ChatController::class, 'rejectMatch'])

    ->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])

        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])

        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])

        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';