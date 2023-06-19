<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [AuthController::class, 'login'])->name('index');
Route::post('login', [AuthController::class, 'do_login'])->name('login');

// Schedule
Route::get('schedule', [ScheduleController::class, 'schedule'])->name('schedule');

// Member
Route::get('member/list', [MemberController::class, 'list'])->name('member.list');
Route::get('member/birthday', [MemberController::class, 'birthday'])->name('member.birthday');
Route::get('member/list/show/{member}', [MemberController::class, 'show'])->name('member.show');

// Gallery
Route::get('gallery', [GalleryController::class, 'gallery'])->name('gallery');

Route::prefix('backend/')->name('backend.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Schedule
        Route::resource('schedule', ScheduleController::class);

        // Member
        Route::resource('member', MemberController::class);

        // Gallery
        Route::resource('gallery', GalleryController::class);
        Route::post('gallery/storeImage', [GalleryController::class, 'storeImage'])->name('gallery.storeImage');
        Route::delete('gallery/deleteImage', [GalleryController::class, 'deleteImage'])->name('gallery.deleteImage');

        // Slider
        Route::resource('slider', SliderController::class);

        // Settings
        Route::prefix('settings')->name('')->group(function () {
            Route::get('', [SettingController::class, 'index'])->name('settings.index');
            Route::put('update_site', [SettingController::class, 'update_site'])->name('update_site');
            Route::put('update_user', [SettingController::class, 'update_user'])->name('update_user');
            Route::put('update_seo', [SettingController::class, 'update_seo'])->name('update_seo');
        });

        // Logout
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
    });
});
