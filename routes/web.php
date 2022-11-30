<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin', function () {
        dd('To może zobaczyć ' . config('auth.roles.admin'));
    })->middleware('role:' . config('auth.roles.admin'))
        ->name('admin');

    Route::get('/worker', function () {
        dd('To może zobaczyć ' . config('auth.roles.worker'));
    })->middleware('role:' . config('auth.roles.worker'))
        ->name('worker');

    Route::get('/user', function () {
        dd('To może zobaczyć ' . config('auth.roles.user'));
    })->middleware('role:' . config('auth.roles.user'))
        ->name('user');
});
