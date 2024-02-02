<?php

use App\Http\Controllers\Panel\CourseController;
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
        Route::get('/deleted', [UserController::class, 'trashed'])->name('deletedUser');
        Route::post('/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::patch('/update/{user}', [UserController::class, 'update'])->name('updateUser');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('users.delete');
    });


    Route::prefix('course')->group(function (){
        Route::get('/create' , [CourseController::class , 'create'])->name('course.create');
        Route::post('/store' , [CourseController::class , 'store'])->name('course.store');
        Route::get('/',  [CourseController::class , 'index'])->name('course.index');
        Route::get('/{course}' , [CourseController::class, 'show'])->name('course.show');
        Route::get('/{course}/edit' , [CourseController::class, 'edit'])->name('course.edit');
        Route::patch('/update/{course}' , [CourseController::class , 'update'])->name('course.update');
        Route::delete('/{course}' , [CourseController::class , 'destroy'])->name('course.destroy');
    });
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
