<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\GlassController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PhoneModelController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Device;
use Illuminate\Support\Facades\Log;
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

    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])
            ->name('index')
            ->middleware(['permission:users.index']);
    });

    Route::resource('categories', CategoryController::class);

    Route::resource('glasses', GlassController::class)->only([
        'index', 'create', 'edit'
    ]);
    Route::resource('producers', ProducerController::class)->only([
        'index', 'create', 'edit'
    ]);
    Route::resource('phonemodels', PhoneModelController::class)->only([
        'index', 'create', 'edit'
    ]);

    Route::get('async/phonemodels', [PhoneModelController::class, 'async'])
        ->name('async.phonemodels');

    Route::get('async/producers', [ProducerController::class, 'async'])
        ->name('async.producers');
    Route::resource('devices', DeviceController::class)->only([
        'index', 'create', 'edit'
    ]);
    Route::resource('products', ProductController::class)->only([
        'index','create','edit']
    );

    Route::get('async/devices', [DeviceController::class, 'async'])
        ->name('async.devices');

});
