<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MusicPlateController;

Route::get('/', function () {
    return view('start_page');
})->name('start-page');

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::get('/registration', function () {
    return view('registration.registration');
})->name('registration');

Route::post('/registration', [RegistrationController::class, 'userRegistration'])
    ->name('registration-submit');

Route::post('/login', [LoginController::class, 'userLogin'])
    ->name('login-submit');

Route::get('/home', function () {
   return view('home.home');
})->name('home')->middleware('auth');

Route::get('/home/logout', [LoginController::class, 'userLogout'])
    ->name('logout');

Route::get('/home', [MusicPlateController::class, 'showMusicPlates'])
    ->name('show-music-plates')->middleware('auth');

Route::group(['prefix' => '/home'], function () {
    Route::get('/music-plate/create', function () {
        return view('home.music_plate.create_new_music_plate');
    })->name('create-music-plate')->middleware('auth');

    Route::post('/music-plate/create', [MusicPlateController::class, 'createMusicPlate'])
        ->name('create-music-plate-submit')->middleware('auth');

    Route::get('/music-plate/{id}/delete', [MusicPlateController::class, 'deleteMusicPlate'])
        ->name('delete-music-plate')->middleware('auth');

    Route::get('/music-plate/{id}/update', [MusicPlateController::class, 'showUpdateForm'])
        ->name('update-music-plate')->middleware('auth');

    Route::patch('/music-plate/{id}/update', [MusicPlateController::class, 'updateMusicPlate'])
        ->name('update-music-plate-submit')->middleware('auth');
});


