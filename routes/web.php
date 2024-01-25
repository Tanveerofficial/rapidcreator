<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ImageProcessing;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
// ------------------Pages Controller Here----------------------
Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('event:clear');
    echo 'Cache Cleared';
});

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'signin')->name('authentication.signin');
    Route::get('/forget', 'forget')->name('authenticaion.forget');
});
// ------------------Pages Controller Here----------------------
// ------------------Authenticaion Controller Here----------------------
Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/signin', 'signin')->name('authentication.login');
    Route::post('/reset-link', 'resetLink')->name('authentication.resetLink');
    Route::get('/reset-password/{email}', 'resetPassword')->name('authenticaion.reset');
    Route::post('/update_password', 'updatePassword')->name('authenticaion.update');
    Route::get('/auth/github/redirect', 'githubredirectToProvider')->name('login.github');
    Route::get('/auth/github/callback', 'githubhandleProviderCallback')->name('login.github.callback');
    Route::get('/auth/google/redirect', 'googleredirectToProvider')->name('login.google');
    Route::get('/auth/google/callback', 'googlehandleProviderCallback')->name('login.google.callback');
});
Route::group(["middleware" => ["authsecurity"]], function () {
    // ------------------Pages Controller Here----------------------
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard.dashboard');
        Route::get('/profile', 'profile')->name('dashboard.profile');
        Route::get('/profile_edit', 'editProfile')->name('dashboard.profile.edit');
        Route::put('/profile_update/{id}', 'updateProfile');
    });
    // ------------------Pages Controller Here----------------------
    // ------------------Authentication Controller Here----------------------
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/logout', 'logout')->name('authenticaion.logout');
        Route::put('/user_update/{id}', 'updateProfile');
    });
    // ------------------Authentication Controller Here----------------------
    Route::controller(ImageProcessing::class)->group(function () {
        Route::get('/image_processing', 'image_processing');
        Route::get('/getting_csv_data/{file}', 'getting_csv_data');
        Route::post('/div', 'addDivToImage');
        Route::get('/getting-data/{title}', 'gettingData');
        Route::post('/image-making/', 'imageMaking');
        Route::post('/apply-text-position', 'applyTextPosition');
    });
    // ------------------Authentication Controller Here----------------------
});
