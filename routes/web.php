<?php

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
    Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    });

    Route::middleware(['guest'])->group(function () {

    });

    Route::middleware(['auth'])->group(function () {

    });

    Route::get('/', function () {
        return Inertia::render('Welcome');
    });
});

