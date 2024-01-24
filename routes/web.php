<?php

use App\Http\Controllers\Panel\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::prefix('/panel')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('showUser');
      //  Route::get('/create', [UserController::class, 'create'])->name('createUser');
        Route::get('/deleted', [UserController::class, 'trashed'])->name('deletedUser');
      //  Route::post('/store', [UserController::class, 'store'])->name('storeUser');
        Route::post('/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::patch('/update/{user}', [UserController::class, 'update'])->name('updateUser');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('deleteUser');
    });
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
