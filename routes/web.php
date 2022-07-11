<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('todo')->group(function () {

        Route::get('/', [TodoController::class, 'create'])
            ->name('todo.create');

        Route::post('/', [TodoController::class, 'store'])
            ->name('todo.store');

        Route::get('/edit/{id}', [TodoController::class, 'edit'])
            ->name('todo.edit');

        Route::get('/destroy/{id}', [TodoController::class, 'destroy'])
            ->name('todo.destroy');

        Route::post('/update/{id}', [TodoController::class, 'update'])
            ->name('todo.update');
    });
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
