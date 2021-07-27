<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\AccountActivationController;
use App\Http\Controllers\Auth\ForgottenPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\ResendAccountActivationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::prefix(LaravelLocalization::setLocale())->middleware(['localize', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath'])->group(function () {
    Route::prefix('admin')->as('admin.')->middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('categories', CategoryController::class)->except(['show']);
    });

    Route::middleware(['guest'])->group(function () {
        Route::get('/registration', [RegistrationController::class, 'create'])->name('auth.registration');
        Route::post('/registration', [RegistrationController::class, 'store']);

        Route::get('/resend-account-activation', [ResendAccountActivationController::class, 'create'])->name('auth.resend_account_activation');
        Route::post('/resend-account-activation', [ResendAccountActivationController::class, 'store']);

        Route::get('/account-activation/{token}', [AccountActivationController::class, 'create'])->name('auth.account_activation');

        Route::get('/login', [LoginController::class, 'create'])->name('auth.login');
        Route::post('/login', [LoginController::class, 'store']);

        Route::get('/forgotten-password', [ForgottenPasswordController::class, 'create'])->name('auth.forgotten_password');
        Route::post('/forgotten-password', [ForgottenPasswordController::class, 'store']);

        Route::get('/password-reset/{token}', [PasswordResetController::class, 'create'])->name('auth.password_reset');
        Route::post('/password-reset/{token}', [PasswordResetController::class, 'store']);
    });

    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [LogoutController::class, 'store'])->name('auth.logout');

        Route::get('/home', function () {
            return Inertia::render('Home');
        });
    });

    Route::get('/announcement', [AnnouncementController::class, 'create'])->name('announcement');

    Route::get('/', [DashboardController::class, 'create'])->name('dashboard');
});
