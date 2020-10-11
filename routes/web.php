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

Route::get('/home/music-plate', function () {
    return view('home.music_plate.create_new_music_plate');
})->name('music-plate')->middleware('auth');

Route::post('/home/music-plate', [MusicPlateController::class, 'createMusicPlate'])
    ->name('create-music-plate')->middleware('auth');

Route::get('/home/music-plate/{id}/delete', [MusicPlateController::class, 'deleteMusicPlateById'])
    ->name('delete-music-plate')->middleware('auth');

Route::patch('/home/music-plate/{id}/update', [MusicPlateController::class, 'changeMusicPlate'])
    ->name('change-music-plate')->middleware('auth');
